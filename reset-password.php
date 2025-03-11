<?php
include 'ConnectDB.php';

if (!isset($_GET['email'])) {
    header("Location: resetpassword.html");
    exit;
}

$email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);

try {
    $stmt = $conn->prepare("SELECT * FROM Users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user) {
        echo "Invalid email. Please request a new password reset.";
        exit;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['password']) || !isset($_POST['confirm_password'])) {
            echo "Both password fields are required.";
            exit;
        }
        
        $newPassword = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        
        if (strlen($newPassword) < 8) {
            echo "Password must be at least 8 characters long.";
            exit;
        }

        if ($newPassword !== $confirmPassword) {
            echo "Passwords do not match. Please try again.";
            exit;
        }
        
        // Hash password and update database
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $updateStmt = $conn->prepare("UPDATE Users SET password = :password WHERE email = :email");
        $updateStmt->bindParam(':password', $hashedPassword);
        $updateStmt->bindParam(':email', $email);
        $result = $updateStmt->execute();
        
        if ($result) {
            echo "Your password has been successfully reset. You can now <a href='login.html'>login</a> with your new password.";
        } else {
            echo "Failed to update password. Please try again.";
        }
        exit;
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 320px;
        }
        input {
            margin-bottom: 15px;
            padding: 10px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        #error-message {
            margin-bottom: 10px;
            color: red;
            display: none;
        }
    </style>
</head>
<body>
    <form id="resetForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'] . '?email=' . urlencode($email)); ?>" method="POST">
        <h1>Reset Your Password</h1>
        <input type="password" id="password" name="password" placeholder="New Password*" required>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm New Password*" required>
        <span id="error-message">Passwords do not match!</span>
        <button type="submit">Reset Password</button>
    </form>

    <script>
        const form = document.getElementById('resetForm');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const errorMessage = document.getElementById('error-message');
        
        confirmPassword.addEventListener('input', function() {
            if (password.value !== confirmPassword.value) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });
        
        form.addEventListener('submit', function(event) {
            if (password.value !== confirmPassword.value) {
                event.preventDefault();
                errorMessage.style.display = 'block';
            }
            
            if (password.value.length < 8) {
                event.preventDefault();
                alert('Password must be at least 8 characters long.');
            }
        });
    </script>
</body>
</html>
