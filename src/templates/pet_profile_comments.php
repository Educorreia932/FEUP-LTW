<div id="pet_profile_comments">
    <label class="input-comment">
        Add a New Comment! <textarea id="comment" name="comment" rows="5"></textarea>
    </label>
    <button type="button">Submit</button>
    <?php
        foreach ($comments as $comment)
            include("templates/comment.php");
    ?>

</div>