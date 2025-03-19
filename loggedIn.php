<?php
//starts the session
session_start();

//if the uid is not set takes the user back to the login page
if (!isset($_SESSION['user_ID'])) {
    header('Location: login.html');
    exit;
}
if (isset($_SESSION['user_ID'])) {
    if ($_SESSION['accessLevel'] === 'Admin') {
        header('Location: adminIndex.php');
        exit;
    } else {
    header('Location: index.html');
exit;
}
}
?>