<?php
require 'configFile.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "UPDATE employees SET name = :name, address = :address, salary = :salary WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':name' => $name, ':address' => $address, ':salary' => $salary, 'id' => $id]);

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
    <link rel="stylesheet" href="css\upStyles.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Employee</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container main-content">
    <h2>Update Employee</h2>
    <form action="update.php?id=<?= $id ?>" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?= $employee['name'] ?>" required>
      
      <label for="address">Address:</label>
      <input type="text" id="address" name="address" value="<?= $employee['address'] ?>" required>
      
      <label for="salary">Salary:</label>
      <input type="number" id="salary" name="salary" value="<?= $employee['salary'] ?>" required>
      
      <button type="submit">Update</button>
    </form>
  </div>
</body>
</html>
