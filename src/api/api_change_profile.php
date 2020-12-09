<?php
    if(!isset($_SESSION)) 
        session_start(); 

    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/users.php'); 

    $username = $_POST["username"];
    $newName = $_POST["newName"];
    $newBio = $_POST["newBio"];
    
    echo changeProfileInfo($username, $newName, $newBio);
?>