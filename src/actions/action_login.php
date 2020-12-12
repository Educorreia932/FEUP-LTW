<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION)){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
    }

    include_once(__DIR__ . '/../database/connection.php'); 
    include_once(__DIR__ . '/../database/users.php');     

    if (checkUser($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];  
        $_SESSION['password'] = $_POST['password'];   

        header('Location: ../index.php');
    }

    else 
        header('Location: ../pages/login.php');
?>  