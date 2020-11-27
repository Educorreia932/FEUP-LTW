<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include_once(__DIR__.'/../database/connection.php'); 
    include_once(__DIR__.'/../database/pets.php');     

    $name = $_GET['name'];
    $species = $_GET['species'];

    header("Location: ../index?name=$name&species=$species.php");
?>