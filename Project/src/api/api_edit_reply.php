<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/comments.php'); 
    include_once(ROOT . '/database/users.php'); 


    $text = $_POST["text"];
    $question_id = $_POST["reply_id"]; 

    // Add comment to database
    if(editReply($text, $question_id) == 1) 
        echo json_encode($text);
    else 
        echo json_encode(-1);
?>