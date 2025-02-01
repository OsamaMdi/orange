<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleProcess.css">
    <title>Add Admin Page</title>
</head>
<body>
    
</body>
</html>
<?php
require 'config.php';

if (isset($_POST['submitAddAdmin'])) {
    $id = trim($_POST['idNum']);
    $errors = [];

    if (empty($id)) {
        $errors['Id'] = "* Please enter an ID.";
    }

    if (empty($errors)) {
        try {
            $sql = "SELECT id, name FROM users WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $AdminId = $user['id'];
                $AdminName = $user['name'];


                 // Cheked From Admin Table
            $sql = "SELECT user_id FROM admin WHERE user_id = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['user_id' => $AdminId]);
            $chekAddmin = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($chekAddmin) {
                $errors['Id'] = "* The User is Admin.";
                echo '<div class="error-container">';
                echo '<h1>Error</h1>';
                foreach ($errors as $error) {
                    echo "<p><span>•</span> $error</p>";
                }
                echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
                echo '</div>';
                exit();
            }


                $sql = "INSERT INTO admin (user_id, user_name, role) VALUES (:user_id, :user_name, :role)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':user_id' => $AdminId,
                    ':user_name' => $AdminName,
                    ':role' => 'admin'
                ]);

                header("Location: viewAllUsers.php");
                exit();
            } else {
                $errors['Id'] = "* No user found with this ID.";
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $errors['Id'] = "* This ID is already assigned as admin. Please use another ID.";
            } else {
                $errors['Database'] = "An error occurred: " . htmlspecialchars($e->getMessage());
            }
        }
    }
}

if (!empty($errors)) {
    echo '<div class="error-container">';
    echo '<h1>Error</h1>';
    foreach ($errors as $error) {
        echo "<p><span>•</span> $error</p>";
    }
    echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
    echo '</div>';
    exit();
}
?>
