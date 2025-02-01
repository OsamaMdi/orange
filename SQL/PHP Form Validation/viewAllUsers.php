<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usaers Details</title>
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/styleViewAllUser.css">
</head>
<body>
    <div class="container">
        <div class="container-header" id="hiddenHeader">
            <h2>Users Details</h2>
            <button  class="add-btn" onclick="toggleForm()">Add New User</button>
            <button  class="admin-btn" onclick="toggleAdminTable()">Show Admin Table</button>
            <button  class="add-btn" onclick="window.location.href='homePage.php'">Go To Dashboard</button>
        </div>

        <!-- Users Table -->
        <div class="table-container" id="users-table">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phon Number</th>
                        <th>User Image</th>
                        <th>Account Created On:</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php
                    include 'config.php';

                    $statment = $conn->prepare("SELECT * FROM users");
                    $statment->execute();
                    $i = 1;
                    foreach($statment->fetchAll(PDO::FETCH_ASSOC) as $user) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $user['id'] . "</td>";
                        echo "<td>" . $user['name'] . "</td>";
                        echo "<td>" . $user['email'] . "</td>";
                        echo "<td>" . $user['password'] . "</td>";
                        echo "<td>" . $user['phone_number'] . "</td>";
                        echo "<td>" . $user['userimg'] . "</td>";
                        echo "<td>" . $user['date_created'] . "</td>";
                        echo "<td>";
                        echo "<form action='update.php' method='GET' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $user['id'] . "'>
                            <button class='action-btn' title='Edit' type='submit'><i class='bx bx-pencil'></i></button>
                            </form>";
                        echo "<form action='delete.php' method='POST' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $user['id'] . "'>
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

        <!-- Add user Form -->
        <div class="form-container" id="add-user-form" style="display: none;">
            <h2>+ Add User</h2>
            <form action="create.php" method="post">
            <label for="name">Enter your Full name:</label>
        <input type="text" id="name" name="name" required> 
        <br>
        <label for="phone">Enter your phone Number:</label>
        <input type="tel" id="phone" name="phone" required> 
        <br>
        <label for="email">Enter your Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Enter your password:</label>
        <input type="password" id="password" name="password" required> 
        <br>
        <label for="confirmPassword">Enter Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
        <br>
        <input class="but" type="submit" name="submitRegister" value="Submit" >
        <button class="admin-btn" onclick="location.reload();" style="margin-top: 15;">Back</button>
    </form>
        </div>

        <!-- Admin Table -->
        <div class="table-container" id="admin-table" style="display: none;">
            <h2  style="margin-top: 10px;">Admin Table</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code to fetch admin data will go here -->
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM admin");
                    $stmt->execute();
                    $i = 1;
                    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $admin) {
                        echo "<tr>";
                        echo "<td>" . $i++ . "</td>";
                        echo "<td>" . $admin['user_id'] . "</td>";
                        echo "<td>" . $admin['user_name'] . "</td>";
                        echo "<td>" . $admin['role'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button class="add-btn" onclick="hidAdmin()" style="margin-top: 10px;">hiddening Admin table</button>
            <button class="add-btn"  onclick="AddAdmin()" style="margin-top: 10px;">Add Admin</button>
        </div>
    </div>
                  <!-- Add Admin -->
    <div class="form-container" id="add-Admin-form" style="display: none;">
            <h2>+ Add Admin</h2>
            <form action="adminAdd.php" method="post">
            <label for="name">Enter ID User:</label>
        <input type="number" id="num" name="idNum" required> 
        <br>
        <input class="but" type="submit" name="submitAddAdmin" value="Submit" >
            </form>
            <button class="admin-btn" onclick="location.reload();" style="margin-top: 15;">Back</button>
        </div>

    <script>
         document.getElementById("password").addEventListener("keydown", function(event) {
        if (event.key === " ") {
            event.preventDefault(); 
        }
    });
        function toggleForm() {
            document.getElementById('users-table').style.display = 'none';
            document.getElementById('admin-table').style.display = 'none';
            document.getElementById('hiddenHeader').style.display = 'none';
            document.getElementById('add-user-form').style.display = 'block';
        }

        function toggleAdminTable() {
            document.getElementById('admin-table').style.display = 'block';
        }
        function hidAdmin(){
            document.getElementById('admin-table').style.display = 'none';
        }
        function AddAdmin(){
            document.getElementById('users-table').style.display = 'none';
            document.getElementById('admin-table').style.display = 'none';
            document.getElementById('hiddenHeader').style.display = 'none';
            document.getElementById('add-user-form').style.display = 'none';
            document.getElementById('add-Admin-form').style.display = 'block';
        }
    </script>
</body>
</html>
