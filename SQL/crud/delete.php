<?php
include 'configFile.php';
$id = $_POST['id'];
$sql = "DELETE FROM Employees WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: index.php");
exit();
?>