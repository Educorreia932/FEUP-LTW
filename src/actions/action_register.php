<script src="../scripts/alerts.js"></script>

<?php
    include_once(__DIR__ . "/../config.php");

    if(!isset($_SESSION)) //TODO: Useless?
        session_start(); 

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/users.php');     

    if (!checkUsername($_POST['username'])) {
        addUser($_POST['username'], sha1($_POST['password']), $_POST['name']);
        header('Location: /login.php');
    }
    
    else{
        echo '<script type="text/javascript">
                alertUsedUsername();
            </script>';
    }
?>