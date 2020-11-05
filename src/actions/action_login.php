<?php
    session_start();

    include_once('database/connection.php'); 
    include_once('database/users.php');     

    if (getUser($_POST['username'], $_POST['password'])) {
        $_SESSION['username'] = $_POST['username'];     

        header('Location: ../index.php');
    }
?>