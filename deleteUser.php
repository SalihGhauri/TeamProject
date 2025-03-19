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
<!--when the form is submitted it will go to this page to process the logic of adding a user-->
    <form action="deleteUserLogic.php" method="post">    
<!--label for the forms-->
        <label for="user_ID">User ID:</label>
        <input type="int" id="user_ID" name="user_ID" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>