<h2 class="Edit-post">Edit your post</h2>

<form action="../actions/action_edit_post.php" id="edit-post" method="post" enctype="multipart/form-data">
    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
    <input type="hidden" name="adoption_post_id" value="<?=$adoption_post['AdoptionPostID']?>">
    
    <div id="post-title">
        <label for="post_title"> Post Title </label>
        <input type="text" name="post_title" id="post_title" pattern=".{1,30}" value="<?=$adoption_post['Title']?>">  
    </div>

    <div id="fields">
        <label for="location">Location</label>
        <input type="text" id="location" name="location" value="<?=$adoption_post['Location']?>">
        
    </div>

    <label id="description">Description</label>
    <textarea id="description" name="description" id="description" rows="5"><?=$adoption_post['Description']?></textarea>
   

    <input type="submit" value="Submit" id="submit_changes">
</form>