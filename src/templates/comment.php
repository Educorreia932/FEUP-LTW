<div id="comment">
    <p>
        <?php 
            $username = getUserByID($comment["AuthorID"]);
            echo(htmlspecialchars($username));
            $reply = getReply($comment);
            $questionDate = DateTime::createFromFormat('d-m-Y H:i:s', $comment['Date'])->format('j M Y \a\t H:i');
        ?>
    </p>
    
    <p>
        <?= htmlspecialchars($comment["Text"]) ?>
    </p>
    <footer>
        <span id="reply_button">
            <?php
                if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
                    if($_SESSION['username'] == getUserByID($adoption_post['AuthorID'])) {
                        echo('<input type="button" onclick="toggleReplyBox();" value="Reply">');
                    }
                }
            ?>
        </span>
        <span id="question_date"><?=$questionDate?></span>
    </footer>
</div>

<div class="reply">
    <?php
        if(($reply = getReply($comment)) != null) {
            echo('<p>'.htmlspecialchars($reply['Text']).'</p>');
            $replyDate = DateTime::createFromFormat('d-m-Y H:i:s', $reply['Date'])->format('j M Y \a\t H:i');
        }
    ?>
    <footer>
        <p><?=$replyDate?>
    </footer>
</div>

