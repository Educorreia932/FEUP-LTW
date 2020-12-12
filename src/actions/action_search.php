<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION))  
    { 
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
    } 

    include_once(ROOT . "/database/connection.php"); 
    include_once(ROOT . "/database/pets.php");     

    $name = $_GET['name'];
    $species = $_GET['species'];

    header("Location: ../pages/search.php?name=$name&species=$species");
?>