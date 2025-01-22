<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(181, 181, 181);
        }

        .calculator {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
        }

        input[type="text"] {
            grid-column: span 4;
            font-size: 32px;
            padding: 10px;
            text-align: right;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f1f1f1;
            margin-bottom: 10px;
            color: #333;
        }

        button {
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            font-size: 24px;
            padding: 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button:hover {
            background-color: #ddd;
        }

        .equal {
            background-color: #4CAF50;
            color: white;
        }

        .equal:hover {
            background-color: #45a049;
        }

        .clear {
            background-color: #f44336;
            color: white;
        }

        .clear:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <form action="process.php" method="post">
        <div class="calculator">
            <!-- Display area -->
            <input type="text" name="display" id="Show" value="<?php echo $_GET['result'] ?? ''; ?>" readonly>

            <!-- Buttons -->
            <button type="submit" name="btn" value="7">7</button>
            <button type="submit" name="btn" value="8">8</button>
            <button type="submit" name="btn" value="9">9</button>
            <button type="submit" name="btn" value="/">/</button>

            <button type="submit" name="btn" value="4">4</button>
            <button type="submit" name="btn" value="5">5</button>
            <button type="submit" name="btn" value="6">6</button>
            <button type="submit" name="btn" value="*">*</button>

            <button type="submit" name="btn" value="1">1</button>
            <button type="submit" name="btn" value="2">2</button>
            <button type="submit" name="btn" value="3">3</button>
            <button type="submit" name="btn" value="-">-</button>

            <button type="submit" name="btn" value="0">0</button>
            <button type="submit" name="btn" value="C" class="clear">C</button>
            <button type="submit" name="btn" value="=" class="equal">=</button>
            <button type="submit" name="btn" value="+">+</button>
        </div>
    </form>

</body>
</html>
