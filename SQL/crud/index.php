<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="css/styles.css"> 
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="container main-content">
    <div class="container-header">
      <h2>Employee Details</h2>
      <button class="add-btn" >Add New Employee</button>
    </div>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Address</th>
          <th>Salary</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- PHP code to fetch and display employee details will go here -->
        <!-- Example row -->
         <?php 
            include 'configFile.php';
            // include 'delete.php';

            $statment = $conn->prepare("SELECT * FROM Employees");
            $statment->execute();
            $i = 1;
            foreach($statment->fetchAll(PDO::FETCH_ASSOC) as $employee) {
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $employee['name'] . "</td>";
                echo "<td>" . $employee['address'] . "</td>";
                echo "<td>" . $employee['salary'] . "</td>";
                echo "<td>";
                echo "<form action='read.php' method='post' style='display:inline;'>
                  <input type='hidden' name='id' value='" . $employee['id'] . "'>
                  <button class='action-btn'  name='id' title='View' type='submit' value='" . $employee['id'] . "' ><i class='bx bx-show'></i></button>
                  </form>";
                echo "<form action='update.php' method='GET' style='display:inline;'>
                  <input type='hidden' name='id' value='" . $employee['id'] . "'>
                  <button class='action-btn' title='Edit' type='submit'><i class='bx bx-pencil'></i></button>
                  </form>";
                  echo "<form action='delete.php' method='POST' style='display:inline;'>
          <input type='hidden' name='id' value='" . $employee['id'] . "'>
          <button class='action-btn' title='Delete' type='submit'>
              <i class='bx bx-trash'></i>
          </button>
      </form>";

                echo "</td>";
                echo "</tr>";
                echo "<tr style='display: none;'>";
                echo "<td colspan='5'>";
                echo "<p>Additional details about " . $employee['name'] . "...</p>";
                echo "</td>";
                echo "</tr>";
            }
         ?>
         <div class="form-container" style="display: none;">
      <h2>+ Add Employee</h2>
      <form action="create.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>
        
        <label for="salary">Salary:</label>
        <input type="number" id="salary" name="salary" required>
        
        <button type="submit">Submit</button>
      </form>
    </div>
  <script src="Script/script.js"></script>
</body>
</html>