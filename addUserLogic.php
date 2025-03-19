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

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $dob = $_POST['dob'];

// Prepares the statements and binds the parameters
    $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, password, email, dob) VALUES (:firstname, :lastname, :password, :email, :dob)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam('lastname', $lastname);
    $stmt->bindParam('password', $password);
    $stmt->bindParam('email', $email);
	$stmt->bindParam('dob', $dob);

// Executes the statement
    $stmt->execute();

    echo "New user added successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//Closes the connection
$conn = null;
?>