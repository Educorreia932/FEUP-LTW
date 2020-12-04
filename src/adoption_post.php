<?php
    if(!isset($_SESSION)) 
        session_start(); 

    include_once("templates/common/header.php");
    drawHeader("Helper Shelter - Adoption Posts");

    include_once("templates/adoption_post.php");

    include_once("templates/common/footer.php");
?>