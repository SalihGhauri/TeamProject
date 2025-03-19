<?php
//connects to db credentials
$dbname = "cs2team10_db";
$dbhost = "localhost";
$username = "cs2team10";
$password = "3WqYX34Scob8B1n";
//connects to database
try{
	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
//sets error mode to exception
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user_ID = $_POST['user_ID'];

// Prepares the statements and binds the parameters
    $stmt = $conn->prepare("DELETE FROM Users WHERE user_ID = :user_ID");
    $stmt->bindParam(':user_ID', $user_ID);


// Executes the statement
    $stmt->execute();

    echo "User deleted";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//Closes the connection
$conn = null;
?>