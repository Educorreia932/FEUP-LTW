<?php
    include_once(__DIR__ . '/../database/connection.php'); 
    include_once(__DIR__ . '/../database/comments.php'); 
    include_once(__DIR__ . '/../database/users.php'); 

    $text = $_POST["text"];
    $date = (new DateTime('NOW'))->format('d-m-Y H:i:s');
    $pet_id = $_POST["pet_id"]; 
    $username = $_POST["username"];

    // Add comment to database
    $comment_id = addComment($text, $date, $pet_id, $username);

    echo json_encode(fecthAfterComments($comment_id,$username));
?>