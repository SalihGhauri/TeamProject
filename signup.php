<?php
require_once 'connectDB.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
//hashes the password 
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $dob = $_POST['dob'];

//prepares the statement
    $stmt = $conn->prepare("INSERT INTO Users (firstname, lastname, password, email, dob) VALUES (:firstname, :lastname, :password, :email, :dob)");
//binds parameters
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);

//executes the statement
    $stmt->execute();

    echo "New user created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//closes the connection
$conn = null;
?>