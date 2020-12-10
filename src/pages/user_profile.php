<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION)) 
        session_start(); 

    require_once(ROOT . "/templates/common/header.php");
    
    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
        require_once(ROOT . "/database/connection.php");
        require_once(ROOT . "/database/users.php");
        require_once(ROOT . "/database/pets.php");

        $user = getUser($_SESSION['username'], $_SESSION['password']);

        $username = $user['Name'];
        drawHeader("Helper Shelter - $username's Profile");

        require_once(ROOT . "/templates/user_profile.php");
    }
    
    else {
        echo '<script language="javascript">
                alert("Please log in to access user profile!");
                window.location.href="/index.php";
                </script>';
        }

    require_once(ROOT . "/templates/common/footer.php");
?>