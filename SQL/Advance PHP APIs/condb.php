<?php 
    $host = "localhost";
    $user = "root";
    $password  = "";
    $dbname = "schooldb";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        die ("error: " . $e->getMessage());
    }
?>