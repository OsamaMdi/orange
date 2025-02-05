<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styleUpdate.css">
  <title>Update Employee</title>
</head>
<body>
  
</body>
</html>
<?php
require 'config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['Address'];
    $salary = $_POST['salary'];
    $off_days = $_POST['off_days'];
    

    $sql = "UPDATE employees SET name = :name, address = :address, salary = :salary, off_days = :off_days  WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $name, ':address' => $address, ':salary' => $salary, ':off_days' => $off_days, 'id' => $id]);

    header("Location: index.php");
    exit();
}
 else {
    $sql = "SELECT * FROM employees WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id]);
    $employee = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Employee</title>
</head>
<body>
  <div class="container main-content">
    <h2>Update Employee</h2>
    <form action="update.php?id=<?= $id ?>" method="post">
    <label for="name">Enter Name:</label>
            <input type="text" id="name" name="name" id="name" name="name" value="<?= $employee['name'] ?>"required> 
            <br>
            <label for="Address">Enter Address:</label>
            <input type="text" id="Address" name="Address" value="<?= $employee['address'] ?>" required> 
            <br>
            <label for="salary">Enter Salary:</label>
            <input type="number" id="salary" name="salary" value="<?= $employee['salary'] ?>" required>
            <br>
            <label for="off_days">Enter Off Days:</label>
            <input type="number" id="off_days" name="off_days" value="<?= $employee['off_days'] ?>" required> 
            <br>
      <button class="but" type="submit">Update</button>
    </form>
  </div>
</body>
</html>
