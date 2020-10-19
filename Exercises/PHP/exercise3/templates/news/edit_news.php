<form action="action_edit_news.php" method="post">
    <input type="hidden" name="id" value=<?= $id?>>
    
    <label>Name<br>
        <input type="text" name="title">
    </label><br>

    <label>Introduction<br>
        <textarea name="introduction" cols="37" rows="4"></textarea>
    </label><br>

    <label>Full text<br>
        <textarea name="fulltext" cols="37" rows="4"></textarea>
    </label><br>
    
    <input type="submit">
</form>