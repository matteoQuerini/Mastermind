<?php

    session_start();

    $usernameInput =  $_POST["username"];
    $passwordInput =  $_POST["password"];

    $username = "admin";
    $password = "1qaz!QAZ";


    if ($usernameInput == $username && $passwordInput == $password){
        $_SESSION['loggato'] = true;
        header("Location: dashboard.php");

    } else {
        header("Location: index.html");
    }
?>
