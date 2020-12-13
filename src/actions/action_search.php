<?php
    include_once(__DIR__ . "/../config.php");

    if (session_status() == PHP_SESSION_NONE){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
          }
    } 

    include_once(ROOT . "/database/connection.php"); 
    include_once(ROOT . "/database/pets.php");     

    $name = $_GET['name'];
    $species = $_GET['species'];

    header("Location: ../pages/search.php?name=$name&species=$species");
?>