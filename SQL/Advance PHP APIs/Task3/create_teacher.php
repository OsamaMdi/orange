<?
include 'condb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data['name'];
    $contact_info = $data['contact_info'];

    $query = "INSERT INTO teachers (name, contact_info) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $contact_info]);

    $teacher_id = $pdo->lastInsertId();

    echo json_encode([
        'teacher_id' => $teacher_id,
        'name' => $name,
        'contact_info' => $contact_info
    ]);
}
?>