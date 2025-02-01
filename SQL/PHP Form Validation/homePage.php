<?php
 require 'config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="css/styleHome.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Dashboard</h1>
        <p id="welcomeMessage">Hello,
            <?php
             
            session_start();
            $id =   $_SESSION['user_id'];
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id' => $id] );
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $nameParts = explode(" ", $user['name']);
            $firstName = $nameParts[0];
            echo $firstName; 
             
            $sql = "SELECT * FROM admin WHERE user_id = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['user_id' => $id] );
            
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);
             ?>  !</p>
           <?php if(empty($admin)): ?>
         <a href="viewInformation.php"><button  class="button">View Your Information</button></a>
         <?php  else: ?>
            <a href="viewAllUsers.php"><button  class="button">View All Users Information</button></a>
            <?php endif; ?>
        <br><br>
        <a href="index.Html" class="link">Logout</a>
    </div>

    
</body>
</html>
