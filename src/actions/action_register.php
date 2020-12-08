<script src="../scripts/alerts.js"></script>

<?php
    if(!isset($_SESSION)) //TODO: Useless?
        session_start(); 

    include_once(__DIR__.'/../database/connection.php'); 
    include_once(__DIR__.'/../database/users.php');     

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