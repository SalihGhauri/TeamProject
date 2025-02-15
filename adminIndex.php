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
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<!--creates buttons for the user to direct them to different pages after being logged in-->
<div class = "adminButton-group1">
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/editProduct.php">
	<button class = "button1">Edit a Product</button>
</a>
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/editUsers.php">
	<button class = "button1">Edit Users</button>
</a>
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/inventoryManagement.php">
	<button class = "button1">Manage Inventory</button>
</a>
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/processOrder.php">
	<button class = "button1">Process an Order</button>
</a>
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/changePassword.php">
	<button class = "button1">Change Password</button>
</a>
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/viewStatus.php">
	<button class = "button1">View Status</button>
</a>
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/customerView.php">
	<button class = "button1">Customer View</button>
</a>
</div>
</body>
</html>