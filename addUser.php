<?php
//connects to db credentials
$dbname = "cs2team10_db";
$dbhost = "localhost";
$username = "cs2team10";
$password = "3WqYX34Scob8B1n";
//connects to the database
try {
  	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
//sets the error mode to exception
  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="CSS/sideheader.css">
    <link rel="stylesheet" href="CSS/dashboard.css">
    <link rel="stylesheet" href="CSS/adduser.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="sidebar-title">Admin Dashboard</h2>
        <div class="menu">
            <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-box"></i> Inventory</a>
            <a href="#"><i class="fas fa-users"></i> Customers</a>
            <a href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
            <a href="#"><i class="fas fa-chart-line"></i> Report</a>
        </div>
        <div class="bottom-menu">
            <a href="#"><i class="fas fa-home"></i> Home</a>
            <a href="#"><i class="fas fa-sign-out-alt"></i> Log out</a>
        </div>
    </div>

    <!--============================ CUSTOMER LIST =====================-->

    <div class="container">
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="card-header">
                        <h4>Add User</h4>
                        <a href="users.php" class="btn-danger">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="addUserLogic.php">
                            <div class="form-container">
                                <div class="form-group">
                                 	<label for="firstname">FirstName:</label>
        							<input type="text" id="firstname" name="firstname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">LastName:</label>
       							    <input type="text" id="lastname" name="lastname" class="form-control">
                                </div>
                                <div class="form-group">
                                   <label for="email">Email:</label>
       							   <input type="email" id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="varchar" id="password" name="password" class="form-control">
                                </div>
                                <div class="form-group">
  									<label for="dob">DOB:</label>
       							    <input type="date" id="dob" name="dob" class="form-select">
                                </div>
                            </div>
                            <button type="submit" name="saveUser" class="btn btn-success">Save</button>
                        </form>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    </body>
   