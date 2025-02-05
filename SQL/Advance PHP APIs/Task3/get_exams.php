<?
include 'condb.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['examId'])){
        $examId = $_GET['examId'];

        $query = "SELECT * FROM exams WHERE exam_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$examId]);
    
        $exam = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($exam) {
            echo json_encode($exam);
        } else {
            echo json_encode(['error' => 'Exam not found']);
        }
    }
    else{
    $query = "SELECT * FROM exams";
    $stmt = $pdo->query($query);

    $exams = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($exams);
    }
}
?>