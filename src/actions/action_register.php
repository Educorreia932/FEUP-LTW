<script src="../scripts/alerts.js"></script>

<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION)) //TODO: Useless?
        session_start(); 

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/users.php');     

    if (!checkUsername($_POST['username'])) {
        addUser($_POST['username'], sha1($_POST['password']), $_POST['name'], "/images/default-avatar.png");
        header('Location: ../pages/login.php');
    }
    else{
        echo '<script type="text/javascript">
                alertUsedUsername();
            </script>';
    }
?>