<script defer src="../scripts/comments.js"></script>

<div id="pet_profile_comments">
    <?php
    
    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']) && $_SESSION['username'] != $author_name) {

    ?>
        <form method="post" onsubmit="submitComment(event)">
            <label class="input-comment">
                Add a new question! <textarea id="commentText" name="text" rows="5"></textarea> 
            </label>
            
            <input type="hidden" value=<?=$pet["PetID"] ?> name="pet_id">
            <input type="hidden" value=<?=$user['Username'] ?> name="username">
            <input type="submit" value="Submit"></input>
        </form>
    <?php
        }
    ?>  

    <div id="comments">
        <?php
            $comment_count = 1;

            foreach ($comments as $comment) {
                include(__DIR__ . "/comment.php");
                $comment_count = $comment_count + 1;
            }

        ?>
    </div>
</div>