<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION))  
    { 
        session_start(); 
    } 

    include_once(ROOT . "/database/connection.php"); 
    include_once(ROOT . "/database/pets.php");     

    $name = $_GET['name'];
    $species = $_GET['species'];

    header("Location: ../pages/search.php?name=$name&species=$species");
?>