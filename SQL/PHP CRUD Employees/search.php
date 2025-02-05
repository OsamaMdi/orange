<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleSeearch.css">
    <title>Document</title>
</head>
<body>
    

<?php

echo "Employee ID: " . $_POST['id'];
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        

        $sql = "SELECT * FROM employees WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($employee) {
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>#</th><th>ID</th><th>Name</th><th>Address</th><th>Salary</th><th>Off Days</th><th>Actions</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td>1</td>";
            echo "<td>" . $employee['id'] . "</td>";
            echo "<td>" . $employee['name'] . "</td>";
            echo "<td>" . $employee['address'] . "</td>";
            echo "<td>" . $employee['salary'] . "</td>";
            echo "<td>" . $employee['off_days'] . "</td>";
            echo "<td>";
            echo "<form action='read.php' method='post' style='display:inline;'>
                    <input type='hidden' name='id' value='" . $employee['id'] . "'>
                    <button class='action-btn' name='id' title='View' type='submit' value='" . $employee['id'] . "'>
                        <i class='bx bx-show'></i>
                    </button>
                  </form>";
            echo "<form action='update.php' method='GET' style='display:inline;'>
                    <input type='hidden' name='id' value='" . $employee['id'] . "'>
                    <button class='action-btn' title='Edit' type='submit'>
                        <i class='bx bx-pencil'></i>
                    </button>
                  </form>";
            echo "<form action='delete.php' method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='" . $employee['id'] . "'>
                    <button class='action-btn' title='Delete' type='submit'>
                        <i class='bx bx-trash'></i>
                    </button>
                  </form>";
            echo "</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "Employee not found.";
        }
    } else {
        echo "Invalid ID.";
    }
} else {
    echo "No ID provided.";
}
?>
</body>
</html>
