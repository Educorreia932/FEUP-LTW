<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include_once(__DIR__.'/../database/connection.php'); 
    include_once(__DIR__.'/../database/users.php');     

    if (getUser($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];     

        header('Location: ../index.php');
    }
?>