<?php
require 'configFile.php';
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
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container main-content">
    <h2>View Employee</h2>
    <p><strong>Name:</strong> <?= $employee['name'] ?></p>
    <p><strong>Address:</strong> <?= $employee['address'] ?></p>
    <p><strong>Salary:</strong> <?= $employee['salary'] ?></p>
    <a href="index.php">Back to Employee List</a>
  </div>
</body>
</html>