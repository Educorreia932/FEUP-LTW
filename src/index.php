<?php
    include_once("templates/common/header.php");

    include_once("database/connection.php");
    include_once("database/pets.php");

    $pets = getAllPets();

    include_once("templates/adoption_list.php");

    include_once("templates/common/footer.php");
?> 