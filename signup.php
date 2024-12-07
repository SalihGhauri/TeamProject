<?php
$dbname = "cs2team10_db";
$dbhost = "localhost";
$username = "cs2team10";
$password = "3WqYX34Scob8B1n";

try {
  $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
  //sets the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //users input
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $email = $_POST['email'];
  $dob = $_POST['dob'];

  //prepares the statement
  $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, password, email, dob) VALUES (:firstname, :lastname, :password, :email, :dob)");

  //binds the parameters
  $stmt->bindParam(':firstname', $firstname);
  $stmt->bindParam(':lastname', $lastname);
  $stmt->bindParam(':password', $password);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':dob', $dob);

  //executes the statement
  $stmt->execute();

  echo "New user created successfully";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//closes the connection
$conn = null;
?>
