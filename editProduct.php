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
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/addProduct.php">
	<button class >Add a Product</button>
</a>
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/editproduct.php">
	<button class >Edit Product</button>
</a>
<a href="https://cs2team10.cs2410-web01pvm.aston.ac.uk/deleteProduct.php">
	<button class >Delete Product</button>
</a>
</body>
</html>
