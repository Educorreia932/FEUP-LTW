<section id="user_profile">
    <div id="profile_header">
        <img id="profile_pic" src="../<?=$user['ProfilePicture']?>" alt="Profile picture">

        <div id="user_info">
            <h2><?=htmlspecialchars($user['Name'])?></h2>
            <h3>@<?=htmlspecialchars($user['Username'])?></h3>
            <div id="user_bio">
                <?=htmlspecialchars($user['Biography'])?>
            </div>
        </div>
    </div>

    <?php
        echo '<hr class="rounded">';

        require_once(ROOT . "/templates/favourite_pets.php");

        echo '<hr class="rounded">';

        require_once(ROOT . "/templates/adoption_proposals.php");

        echo '<hr class="rounded">';

        require_once(ROOT . "/templates/adoption_posts.php");
    ?>
</section>