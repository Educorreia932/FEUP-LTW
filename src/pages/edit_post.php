<?php
include_once(__DIR__ . "/../config.php");

    include_once(ROOT . "/templates/common/header.php");

    require_once(ROOT . "/database/connection.php");
    require_once(ROOT . "/database/pets.php");
    require_once(ROOT . "/database/users.php");
    require_once(ROOT . "/database/comments.php");

    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
        $user = getUser($_SESSION['username'], $_SESSION['password']);

    else
        $user = null;

    $adoption_post = getPost($_GET["id"]);
    $pet = getPet($_GET["id"]);
    $comments = getComments($pet["PetID"]);

    drawHeader("Helper Shelter - " . htmlspecialchars($pet["Name"]));

    require_once(ROOT . "/templates/edit_post.php");
    require_once(ROOT . "/templates/forms/edit_post_form.php");

?>