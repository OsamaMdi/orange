<?php
include 'config.php';
$id = $_POST['id'];
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: viewAllUsers.php");
exit();
?>