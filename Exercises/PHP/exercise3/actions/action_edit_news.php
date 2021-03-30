<?php
    include_once(__DIR__ . '/../database/connection.php');
    include_once(__DIR__ . '/../database/news.php');

    $id = $_POST['id'];
    $title = $_POST['title'];
    $introduction = $_POST['introduction'];
    $fulltext = $_POST['fulltext'];

    updateNews($id, $title, $introduction, $fulltext);

    header("Location: ../news_item.php?id=$id");
?>