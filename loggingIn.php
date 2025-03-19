<?php

//style sheet 
echo '<link rel="stylesheet" type="text/css" href="loggingln.css">';

//starts the session
session_start();

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

//if the servere request a post method do this..
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

//prepares the statement
    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user && password_verify($password, $user['password'])) {
//sets the session uid to that of the logged in user
        $_SESSION['user_ID'] = $user['user_ID'];
  echo json_encode(["status" => "success"]);
        } else {
            // Invalid login
            echo json_encode(["status" => "error", "message" => "Invalid email or password"]);
        }
}

//insted of redirecting, it sends a Json response 
} catch(PDOException $e) {
  echo json_encode(["status" => "error", "message" => "Database connection failed"])
}

$conn = null;

?>