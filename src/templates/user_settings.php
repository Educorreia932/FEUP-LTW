
<script defer src="../scripts/change_user_info.js"></script>

<section id="user_settings">
    <h2>User Photo</h2>

    <form action="../actions/action_change_photo.php" id="user_photo" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
        <?php require("cards/photo_card.php") ?>
        <input type="submit" value="Save changes">
    </form>

    
    <h2>User settings</h2>
    <form id="profile_change" method="post" onsubmit="submitNewProfile(event);">

        <div id="profile_pic">
            <!-- <?php include(ROOT . "/templates/cards/photo_card.php"); ?> -->
        </div>

        <div id="profile_info">
            <label for="newName">Name</label>
            <input type="text" pattern="^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)" id="newName" name="newName" required
                title="Capitalized first and last name, separated by a single space." value="<?=$user_name?>">
        
            <label for="newBio">Bio</label>
            <textarea id="newBio" pattern="[\w]{0,300}" title="Max length of 300 characters." name="newBio" rows="5"><?=$user['Biography']?></textarea> 

            <span id="info_error"></span>
        </div>

        <input type="submit" value="Save changes">
    </form>

    <form id="username_change" method="post" onsubmit="submitNewUsername(event);">
        <input type="hidden" value="<?=$user['Username']?>" name="user_username">
        <label for="newUsername">Username</label>
        <input type="text" pattern="[\w]{4,20}" id="newUsername" name="newUsername" required title="Must have length between 4 and 20."
                value="<?=$user['Username']?>">
        <span id="username_error"></span>

        <input type="submit" value="Change username">
    </form>

    <form id="password_change" method="post" onsubmit="submitNewPass(event);">
        <h3>Password</h3>
        
        <label for="oldPassword">Current Password</label> 
        <input type="password" id="oldPassword" name="oldPassword" required>

        <label for="newPassword1">New Password</label>
        <input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" name="newPassword1" 
            id="newPassword1" required
            title="Must contain at least one number, one lowercase letter, a special character and at least 8 or more characters."
            onkeyup="check_pass();">

        <label for="newPassword2">Confirm new Password</label>
		<input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" name="newPassword2" required
            id="newPassword2"        
            title="Must contain at least one number, one lowercase letter, a special character and at least 8 or more characters" 
            onkeyup="check_pass();">

        <span id="password_error"></span>
        
        <input type="submit" id="submit_password" value="Update password">
    </form>

</section>
