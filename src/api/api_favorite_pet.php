<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/comments.php'); 
    include_once(ROOT . '/database/pets.php'); 
    include_once(ROOT . '/database/users.php'); 

    echo $_POST["pet_id"];
?>