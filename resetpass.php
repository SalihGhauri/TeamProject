<?php
include 'ConnectDB.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    
    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        
        $resetLink = "https://cs2team10.cs2410-web01pvm.aston.ac.uk/resetpassform.php?email=" . urlencode($email);
        $subject = "Password Reset Request";
        $message = "Click the link below to reset your password:\n\n$resetLink";
        $headers = "From: tenteam010@gmail.com";

        
        if (mail($email, $subject, $message, $headers)) {
            echo "Password reset instructions have been sent to your email.";
        } else {
            echo "Failed to send the email.";
        }
    } else {
        echo "No account found with this email address.";
    }
}
?>
