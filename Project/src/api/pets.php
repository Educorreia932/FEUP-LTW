<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/pets.php'); 

    $pets = getAllPets();

    header('Content-Type: application/json');
    echo json_encode($pets, JSON_PRETTY_PRINT);
?>