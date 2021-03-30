<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/adoption_posts.php'); 
    include_once(ROOT . '/database/pets.php'); 

    $adoption_posts = fetchAllAdoptionPosts();

    header('Content-Type: application/json');
    echo json_encode($adoption_posts, JSON_PRETTY_PRINT);
?>