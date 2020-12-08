<div id="comment">
    <p>
        <?php 
            $username = getUserByID($comment["AuthorID"]);
            echo($username);
        ?>
    </p>
    
    <p>
        <?= $comment["Text"] ?>
    </p>
</div>