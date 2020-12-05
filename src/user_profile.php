<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include_once("templates/common/header.php");

    include_once("database/connection.php");
    include_once("database/users.php");
    include_once("database/pets.php");

    $user = getUser($_SESSION['username'], $_SESSION['password']);

    $user_name = $user['Name'];
    drawHeader("Helper Shelter - $user_name's Profile");

    include_once("templates/user_profile.php");

    include_once("templates/common/footer.php");
?>