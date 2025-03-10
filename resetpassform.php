<?php
include 'ConnectDB.php'; 

if (!isset($_GET['email'])) {
    header("Location: resetpassword.html");
    exit;
}
$email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);

    try {
        $stmt = $conn->prepare("SELECT * FROM Users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $newPassword = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                if ($newPassword !== $confirmPassword) {
                    echo "Passwords do not match. Please try again.";
                    exit;
                }

                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

                $stmt = $conn->prepare("UPDATE Users SET password = :password WHERE email = :email");
                $stmt->execute([
                    'password' => $hashedPassword,
                    'email' => $email
                ]);

                echo "Your password has been successfully reset.";
                exit;
            }
        } else {
            echo "Invalid email. Please request a new password reset.";
            exit;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "no email provided.";
    exit;
}
?>
