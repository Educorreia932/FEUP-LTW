<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include_once("templates/common/header.php");

    include_once("templates/user_profile.php");

    include_once("templates/common/footer.php");
?>