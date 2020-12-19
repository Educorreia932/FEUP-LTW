<?php
    include_once(__DIR__ . "/../config.php");


    if(!isset($_SESSION)){
        session_start(); 
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
          }
    }

    include_once(ROOT . "/database/connection.php");
    include_once(ROOT . "/database/users.php");


    include_once(ROOT . "/templates/common/header.php");
    
    drawHeader("Helper Shelter - Search Pet");

    include_once(ROOT . "/database/pets.php");
    include_once(ROOT . "/database/search.php");
        
    include_once(ROOT . "/templates/search_parameters.php");

    $pets = getSearchResults($name, $color, $min_weight, $max_weight, $min_age, $max_age, $species, $size);

    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
        $user = getUser($_SESSION['username']);
        $username = $user['Username'];
    }

    else 
        $username = NULL;
    
    include_once(ROOT . "/templates/adoption_grid.php");
    include_once(ROOT . "/templates/common/footer.php");
?>