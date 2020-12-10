<section id="user_profile">
    <div id="profile_header">
        <!-- <img id="profile_pic" src="https://i.pinimg.com/564x/ea/8a/7f/ea8a7fb3b3230019a2f397b01cfe2d0c.jpg" alt="Profile picture"> -->
        
        <img id="profile_pic" src="<?=$user['ProfilePicture']?>" alt="Profile picture">

        <div id="user_info">
            <h2><?=htmlspecialchars($user['Name'])?></h2>
            <h3>@<?=htmlspecialchars($user['Username'])?></h3>
            <div id="user_bio">
                <?=htmlspecialchars($user['Biography'])?>
            </div>
        </div>

        <!-- <div id="user_edit">
            <input type="button" id="edit_profile_button" value="Edit Profile">
        </div> -->

        
        <script src="../scripts/edit_profile.js"></script>
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