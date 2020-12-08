<script defer src="scripts/comments.js"></script>

<div id="pet_profile_comments">
    <!-- TODO: Only show if user is logged in -->
    <form method="post" onsubmit="submitComment(event)">
        <label class="input-comment">
            Add a new comment! <textarea id="commentText" name="text" rows="5"></textarea> 
        </label>
        
        <input type="hidden" value=<?=$pet['PetID']?> name="pet_id">
        <input type="hidden" value=<?=$user['Username']?> name="username">
        <input type="submit"></input>
    </form>

    <div id="comments">
        <?php
            foreach ($comments as $comment)
                include("templates/comment.php");
        ?>
    </div>
</div>