<?php
    include_once("templates/common/header.php");

    include_once("database/connection.php");
    include_once("database/pets.php");

    $pets = getAllPets();

    include_once("templates/list_pets.php");

    include_once("templates/common/footer.php");
?> 