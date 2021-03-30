<?php
    include_once(__DIR__ . "/../config.php");

    if (session_status() == PHP_SESSION_NONE){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
          }
    }


    include_once(__DIR__ . '/../database/connection.php'); 
    include_once(__DIR__ . '/../database/users.php');     

    if (checkUser($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];  

        header('Location: ../index.php');
    }

    else 
        header('Location: ../pages/login.php');
?>  