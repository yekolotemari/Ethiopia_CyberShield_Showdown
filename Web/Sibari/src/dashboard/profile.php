<?php

    // session_start();
    require "../functions.php";
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: /login.php");
        exit();
    }
    $user = $_SESSION["username"];
    $userid = $_SESSION["user_id"];

    echo user_detail($userid);  
