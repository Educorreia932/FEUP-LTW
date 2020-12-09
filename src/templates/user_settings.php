<?php
    
?>

<script defer src="../scripts/password_change.js"></script>

<section id="user_settings">
    <h2>User settings</h2>
    <form method="post" action="../actions/update_info.php">
        <label>Name 
            <input type="text" pattern="^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)" name="newName" required
                title="Capitalized first and last name, separated by a single space." value="<?=$user_name?>">
        </label>
        <input type="hidden" value="<?=$user['Username']?>" name="user_username">
        <label>
            Username <input type="text" pattern="[\w]{4,20}" name="newUsername" required title="Must have length between 4 and 20."
                value="<?=$user['Username']?>">
        </label>
        
        <label class="input-comment">
            Bio <textarea id="newBio" pattern="[\w]{0,300}" title="Max length of 300 characters." name="text" rows="5"></textarea> 
        </label>

        <input type="submit" value="Save changes">
    </form>

    <form id="password_change" method="post" onsubmit="submitNewPass(event);">
        <label>
			Current Password <input type="password" name="oldPassword" required>
        </label>
        <label>
            New Password <input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" name="newPassword1" 
                id="newPassword1" required
                title="Must contain at least one number, one lowercase letter, a special character and at least 8 or more characters."
                onchange="check_pass();">
        </label>
        <label>
			Confirm new password <input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" name="newPassword2" required
                id="newPassword2"        
                title="Must contain at least one number, one lowercase letter, a special character and at least 8 or more characters" 
                onchange="check_pass();">
        </label>
        <span id="password_error"></span>
        
        <input type="submit" id="submit_password" value="Update password">
    </form>

</section>


<!-- sha1($_POST['password']) -->
<!-- <input type="text" pattern="^([a-zA-Z]{2,}\s[a-zA-Z]{1,}'?-?[a-zA-Z]{2,}\s?([a-zA-Z]{1,})?)" name="name" required
    title="Capitalized first and last name, separated by a single space."> -->
                    
<!-- <input type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" name="password" required
    title="Must contain at least one number, one lowercase letter, a special character and at least 8 or more characters."> -->