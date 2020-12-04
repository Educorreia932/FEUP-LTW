<?php
    if(!isset($_SESSION)) 
        session_start(); 

    include_once("templates/common/header.php");
    drawHeader("Helper Shelter - Main Page");

    include_once("database/connection.php");
    include_once("database/pets.php");

    $pets = getAllPets();

    include_once("templates/adoption_list.php");

    include_once("templates/common/footer.php");
?> 