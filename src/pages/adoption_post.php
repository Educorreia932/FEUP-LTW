<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . "/templates/common/header.php");

    require_once(ROOT . "/database/connection.php");
    require_once(ROOT . "/database/pets.php");
    require_once(ROOT . "/database/users.php");
    require_once(ROOT . "/classes/Pet.php");

    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
        $user = getUser($_SESSION['username'], $_SESSION['password']);

    $pet = Pet::getPetByID($_GET["id"]);
    $comments = getComments($pet->id);

    drawHeader("Helper Shelter - " . $pet->name);

    require_once(ROOT . "/templates/adoption_post.php");
    require_once(ROOT . "/templates/adoption_post_comments.php");
    require_once(ROOT . "/templates/common/footer.php");
?>