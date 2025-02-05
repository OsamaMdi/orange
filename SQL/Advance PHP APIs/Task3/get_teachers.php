<?
include 'condb.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['teacherId'])){
        $teacherId = $_GET['teacherId'];

        $query = "SELECT * FROM teachers WHERE teacher_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$teacherId]);
    
        $teacher = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($teacher) {
            echo json_encode($teacher);
        } else {
            echo json_encode(['error' => 'Teacher not found']);
        }
        
    }else{
    $query = "SELECT * FROM teachers";
    $stmt = $pdo->query($query);

    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($teachers);
}
}
?>