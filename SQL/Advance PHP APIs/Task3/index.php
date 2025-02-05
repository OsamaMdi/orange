<?php
// الاتصال بقاعدة البيانات
include 'condb.php';

// جلب الـ URL الحالي
$requestUri = $_SERVER['REQUEST_URI'];

// تحديد العمليات بناءً على الـ URL
switch ($requestUri) {
    case '/api/teachers':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            include 'create_teacher.php'; // إضافة معلم
        } else {
            include 'get_teachers.php'; // الحصول على جميع المعلمين
        }
        break;

    case (preg_match('/^\/api\/teachers\/([0-9]+)$/', $requestUri) ? true : false):
        // للحصول على معلم حسب الـ ID
        preg_match('/^\/api\/teachers\/([0-9]+)$/', $requestUri, $matches);
        $_GET['teacherId'] = $matches[1];
        include 'get_teacher_by_id.php';
        break;

    case '/api/subjects':
        include 'create_subject.php'; // إنشاء مادة
        break;

    case '/api/exams':
        include 'create_exam.php'; // إنشاء اختبار
        break;

    default:
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}
