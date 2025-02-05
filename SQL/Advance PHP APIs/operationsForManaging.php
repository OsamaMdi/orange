<?php
//        Task1

include 'condb.php'; 

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE'); 
header('Access-Control-Allow-Headers: Content-Type,Access-Control-Allow-Headers,Authorization, X-Request-With');

$requestMethod = $_SERVER["REQUEST_METHOD"];
     
// GET Method

if($requestMethod == "GET"){
       if(isset($_GET['id'])){
        $id = $_GET['id'];  
        if($id > 0){
    $stmt = $pdo->query("SELECT * FROM Management_School WHERE id = $id");
    $student = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($student) > 0){
    echo json_encode($student);
    }
    else {
        echo json_encode(["error" => "ID not found."]);
        exit();
    }
}else {
    echo json_encode(["error" => "ID must be greater than 0."]);
    exit();
}
       } else{
    $stmt = $pdo->query("SELECT * FROM Management_School ");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($students);
       }
}

    // POST Method
elseif($requestMethod == 'POST'){
  
    // echo $_POST['name'];        
    $contentType = $_SERVER["CONTENT_TYPE"] ?? '';

  if (strpos($contentType, "application/json") !== false) {

    $data = json_decode(file_get_contents("php://input"));

    if (isset($data->name) && isset($data->date_of_birth) && isset($data->addrees) && isset($data->phone_number)) {

        $stmt = $pdo->prepare("INSERT INTO Management_School (name,date_of_birth,addrees,phone_number) VALUES ( ?, ?, ?, ?)");
        $stmt->execute([$data->name, $data->date_of_birth, $data->addrees, $data->phone_number]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(["message" => "Data added successfully"]);
        } else {
            echo json_encode(["error" => "Failed to add data"]);
        }
    }
    else {
        
        http_response_code(400); 
        echo json_encode(["error" => "Incomplete or invalid data. Please provide all required fields."]);
    }
  }else{
    $name = $_GET['name'] ?? '';
    $date_of_birth = $_GET['date_of_birth'] ?? '';
    $addrees = $_GET['addrees'] ?? '';
    $phone_number = $_GET['phone_number'] ?? '';
    
    if (!empty($name) && !empty($date_of_birth) && !empty($addrees) && !empty($phone_number)) {
            
        $stmt = $pdo->prepare("INSERT INTO Management_School (name,date_of_birth,addrees,phone_number) VALUES ( ?, ?, ?, ?)");
        $stmt->execute([$name, $date_of_birth, $addrees, $phone_number]);
        
        if ($stmt->rowCount() > 0) {
            echo json_encode(["message" => "Data added successfully"]);
        } else {
            echo json_encode(["error" => "Failed to add data"]);
        }
  }else {
        
    http_response_code(400); 
    echo json_encode(["error" => "Incomplete or invalid data. Please provide all required fields."]);
}
}
      
       
}
// PUT Method

elseif($requestMethod == 'PUT'){

    $data = json_decode(file_get_contents("php://input"));
    
    $id = $data->id ?? null;

    if($id){

        if (isset($data->name)  && isset($data->date_of_birth) && isset($data->addrees) && isset($data->phone_number)){

            $checkStmt = $pdo->prepare("SELECT id FROM Management_School WHERE id = ?");
            $checkStmt->execute([$id]);

            if ($checkStmt->rowCount() > 0){

            $stm = $pdo->prepare("UPDATE Management_School SET name = ?,date_of_birth = ?  , addrees = ? ,phone_number = ?  WHERE id = ?");
            $stm->execute([$data->name , $data->date_of_birth,$data->addrees,$data->phone_number,  $id ]);

            if ($stm->rowCount()> 0){
                echo json_encode(["message" => "User Update successfully"]);
            }
            else {
                http_response_code(400);
                    echo json_encode(["message" => "No changes made to the record"]);
        }
    }else{
        http_response_code(404);  
        echo json_encode(["message" => "User not found"]);
    }

    }
    else {
        http_response_code(400);
        echo json_encode(["message" => "Incomplete data. All fields are required"]);
    }
    
}else {
    http_response_code(400);
    echo json_encode(["message" => "ID is required"]);
}

}
// delet Method

elseif ($requestMethod == 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $id = $data->id ?? null; 

    if ($id) {
        $checkStmt = $pdo->prepare("SELECT id FROM Management_School WHERE id = ?");
        $checkStmt->execute([$id]);

        if ($checkStmt->rowCount() > 0) {
            $stm = $pdo->prepare("DELETE FROM Management_School WHERE id = ?");
            $stm->execute([$id]);

            if ($stm->rowCount() > 0) {
                echo json_encode(["message" => "User deleted successfully"]);
            } else {
                http_response_code(400);
                echo json_encode(["error" => "Failed to delete user"]);
            }
        } else {
            http_response_code(404);
            echo json_encode(["error" => "User not found"]);
        }
    } else {
        http_response_code(400);
        echo json_encode(["error" => "ID is required"]);
    }
}


else{
     http_response_code(400); 
     echo json_encode(["message" => "The requested resource is not found"]);
}

  
     
?>