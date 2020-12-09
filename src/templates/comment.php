<div id="comment">
    <p>
        <?php 
            $username = getUserByID($comment["AuthorID"]);
            echo(htmlspecialchars($username));
        ?>
    </p>
    
    <p>
        <?= htmlspecialchars($comment["Text"]) ?>
    </p>
</div>