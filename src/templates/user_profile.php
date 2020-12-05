
<section id="user_profile">
    <div id="profile_header">
        <img id="profile_pic" src="https://i.pinimg.com/564x/ea/8a/7f/ea8a7fb3b3230019a2f397b01cfe2d0c.jpg" alt="Profile picture">
        <div id="user_info">
            <h2><?=$user['Name']?></h2>
            <h3>@<?=$user['Username']?></h3>
        </div>
        <div id="user_edit">
            <input type="button" id="edit_profile_button" value="Edit Profile">
        </div>
        <script src="scripts/edit_profile.js"></script>
    </div>

    <hr class="rounded">

    <?php
        include_once("templates/favourite_pets.php");
    ?>

    <hr class="rounded">

    <?php

    ?>
</section>


<div>
    <h2>Adoption Proposals</h2>
</div>

<div>
    <h2>Adoption Posts</h2>
</div>

<div>
    <h2>Activity</h2>
</div>  