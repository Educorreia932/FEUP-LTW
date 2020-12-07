<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include_once(__DIR__.'/../database/connection.php'); 
    include_once(__DIR__.'/../database/users.php');     

    $date_now = new DateTime('NOW');
    $date_text = $date_now->format('d-m-Y H:i:s');


    $username = getUser($_SESSION['username'],$_SESSION['password']);
    addComment($_POST['comment'],$date_text,$_POST['pet'],$username);

    

?>
