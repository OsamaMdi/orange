<?php
include 'condb.php';

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT');
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization, X-Request-With');

$requestMethod = $_SERVER["REQUEST_METHOD"];
$uri = $_SERVER['REQUEST_URI'];
$paths = explode('/', $uri);

// Endpoint: /api/students/{id}/subjects
if ($paths[3] == 'students' && isset($paths[5]) && $paths[5] == 'subjects' && $requestMethod == 'GET') {
    $studentId = $paths[4];
    getStudentSubjects($pdo, $studentId);
}

// Endpoint: /api/subjects/{id}/students
elseif ($paths[3] == 'subjects' && isset($paths[5]) && $paths[5] == 'students' && $requestMethod == 'GET') {
    $subjectId = $paths[4];
    getSubjectStudents($pdo, $subjectId);
}

// Endpoint: /api/students/{id}/exams
elseif ($paths[3] == 'students' && isset($paths[5]) && $paths[5] == 'exams' && $requestMethod == 'GET') {
    $studentId = $paths[4];
    getStudentExams($pdo, $studentId);
}

// Endpoint: /api/subjects/{id}/exams
elseif ($paths[3] == 'subjects' && isset($paths[5]) && $paths[5] == 'exams' && $requestMethod == 'GET') {
    $subjectId = $paths[4];
    getSubjectExams($pdo, $subjectId);
}

// Endpoint: /api/register
elseif ($paths[3] == 'register' && $requestMethod == 'POST') {
    registerStudentInSubjects($pdo);
}

// Endpoint: /api/exams/{id}
elseif ($paths[3] == 'exams' && isset($paths[4]) && $requestMethod == 'PUT') {
    $examId = $paths[4];
    updateExam($pdo, $examId);
}

else {
    http_response_code(404);
    echo json_encode(["message" => "Endpoint not found"]);
}

// 1. Retrieve a Student's Subjects
function getStudentSubjects($pdo, $studentId) {
    $stmt = $pdo->prepare("
        SELECT s.id, s.name 
        FROM Subjects s
        JOIN Student_Subject ss ON s.id = ss.subject_id
        WHERE ss.student_id = ?
    ");
    $stmt->execute([$studentId]);
    $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($subjects);
}

// 2. Retrieve a Subject's Students
function getSubjectStudents($pdo, $subjectId) {
    $stmt = $pdo->prepare("
        SELECT st.id, st.name 
        FROM Students st
        JOIN Student_Subject ss ON st.id = ss.student_id
        WHERE ss.subject_id = ?
    ");
    $stmt->execute([$subjectId]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($students);
}

// 3. Register Students in Subjects
function registerStudentInSubjects($pdo) {
    $data = json_decode(file_get_contents("php://input"), true);
    $studentId = $data['student_id'];
    $subjectIds = $data['subject_ids'];

    foreach ($subjectIds as $subjectId) {
        $stmt = $pdo->prepare("INSERT INTO Student_Subject (student_id, subject_id) VALUES (?, ?)");
        $stmt->execute([$studentId, $subjectId]);
    }
    echo json_encode(["message" => "Registration successful"]);
}

// 4. Retrieve a Student's Exams
function getStudentExams($pdo, $studentId) {
    $stmt = $pdo->prepare("
        SELECT e.id, e.exam_date, e.max_score, se.score 
        FROM Exams e
        JOIN Student_Exam se ON e.id = se.exam_id
        WHERE se.student_id = ?
    ");
    $stmt->execute([$studentId]);
    $exams = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($exams);
}

// 5. Retrieve a Subject's Exams
function getSubjectExams($pdo, $subjectId) {
    $stmt = $pdo->prepare("SELECT * FROM Exams WHERE subject_id = ?");
    $stmt->execute([$subjectId]);
    $exams = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($exams);
}

// 6. Update Exam
function updateExam($pdo, $examId) {
    $data = json_decode(file_get_contents("php://input"), true);
    $score = $data['score'];

    $stmt = $pdo->prepare("UPDATE Student_Exam SET score = ? WHERE exam_id = ?");
    $stmt->execute([$score, $examId]);
    echo json_encode(["message" => "Exam updated successfully"]);
}
?>