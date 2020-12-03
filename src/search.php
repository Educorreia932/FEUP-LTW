<?php
    if(!isset($_SESSION)) 
        session_start(); 

    include_once("templates/common/header.php");

    include_once("database/connection.php");
    include_once("database/pets.php");

    $pets = getSearchedPets($_GET['name'], $_GET['species']);

    include_once("templates/adoption_list.php");

    include_once("templates/common/footer.php");
?> 