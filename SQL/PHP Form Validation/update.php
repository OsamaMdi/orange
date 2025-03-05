<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleProcess.css">
</head>
<body>
    
</body>
</html>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
$id = $_GET['id'];
$previousPage = $_SERVER['HTTP_REFERER'] ?? 'update.php';
}

require 'config.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['tableName'])){
        $tableName = $_POST['tableName'];
    }else{
        $errors['error'] = "* The Table Name Not Funde";  //  Error Massege
                    echo '<div class="error-container">';
                    echo '<h1>Error</h1>';
                        echo "<p><span>•</span> $errors</p>"; 
                echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
                    echo '</div>';
                    exit();
        }

    $name = trim($_POST['name']);

    $phone = trim($_POST['phone']);


    if (empty($name)) {
        $errors['name'] = "* Please enter your name.";
    } else {
        $nameParts = array_filter(explode(" ", trim($name)));
    
        if (count($nameParts) !== 4) {
            $errors['name'] = "* Name must contain exactly four words.";
        } else {
            foreach ($nameParts as $part) {
                if (!preg_match('/^[A-Za-z]+$/', $part)) {
                    $errors['name'] = "* Name must contain only alphabetic characters (A-Z, a-z).";
                    break;
                }
            }
        }
    }
    if (empty($phone)) {
        $errors['phone'] = "* Please enter your phone number.";
    } elseif (!preg_match('/^0(77|78|79)[0-9]{7}$/', $phone)) {
       
        $errors['phone'] = "* Please enter a valid phone number in the format 07XYYYYYYY.";
    }

    if (empty($errors)) {
    
    $sql = "UPDATE users SET name = :name, phone_number = :phone_number WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $name, ':phone_number' => $phone, ':id' => $id  ]);

    header("Location: viewAllUsers.php");
    exit();
    }
    else {
        echo '<div class="error-container">';
        echo '<h1>Error</h1>';
        foreach ($errors as $error) {
            echo "<p><span>•</span> $error</p>";
        }
        echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
        echo '</div>';
        exit();
    }
    
}
 else {
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="css/styleViewAllUser.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update User</title>
 
</head>
<body>
  <div class="form-container">
    <h2>Update User</h2>
    <form action="update.php?id=<?= $id ?>" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?= $user['name'] ?>" required>
      
      <label for="address">Phone Number:</label>
      <input type="tel" id="phone" name="phone" value="<?= $user['phone_number'] ?>" required>
     
      <button class="but" type="submit">Update</button>
      <button class="but" onclick="window.location.href='viewAllUsers.php'">Back</button>
    </form>
  </div>
</body>
</html>
