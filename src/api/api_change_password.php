<?php
    if (session_status() == PHP_SESSION_NONE){
        session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST'], true, true);
        session_start(); 
    }

    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/users.php'); 

    $oldPass = sha1($_POST["oldPassword"]);
    $newPass = sha1($_POST["newPassword"]);
    $username = $_POST["username"];

    echo changePassword($username, $oldPass, $newPass);
?>