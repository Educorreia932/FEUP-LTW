<?php
    include_once('database/connection.php');
    include_once('database/comments.php');

    $id = $_POST["id"];
    $comment_id = $_POST["comment_id"];
    $username = $_POST["username"];
    $text = $_POST["text"];

    addComment($id, $username, time(), $text);

    echo json_encode(fecthAfterComments($id, $comment_id));
?>