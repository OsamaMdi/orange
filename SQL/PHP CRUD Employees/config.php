<?php
try {
    
    $dsn = "mysql:host=localhost;dbname=employeesdb";
    $username = "root";
    $password = "";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlFile = "employeesdb.SQL"; 
    $sqlContent = file_get_contents($sqlFile);

    $sqlCommands = explode(';', $sqlContent);

    foreach ($sqlCommands as $command){
        $trimmedCommand = trim($command);
        if (!empty($trimmedCommand)) {
            $conn->exec($trimmedCommand);
        }
    }


} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
