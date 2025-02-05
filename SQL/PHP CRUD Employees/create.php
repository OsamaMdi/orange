<?php
require 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['Address'];
    $salary = $_POST['salary'];
    $off_days = $_POST['off_days'];
   

    $sql = "INSERT INTO employees (name,address,salary,off_days) VALUES (:name, :address, :salary,:off_days)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(params: [':name' => $name, ':address' => $address, ':salary' => $salary , ':off_days' => $off_days]);

    header("Location: index.php");
    exit();
}
?>