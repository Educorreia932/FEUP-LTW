<div class="question_answer">
    <div class="comment">
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
                    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']) && $reply == null) {
                        if($_SESSION['username'] == getUserByID($adoption_post['AuthorID'])) {
                            echo('<input id="reply_button" type="button" onclick="toggleReplyBox('.$comment_count.');" value="Reply">');
                        }
                    }
                ?>
            </span>
            <span id="question_date"><?=$questionDate?></span>
        </footer>
    </div>

    <div class="reply_box" style="display:none">
        <form method="post" onsubmit="submitReply(event,<?=$comment_count?>)">
            <textarea id="replyText" name="text" rows="5" required></textarea> 
                    
            <input type="hidden" name="comment_number" value="<?=$comment_count?>">
            <input type="hidden" name="comment_id" value="<?=$comment['ID']?>">
            <input type="submit" value="Submit reply"></input>
        </form>
    </div>

    <div class="reply">
        <?php
            if(($reply = getReply($comment)) != null) {
                echo('<p>'.htmlspecialchars($reply['Text']).'</p>');
                $replyDate = DateTime::createFromFormat('d-m-Y H:i:s', $reply['Date'])->format('j M Y \a\t H:i');
            
        ?>
        <footer>
            <p><?=$replyDate?></p>
        </footer>
        <?php
            }
        ?>
    </div>
</div>


