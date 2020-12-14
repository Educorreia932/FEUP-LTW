<?php
    $author_name = getUserById($adoption_post['AuthorID']);
    if($author_name != $_SESSION['username'])
        header("Location: ../index.php");
?>
<div id="pet_profile">
    <h1>
        <?= $adoption_post["Title"] ?>
    </h1>
    <h4 id="author">
        by <?=$author_name?>
    </h4>
    <h2>
        <img id="front" src="../<?= $pet["Photo"] ?>" alt="Pet Photo">
        <img id="background" src="../<?= $pet["Photo"] ?>" alt="Pet Photo">
    </h2>

    <div id="grid">
        <div id="pet_info">
            <h3>
                <?= $pet["Name"] ?>
            </h3>

            <p>
                <?= $adoption_post["Location"] ?>
            </p>

            <hr>
            
            <p id="info_bullets">
                <a> <?= htmlspecialchars(getSpeciesName($pet["SpeciesID"])) ?> </a>
                <a> <?= htmlspecialchars(getGender($pet["Gender"])) ?> </a>
                <a> <?= $pet["Age"] ?> </a> 
            </p>
            
            <hr>
            
            <p>
                About
            </p>

            <p>
                <?= $adoption_post["Description"] ?>
            </p>
        </div>
</div>
