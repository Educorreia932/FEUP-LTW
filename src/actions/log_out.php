<?php
    if(!isset($_SESSION)) 
        session_start(); 

    include_once(__DIR__ . '/../database/connection.php'); 
    include_once(__DIR__ . '/../database/users.php');     

    if(array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
        session_destroy();
    header("Location: /index.php")
?>  