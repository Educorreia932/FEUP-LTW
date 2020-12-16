<?php
    include_once(__DIR__ . "/../config.php");

    if (session_status() == PHP_SESSION_NONE){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
          }
    }

    require_once(ROOT . "/database/connection.php");
    require_once(ROOT . "/database/users.php");
    require_once(ROOT . "/templates/common/header.php");
    require_once(ROOT . "/database/adoption_proposal.php");
    
    if(!empty($_GET['user'])) {
        $user_requested = $_GET['user'];

        if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
            require_once(ROOT . "/database/pets.php");

            if(($user = getUserByUsername($user_requested)) == null) {
                drawHeader("Helper Shelter - Invalid page");
                require_once(ROOT . "/templates/invalid_page.php");
            }
            
            else {
                $username = $user['Name'];
                drawHeader("Helper Shelter - $user_requested's Profile");
                require_once(ROOT . "/templates/user_profile.php");
            }
        } 
        
        else {
            echo '<script language="javascript">
                    alert("Please log in to access user profile!");
                    window.location.href="../index.php";
                    </script>';
        }
    } 
    
    else {
        drawHeader("Helper Shelter - Invalid page");
        require_once(ROOT . "/templates/invalid_page.php");
    }

    require_once(ROOT . "/templates/common/footer.php");
?>