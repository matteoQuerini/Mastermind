<?php
session_start();

$usernameInput = $_POST["username"];
$passwordInput = $_POST["password"];

$username = "admin";

$passwordHash = '$2y$10$4isIBh8DoEE6orHs2iMk8O2b6k/Q5Q6/MahpzUhxj9NNqd.iodCfG';

if ($usernameInput === $username && password_verify($passwordInput, $passwordHash)) {
    $_SESSION['loggato'] = true;
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: index.html");
    exit;
}
?>
