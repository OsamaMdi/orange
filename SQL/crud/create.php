<?php
require 'configFile.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $sql = "INSERT INTO employees (name, address, salary) VALUES (:name, :address, :salary)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(params: [':name' => $name, ':address' => $address, ':salary' => $salary]);

    header("Location: index.php");
    exit();
}
?>