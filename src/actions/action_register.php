<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include_once(__DIR__.'/../database/connection.php'); 
    include_once(__DIR__.'/../database/users.php');     

    // TODO: Verify if username already exists

    addUser($_POST['username'], sha1($_POST['password']), $_POST['name']);

    header('Location: ../index.php');
?>