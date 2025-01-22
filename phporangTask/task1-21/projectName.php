<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Determine Project and Script Name</title>
    <style>
        /* إعدادات عامة للصفحة */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: #fff;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 700px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2.5rem;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        .info {
            font-size: 1.2rem;
            margin: 10px 0;
            color: #e0e0e0;
            padding: 10px 0;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.3);
        }

        .time {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffd700;
            margin: 20px 0;
        }

        .divider {
            margin: 20px 0;
            border-top: 2px dashed rgba(255, 255, 255, 0.3);
        }

        .counter, .visitors, .cookie {
            font-size: 1.5rem;
            font-weight: bold;
            margin: 20px 0;
            color: #4cff4c;
        }

        .cookie {
            color: #ff6961;
        }

        strong {
            color: #ffd700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Project and Script Information</h1>

        <?php
        date_default_timezone_set("Asia/Amman");
        echo "<div class='time'>The time is " . date("h:i:sa") . "</div>";
        echo "<div class='divider'></div>";

        session_start();
        if (empty($_SESSION['number'])) {
            $_SESSION['number'] = 0; 
        }
        echo "<div class='counter'>Session Counter: " . ++$_SESSION['number'] . "</div>";
        echo "<div class='divider'></div>";

        $projectName = "projectName.php";
        $scriptName = $_SERVER['SCRIPT_NAME'];

        echo "<div class='info'><strong>Project Name:</strong> $projectName</div>";
        echo "<div class='info'><strong>Script Name:</strong> $scriptName</div>";
        echo "<div class='divider'></div>";

        $file = 'osama.txt';

        if (file_exists($file)) {
            $count = file_get_contents($file);
        } else {
            $count = 0;
        }

        $count++;
        file_put_contents($file, $count);

        echo "<div class='visitors'>Number of visitors: " . $count . "</div>";
        echo "<div class='divider'></div>";

        $cookie_name = "user";
        $cookie_value = "Osama";
        $cookie_time = time() + (86400 * 30);
        $cookie_delete_time = time() - 3600; 
        setcookie($cookie_name, $cookie_value, $cookie_time, "/");
        if (!empty($_COOKIE[$cookie_name])) {
            echo "<div class='cookie'>Cookie still exists: " . $_COOKIE[$cookie_name] . "</div>";
            setcookie($cookie_name, "", $cookie_delete_time, "/");
        } else {
            echo "<div class='cookie'> no cookie</div>";
        }
        ?>
    </div>
</body>
</html>
