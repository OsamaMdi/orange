<?php
require 'config.php';

if (isset($_POST['update_employee'])) {
   
    $id = $_POST['id'];
    $amount = $_POST['amount'];

    $sql = "UPDATE employees SET salary = salary + :amount WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':amount',$amount);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

if (isset($_POST['update_employees'])) {

    $amount = $_POST['amount'];

    $sql = "UPDATE employees SET salary = salary + :amount ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':amount',$amount);
    $stmt->execute();
    header("Location: index.php");
    exit();
}
?>