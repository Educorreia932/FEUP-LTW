<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION)){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
          }
    }

    include_once(ROOT . "/templates/common/header.php");
    drawHeader("Helper Shelter - Register");

    if (!(array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])))
        include_once(ROOT . "/templates/forms/register.php");

    else{
        echo '<script language="javascript">
                alert("Already registered!");
                window.location.href="../index.php";
                </script>';
        }

    include_once(ROOT . "/templates/common/footer.php");
?>
