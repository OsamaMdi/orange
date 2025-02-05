<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleIndex.css">
    <title>View Details</title>
</head>
<body>
<div class="container">
    <div class="container-header" id="hiddenHeader">
        <h2>Employee Details</h2>
        <form action="search.php" method="post">
    <label for="id">Employee ID You Want To Search:</label>
    <input type="number" name="id" required>
    <button class="action-btn" type="submit">Research</button>
</form>
        <select id="tasks"  onchange="handleTaskSelection()">
        <option value="task" >Employees table</option>
        <option value="task1" >Add New Employee</option> 
        <option value="task2">Display General Employee Statistics</option>
        <option value="task3">Update Salary For All Employees</option>
        <option value="task4">Update Salary For Employee</option>
    </select>
    </div>
    <div class="table-container" id="employees-table">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Off Days</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM employees";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $i = 1;
                foreach($employees as $employee) { 
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
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
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Employee Form -->
    <div class="form-container" id="add-employee-form" style="display: none;">

        <h2>+ Add Employee</h2>
        <form action="create.php" method="post">
            <label for="name">Enter Name:</label>
            <input type="text" id="name" name="name" required> 
            <br>
            <label for="Address">Enter Address:</label>
            <input type="text" id="Address" name="Address" required> 
            <br>
            <label for="salary">Enter Salary:</label>
            <input type="number" id="salary" name="salary" required>
            <br>
            <label for="off_days">Enter Off Days:</label>
            <input type="number" id="off_days" name="off_days" required> 
            <br>
            <input class="but" type="submit" name="submitemployee" value="Submit">
            <button class="btn" onclick="location.reload();">Back</button>
        </form>
    </div>
<div class="generalEmployee" id="Operation" style="display: none;">
    <Table>
        <Tr>
            <td>Type of Operation</td>
            <td>Name</td>
            <td>Address</td>
            <td>Salary</td>
            <td>Off Days</td>
        </Tr>
                            <!-- Highest Salary -->
       <?php
                            try{ 
            $sql = "SELECT * FROM employees ORDER BY salary DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $highestPaidEmployee = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($highestPaidEmployee):
       ?> 
        <Tr>
            <td>Highest Salary</td>
            <td><?php echo  $highestPaidEmployee['name'] ?></td>
            <td><?php echo  $highestPaidEmployee['address'] ?></td>
            <td><?php echo  $highestPaidEmployee['salary'] ?></td>
            <td><?php echo  $highestPaidEmployee['off_days'] ?></td>
        </Tr>
        <?php  else: 
        echo "<p>No employee data found.</p>";
        endif;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
         <!-- Lowest Salary -->
       <?php
                            try{ 
            $sql = "SELECT * FROM employees ORDER BY salary ASC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $LowestPaidEmployee = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($LowestPaidEmployee):
       ?> 
        <Tr>
            <td>Lowest Salary</td>
            <td><?php echo  $LowestPaidEmployee['name'] ?></td>
            <td><?php echo  $LowestPaidEmployee['address'] ?></td>
            <td><?php echo  $LowestPaidEmployee['salary'] ?></td>
            <td><?php echo  $LowestPaidEmployee['off_days'] ?></td>
        </Tr>
        <?php  else: 
        echo "<p>No employee data found.</p>";
        endif;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    </Table>
         <!-- COUNT Of employees -->
       <?php
                            try{ 
     $sql = "SELECT  COUNT(*) FROM employees";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $countEmployees = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($countEmployees):
       ?> 
        <p class="con">Count Of Employees: <?php echo  $countEmployees['COUNT(*)']; ?> </p>
        <?php  else: 
        echo "<p>No employees.</p>";
        endif;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
     <!-- Total salaries -->
     <?php
                            try{ 
     $sql = "SELECT  SUM(salary) AS total_salaries FROM employees";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sumOfSalary = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($sumOfSalary):
       ?> 
        <p class="sum"> Total salaries of all employees: <?php echo  $sumOfSalary['total_salaries'] ?> </p>
        <?php  else: 
        echo "<p>No employees.</p>";
        endif;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>

<button class="btn" onclick="location.reload();">Back</button>
</div>
 <div class="salaryEmploye" id="salaryEmploye" style="display: none;">
 <form action="updateSalary.php" method="post">
    <label for="id">Employee ID You Want :</label>
    <input type="number" name="id" required>
    <br>
    <label for="amount">Employee  You Want To Update Salary:</label>
    <input type="number" name="amount" required>
    <button class="action-btn" name="update_employee" type="submit">Update  Employee' Salary</button>
    <button class="btn" onclick="location.reload();">Back</button>
</form>
 </div>
 <div class="salaryAllEmploye" id="salaryAllEmploye" style="display: none;">
 <form action="updateSalary.php" method="post">
    <label for="amount">Update To Salary You Want:</label>
    <input type="number" name="amount" required>
    <button class="action-btn" name="update_employees" type="submit">Update To Salary For All Employees</button>
    <button class="btn" onclick="location.reload();">Back</button>
</form>
</div>
</div>
<script>
     function handleTaskSelection() {
            var selectedTask = document.getElementById("tasks").value; // الحصول على القيمة المختارة

            
            if (selectedTask === "task1") {
                toggleForm();
            } else if (selectedTask === "task2") {
                generalEmployee();
            } else if (selectedTask === "task3") {
                updateSalaryForAllEmployees();
            } else if (selectedTask === "task4") {
                updateSalaryForEmployee();
            } 
        }
   function toggleForm() {
        document.getElementById('employees-table').style.display = 'none';
        document.getElementById('hiddenHeader').style.display = 'none';
        document.getElementById('add-employee-form').style.display = 'block';
        document.getElementById('Operation').style.display = 'none';
        document.getElementById('salaryAllEmploye').style.display = 'none';
        document.getElementById('salaryEmploye').style.display = 'none';
    } 
    function  generalEmployee(){
        document.getElementById('employees-table').style.display = 'none';
        document.getElementById('hiddenHeader').style.display = 'none';
        document.getElementById('add-employee-form').style.display = 'none';
        document.getElementById('Operation').style.display = 'block';
        document.getElementById('salaryAllEmploye').style.display = 'none';
        document.getElementById('salaryEmploye').style.display = 'none';
    }
    function  updateSalaryForAllEmployees(){
        document.getElementById('employees-table').style.display = 'none';
        document.getElementById('hiddenHeader').style.display = 'none';
        document.getElementById('add-employee-form').style.display = 'none';
        document.getElementById('Operation').style.display = 'none';
        document.getElementById('salaryAllEmploye').style.display = 'block';
        document.getElementById('salaryEmploye').style.display = 'none';
    }
    function  updateSalaryForEmployee(){
        document.getElementById('employees-table').style.display = 'none';
        document.getElementById('hiddenHeader').style.display = 'none';
        document.getElementById('add-employee-form').style.display = 'none';
        document.getElementById('Operation').style.display = 'none';
        document.getElementById('salaryAllEmploye').style.display = 'none';
        document.getElementById('salaryEmploye').style.display = 'block';

    }
    
</script>
</body>
</html>
