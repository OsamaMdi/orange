<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleProcess.css">
    <title>Process Page</title>
</head>
<body>
    
</body>
</html>
<?php
require 'config.php';
  // print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] ){
   
    if (isset($_POST['name'])){
        
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']); 
        $confirmPassword = trim($_POST['confirmPassword']);
        $phone = trim($_POST['phone']);
     
        
        $errors = [];
    
        
        if (empty($name)) {
            $errors['name'] = "* Please enter your name.";
        } else {
            $nameParts = array_filter(explode(" ", trim($name)));
        
            if (count($nameParts) !== 4) {
                $errors['name'] = "* Name must contain exactly four words.";
            } else {
                foreach ($nameParts as $part) {
                    if (!preg_match('/^[A-Za-z]+$/', $part)) {
                        $errors['name'] = "* Name must contain only alphabetic characters (A-Z, a-z).";
                        break;
                    }
                }
            }
        }
       
      
        if (empty($email)) {
            $errors['email'] = "* Please enter the email.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "* This email is not valid. Please enter a valid email.";
        }
    
        if (empty($password)) {
            $errors['password'] = "* Please enter your password.";
        } elseif (strlen($password) < 8 || strlen($password) > 14) {
            $errors['password'] = "* The password must be between 8 and 14 characters.";
        } elseif (!preg_match('/[a-z]/', $password)) {
            $errors['password'] = "* The password must contain at least one lowercase letter.";
        } elseif (!preg_match('/[A-Z]/', $password)) {
            $errors['password'] = "* The password must contain at least one uppercase letter.";
        } elseif (!preg_match('/[0-9]/', $password)) {
            $errors['password'] = "* The password must contain at least one number.";
        } elseif (!preg_match('/[^\w\s]/', $password)) {
            $errors['password'] = "* The password must contain at least one special character.";
        }
    
       
        if ($password !== $confirmPassword) {
            $errors['confirmPassword'] = "* The confirm password does not match the password.";
        }
    
    
        if (empty($phone)) {
            $errors['phone'] = "* Please enter your phone number.";
        } elseif (!preg_match('/^0(77|78|79)[0-9]{7}$/', $phone)) {
           
            $errors['phone'] = "* Please enter a valid phone number in the format 07XYYYYYYY.";
        }

   
        if (empty($errors)) {
            
            try {
                
                $sql = "INSERT INTO users (name, email, password, phone_number) VALUES (:name, :email, :password, :phone_number)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => password_hash($password, PASSWORD_DEFAULT), 
                    ':phone_number' => $phone
                ]);
                header("Location: login.html");
                exit();
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    $errors['Email'] = "* The email is already registered. Please use another email.";
            echo '<div class="error-container">';
                echo '<h1>Error</h1>';
                foreach ($errors as $error) {
                    echo "<p><span>•</span> $error</p>";
            }
            echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
            echo '</div>';
            exit();
                } else {

                   $errors["An error occurred: "] = htmlspecialchars($e->getMessage()) ;
            echo '<div class="error-container">';
                echo '<h1>Error</h1>';
                foreach ($errors as $error) {
                    echo "<p><span>•</span> $error</p>";
            }
            echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
            echo '</div>';
            exit();
                }
            }
        }
        else {
            echo '<div class="error-container">';
            echo '<h1>Error</h1>';
            foreach ($errors as $error) {
                echo "<p><span>•</span> $error</p>";
            }
            echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
            echo '</div>';
            exit();
        }
    }

        // Checked login
     else {
        
        session_start();

        if(isset( $_POST['email'])){
            
        $email = $_POST['email'];
        $password = $_POST['password'];
        
                
        $errors = [];
           //  Checked email
        if (empty($email)) {
            $errors['email'] = "* Please enter the email.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "* This email is not valid. Please enter a valid email.";
        }
            //  Checked password
        if (empty($password)) {
            $errors['password'] = "* Please enter your password.";
        } elseif (strlen($password) < 8 || strlen($password) > 14) {
            $errors['password'] = "* The password must be between 8 and 14 characters.";
        } elseif (!preg_match('/[a-z]/', $password)) {
            $errors['password'] = "* The password must contain at least one lowercase letter.";
        } elseif (!preg_match('/[A-Z]/', $password)) {
            $errors['password'] = "* The password must contain at least one uppercase letter.";
        } elseif (!preg_match('/[0-9]/', $password)) {
            $errors['password'] = "* The password must contain at least one number.";
        } elseif (!preg_match('/[^\w\s]/', $password)) {
            $errors['password'] = "* The password must contain at least one special character.";
        }

        if (empty($errors)) {
          
        try {
            
            
           
            $sql = "SELECT email,password,id FROM users WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['email' => $email]);
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] =   $user['id'] ;
                    echo $_SESSION['user_id'];
                     header("Location: homePage.php");
                    exit();
                } else {
                    $errors['password'] = "Invalid password: (" .$password . "). Please try again.";
                    echo '<div class="error-container">';
                    echo '<h1>Error</h1>';
                    foreach ($errors as $error) {
                        echo "<p><span>•</span> $error</p>";
                }  
                echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
                    echo '</div>';
                    exit();
            }
            } else {
                $errors['Email'] = "No account found with this email: ($email). Please register first.";
                echo '<div class="error-container">';
                echo '<h1>Error</h1>';
                foreach ($errors as $error) {
                    echo "<p><span>•</span> $error</p>";
            }  
            echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
                    echo '</div>';
                    exit();
            }
        } catch (PDOException $e) {
            $errors['Erorr'] = $e->getMessage();
            echo '<div class="error-container">';
                echo '<h1>Error</h1>';
                foreach ($errors as $error) {
                    echo "<p><span>•</span> $error</p>";    
                    echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
                    echo '</div>';
                    exit();  
            }
            echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
                    echo '</div>';
                    exit();
        }
    }
    else {
        echo '<div class="error-container">';
    echo '<h1>Error</h1>';
    foreach ($errors as $error) {
        echo "<p><span>•</span> $error</p>";
    }
    echo '<a href="javascript:history.back()" class="back-btn">Go Back</a>';
    echo '</div>';
    exit();
    }
    }
    else {
        echo "There is an error, please try again.";
    }
}
    
}

?>
