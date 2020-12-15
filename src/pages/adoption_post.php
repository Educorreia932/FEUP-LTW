<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . "/templates/common/header.php");

    require_once(ROOT . "/database/connection.php");
    require_once(ROOT . "/database/pets.php");
    require_once(ROOT . "/database/users.php");
    require_once(ROOT . "/database/adoption_proposal.php");
    require_once(ROOT . "/database/comments.php");

    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
        $user = getUser($_SESSION['username']);

    else
        $user = null;

    $adoption_post = getPost($_GET["id"]);
    $pet = getPet($_GET["id"]);
    $comments = getComments($pet["PetID"]);
    $proposals = getAllPetUnansweredProposals($pet["PetID"]);

    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
        if($user['UserID'] == $adoption_post['AuthorID']) {
            verifyPostNotifications($user['UserID'], $pet["PetID"]);
        } else {
            verifyProfileNotifications($user['UserID'], $pet["PetID"]);
        }
    }

    drawHeader("Helper Shelter - " . htmlspecialchars($pet["Name"]));

    require_once(ROOT . "/templates/adoption_post.php");

    if($adoption_post['Closed'] == 0)
        require_once(ROOT . "/templates/adoption_post_proposals.php");
    require_once(ROOT . "/templates/adoption_post_comments.php");
    require_once(ROOT . "/templates/common/footer.php");
?>