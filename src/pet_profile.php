<?php

include_once("templates/common/header.php");


include_once("database/connection.php");
include_once("database/pets.php");
include_once("database/users.php");

$pet = getPet($_POST['id']);
$specie = getSpecies($pet["SpeciesID"]);
$comments = getComments($pet['AdoptionPostID']);

drawHeader("Helper Shelter - " . $pet['Name']);

include_once("templates/pet_profile.php");

include_once("templates/pet_profile_comments.php");

include_once("templates/common/footer.php");

?>