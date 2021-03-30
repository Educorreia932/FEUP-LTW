<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/comments.php'); 
    include_once(ROOT . '/database/users.php'); 

    date_default_timezone_set('Europe/Lisbon');

    $text = $_POST["text"];
    $date = (new DateTime('NOW'))->format('d-m-Y H:i:s');
    $question_id = $_POST["question_id"]; 

    // Add comment to database
    if(($newReply = addReply($text, $date, $question_id)) != -1) 
        echo json_encode($newReply);
    else 
        echo json_encode(-1);
?>