<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/pets.php'); 
    include_once(ROOT . '/database/search.php'); 

    $name = $_POST["name"];
    $color = $_POST["color"]; 
    $min_weight = $_POST["min_weight"];
    $max_weight = $_POST["max_weight"];
    $min_age = $_POST["min_age"];
    $max_age = $_POST["max_age"];
    $species = $_POST["species"];
    $size = $_POST["size"];

    echo json_encode(getSearchResults($name, $color, $min_weight, $max_weight, $min_age, $max_age, $species, $size));
?>