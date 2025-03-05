<?php
include 'config.php';
$id = $_POST['id'];
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: viewAllUsers.php");
exit();
?>


<!-- 
<?php
include 'config.php';

$error = [];    

if(isset($_POST['id']) && isset($_POST['tableName'])){
    $id = $_POST['id'];
    $tableName = $_POST['tableName'];
} else {
    $error['error'] = "* Missing required data!";
    exit();
}

$sql = "DELETE FROM $tableName WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

$previousPage = $_SERVER['HTTP_REFERER'] ?? 'index.php';
header("Location: $previousPage");
exit();
?>
 -->
<!-- 
 <form action="delete.php" method="POST">
    <input type="hidden" name="tableName" value="users">
    <input type="hidden" name="id" value="123">
    <button type="submit">حذف</button>
</form>
 -->