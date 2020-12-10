<?php
    include_once(__DIR__ . "/../config.php");

    if (!isset($_SESSION)) 
        session_start(); 

    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
        require_once(ROOT . "/database/connection.php");
        require_once(ROOT . "/database/users.php");
        require_once(ROOT . "/database/pets.php");

        $user = getUser($_SESSION['username'], $_SESSION['password']);
        $username = $user['Username'];
        $pet_id = $_POST["pet_id"];

        if (!favoritedPet($username, $pet_id))
            echo "Added to favroites" ;

        else 
            echo "Removed from favorites";
    }

    else {
        echo "Not logged in";
    }
?>