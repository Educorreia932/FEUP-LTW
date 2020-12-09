<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . "/templates/common/header.php");

    include_once(ROOT . "/database/connection.php");
    include_once(ROOT . "/database/pets.php");
    include_once(ROOT . "/database/users.php");

    $pet = getPet($_GET['id']);
    $specie = getSpecies($pet["SpeciesID"]);
    $comments = getComments($pet['AdoptionPostID']);
    $post = getPost($pet['AdoptionPostID']);

    if(array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
        $user = getUser($_SESSION['username'], $_SESSION['password']);

    drawHeader("Helper Shelter - " . htmlspecialchars($pet['Name']));

    include_once(ROOT . "/templates/adoption_post.php");
    
    if(array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
        include_once(ROOT . "/templates/adoption_post_comments.php");

    include_once(ROOT . "/templates/common/footer.php");
?>