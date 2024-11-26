<?php
session_start();
require_once 'connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    if (empty($email)) {
        $_SESSION['email_error'] = "Email address is required";
        header("Location: login.html");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['email_error'] = "Please enter a valid email address";
        header("Location: login.html");
        exit();
    }

    if (empty($password)) {
        $_SESSION['password_error'] = "Password is required";
        header("Location: login.html");
        exit();
    }

    try {
        $stmt = $conn->prepare("SELECT id, email, password, first_name FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if (!$user) {
            $_SESSION['email_error'] = "No account found with this email";
            header("Location: login.html");
            exit();
        }
        
        if (!password_verify($password, $user['password'])) {
            $_SESSION['password_error'] = "Incorrect password";
            header("Location: login.html");
            exit();
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['first_name'];
        header("Location: index.html"); 
        exit();

    } catch(PDOException $e) {
        $_SESSION['login_error'] = "Login failed. Please try again.";
        header("Location: login.html");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: login.html");
    exit();
}
?>