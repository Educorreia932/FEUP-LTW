<script src="../scripts/alerts.js"></script>

<?php
    include_once(__DIR__ . "/../config.php");

    if (!preg_match("/[\w]{3,20}/", $_POST['username']) ||
        !preg_match("/^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)/", $_POST['name']) || 
        !preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&\-_])[A-Za-z\d@$!%*#?&\-_]{8,}$/", $_POST['password']))
        return;

    if (session_status() == PHP_SESSION_NONE ){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
        if (!isset($_SESSION['csrf'])) 
            $_SESSION['csrf'] = bin2hex(openssl_random_pseudo_bytes(32));
    }

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/users.php');     

    if (!checkUsername($_POST['username'])) {
        addUser($_POST['username'], $_POST['password'], $_POST['name'], "/images/default-avatar.png");
        header('Location: ../pages/login.php');
    }

    else{
        echo '<script type="text/javascript">
                alertUsedUsername();
            </script>';
    }
?>