<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include_once(__DIR__.'/../database/connection.php'); 
    include_once(__DIR__.'/../database/pets.php');     

    var_dump($_POST["name"]);
    var_dump($_POST["city"]);
    var_dump($_POST["pet-species"]);
    var_dump($_POST["gender"]);
?>