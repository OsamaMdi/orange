<?
include 'condb.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['subjectId'])){
    $subjectId = $_GET['subjectId'];

    $query = "SELECT * FROM subjects WHERE subject_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$subjectId]);

    $subject = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($subject) {
        echo json_encode($subject);
    } else {
        echo json_encode(['error' => 'Subject not found']);
    }

}
 else{
    $query = "SELECT * FROM subjects";
    $stmt = $pdo->query($query);

    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($subjects);
}
}
?>