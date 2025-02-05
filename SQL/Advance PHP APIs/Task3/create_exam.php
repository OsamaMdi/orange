<?
include 'condb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $subject_id = $data['subject_id'];
    $date = $data['date'];
    $max_score = $data['max_score'];

    $query = "INSERT INTO exams (subject_id, date, max_score) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$subject_id, $date, $max_score]);

    $exam_id = $pdo->lastInsertId();

    echo json_encode([
        'exam_id' => $exam_id,
        'subject_id' => $subject_id,
        'date' => $date,
        'max_score' => $max_score
    ]);
}
?>