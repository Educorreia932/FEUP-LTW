<?php

include_once("templates/common/header.php");


include_once("database/connection.php");
include_once("database/pets.php");

$pet = getPet($_GET['id']);
$specie = getSpecies($pet["SpeciesID"]);



drawHeader("Helper Shelter - " . $pet['Name']);

include_once("templates/pet_profile.php");

include_once("templates/common/footer.php");

?>