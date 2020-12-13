<h2>Edit your post</h2>

<form action="../actions/action_edit_post.php" id="edit-post" method="post" enctype="multipart/form-data">
    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
    <input type="hidden" name="adoption_post_id" value="<?=$adoption_post['AdoptionPostID']?>">
    <div id="postHead">

        <div id="post-title">
            <label>
                Post Title <input type="text" name="post_title" pattern=".{1,30}" value="<?=$adoption_post['Title']?>">
            </label>
        </div>
    </div>

    <div id="top">
        <div id="fields">
            <label>
                Location <input type="text" name="location" value="<?=$adoption_post['Location']?>">
            </label>
        </div>
    </div>

    <label class="description">
        Description <textarea id="description" name="description" rows="5"><?=$adoption_post['Description']?></textarea>
    </label>

    <input type="submit" value="Submit">
</form>