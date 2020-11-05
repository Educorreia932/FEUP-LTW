<?php
    session_start();

    include_once('database/connection.php'); 
    include_once('database/users.php');     

    // TODO: Verify if username already exists

    addUser($_POST['username'], sha1($_POST['password']), $_POST['name']);

    header('Location: ../index.php');
?>