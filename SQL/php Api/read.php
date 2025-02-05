<?php
include 'condb.php'; 

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE'); 
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization, X-Request-With');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod == "GET"){
       
    $stmt = $pdo->query("SELECT * FROM courses");
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($course);
    
}
elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $data = json_decode(file_get_contents("php://input"));

        if(isset($data->course_name) && isset($data->teacher_id)){

        $stmt = $pdo->prepare("INSERT INTO courses (course_name, teacher_id) VALUES (?, ?)");
        $stmt->execute([$data->course_name, $data->teacher_id]);
        http_response_code(201);
        echo json_encode(["message" => "User added successfully"]);
        }
    
}
elseif($_SERVER['REQUEST_METHOD'] == 'PUT'){
   
    $id = $_GET['id'] ?? null;
    if($id){
        $data = json_decode(file_get_contents("php://input"));

        if (isset($data->course_name) && isset($data->teacher_id)){
            $stm = $pdo->prepare("UPDATE courses SET course_name = ?, teacher_id = ? WHERE id = ?");
            $stm->execute([$data->course_name , $data->teacher_id, $id ]);
            if ($stm->rowCount()> 0){
                echo json_encode(["message" => "User Update successfully"]);
            }
            else {
                http_response_code(404);  
                echo json_encode(["message" => "Incomplete data"]);
        }
    }

    }else{
        http_response_code(404);  
        echo json_encode(["message" => "The ID is not found"]);
    }
}
else{
     http_response_code(400); 
     echo json_encode(["message" => "The requested resource is not found"]);
}
    
     
?>