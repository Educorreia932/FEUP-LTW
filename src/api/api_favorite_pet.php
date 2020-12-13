<?php
    include_once(__DIR__ . "/../config.php");

    if (session_status() == PHP_SESSION_NONE){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
    }

    // User is logged in
    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
        require_once(ROOT . "/database/connection.php");
        require_once(ROOT . "/database/users.php");
        require_once(ROOT . "/database/pets.php");

        $user = getUser($_SESSION['username'], $_SESSION['password']);
        $username = $user['Username'];
        $pet_id = $_POST["pet_id"];

        // Pet wasn't already in favorites list
        if (!favoritedPet($username, $pet_id)) {
            addFavoritePet($pet_id, $username);
            echo "Added to favorites";
        }

        // Pet was already in favorites list
        else {
            removeFavoritePet($pet_id, $username);
            echo "Removed from favorites";
        }
    }

    // User is not logged in
    else {
        var_dump(http_response_code(401));
    }
?>