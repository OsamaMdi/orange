<?
include 'condb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $name = $data['name'];
    $description = $data['description'];

    $query = "INSERT INTO subjects (name, description) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $description]);

    $subject_id = $pdo->lastInsertId();

    echo json_encode([
        'subject_id' => $subject_id,
        'name' => $name,
        'description' => $description
    ]);
}
?>