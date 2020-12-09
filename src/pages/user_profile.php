<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION)) 
        session_start(); 

    include_once(ROOT . "/templates/common/header.php");
    
    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
        include_once(ROOT . "/database/connection.php");
        include_once(ROOT . "/database/users.php");
        include_once(ROOT . "/database/pets.php");

        include_once(ROOT . "/classes/Pet.php");

        $user = getUser($_SESSION['username'], $_SESSION['password']);

        $user_name = $user['Name'];
        drawHeader("Helper Shelter - $user_name's Profile");

        include_once(ROOT . "/templates/user_profile.php");
    }
    
    else {
        echo '<script language="javascript">
                alert("Please log in to access user profile!");
                window.location.href="/index.php";
                </script>';
        }

    include_once(ROOT . "/templates/common/footer.php");
?>