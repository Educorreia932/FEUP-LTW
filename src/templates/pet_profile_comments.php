<script src="scripts/addComment.js"></script>


<div id="pet_profile_comments">
    <form action="actions/action_addComment.php" method="post" onsubmit="addComment('<?=$_SESSION['username']?>',<?=$pet['PetID']?>);">
        <label class="input-comment">
            Add a New Comment! <textarea id="commentText" name="comment" rows="5"></textarea> 
        </label>
        <input type="hidden" value=<?=$pet['PetID']?> name ="pet">
        <input type="submit"></input>
    </form>
    <div id = "comments">
    <?php
        foreach ($comments as $comment)
            include("templates/comment.php");
    ?>
    </div>

</div>