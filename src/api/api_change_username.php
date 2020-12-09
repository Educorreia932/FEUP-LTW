<?php
    if(!isset($_SESSION)) 
        session_start(); 

    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/users.php'); 

    $currUsername = $_POST["currentUsername"];
    $newUsername = $_POST["newUsername"];

    echo changeUsername($currUsername, $newUsername);
?>