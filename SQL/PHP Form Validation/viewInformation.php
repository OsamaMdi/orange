<?php
 require 'config.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Information</title>
    <link rel="stylesheet" href="css/styleviewInformation.css"> 
</head>
<body>
<?php
             
             session_start();
             $id =  $_SESSION['user_id'];
             $sql = "SELECT * FROM users WHERE id = :id";
             $stmt = $conn->prepare($sql);
             $stmt->execute(['id' => $id] );
             
             $user = $stmt->fetch(PDO::FETCH_ASSOC);
              ?>
    <div class="profile-container">
        <div class="profile-picture">
        <?php if (!empty($user['userimg'])): ?>
            <img src="<?php echo $user['userimg']; ?>" alt="User Image">
            <?php else: ?>
                <img src="img\istockphoto-1337144146-612x612.jpg" alt="Default User Image">
                <?php endif; ?>
        </div>
        <div class="profile-info">
            <h1>User Information</h1>
            <p><strong>Name:</strong> <span id="name"><?php echo $user['name'];?></span></p>
            <p><strong>Email:</strong> <span id="email"><?php echo $user['email'];?></span></p>
            <p><strong>Password:</strong> <span id="password">********</span></p> 
            <p><strong>Phone number:</strong> <span id="creation-date"><?php echo $user['phone_number'];?></span></p>
            <p><strong>Account Created On:</strong> <span id="creation-date"><?php echo $user['date_created'];?></span></p>
        </div>
    </div>
</body>
</html>
