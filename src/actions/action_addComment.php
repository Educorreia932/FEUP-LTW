<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include_once(__DIR__.'/../database/connection.php'); 
    include_once(__DIR__.'/../database/users.php');   
    include_once(__DIR__.'/../database/comments.php');     

    $date_now = new DateTime('NOW');
    $date_text = $date_now->format('d-m-Y H:i:s');
    $username = getUser($_SESSION['username'],$_SESSION['password']);


    print_r($_POST);
    // print($_POST['comment']);
    // print($date_text);
    // print($$_POST['pet']);
    // print($username);


    addComment($_POST['comment'],$date_text,$_POST['pet'],$username[0]);

    

?>
