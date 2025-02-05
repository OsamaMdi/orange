<?php
require 'config.php';
$id = $_POST['id'];
$sql = "SELECT * FROM employees WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Employee</title>
  <link rel="stylesheet" href="css/styleRed.css">
</head>
<body>
  <div class="container main-content">
    <h2>View Employee</h2>
    <p><strong>ID:</strong> <?php $employee['id'] ?></p>
    <p><strong>Name:</strong> <?php $employee['name'] ?></p>
    <p><strong>Address:</strong> <?php $employee['address'] ?></p>
    <p><strong>Salary:</strong><?php $employee['salary'] ?></p>
    <p><strong>Off Days:</strong> <?php $employee['off_days'] ?></p>
    <p><strong>Salary after deduction :</strong> <?php 
    $daySalary = $employee['salary'] / 30; 
    $deduction = $daySalary * $employee['off_days'];
    echo  number_format(($employee['salary'] - $deduction),2);
   ?></p>
    <a href="index.php">Back to Employee List</a>
  </div>
</body>
</html>