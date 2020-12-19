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
            <?= htmlspecialchars(html_entity_decode($comment["Text"])) ?>
        </p>
        <footer>
            <span id="reply_button">
                <?php
                    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']) && $reply == null) {
                        if($_SESSION['username'] == getUserByID($adoption_post['AuthorID'])) {
                            // echo('<input class="reply_button" type="button" onclick="toggleReplyBox('.$comment_count.');" value="Reply">');
                            echo('<button class="reply_button" onclick="toggleReplyBox('.$comment_count.');">
                            <i class="fas fa-reply"></i> Reply</button>');
                        }
                    }
                ?>
            </span>
            <span id="question_date"><?=$questionDate?></span>
        </footer>
    </div>

    <div class="reply_box" style="display:none">
        <form method="post" onsubmit="submitReply(event,<?=$comment_count?>)">
            <textarea id="replyText" name="text" rows="3" required></textarea> 
                    
            <input type="hidden" name="comment_number" value="<?=$comment_count?>">
            <input type="hidden" name="comment_id" value="<?=$comment['ID']?>">
            <input type="submit" value="Submit reply"></input>
        </form>
    </div>  

    <?php 
        if(($reply = getReply($comment)) != null) {
            $replyDate = DateTime::createFromFormat('d-m-Y H:i:s', $reply['Date'])->format('j M Y \a\t H:i');
    ?>
    <div class="reply">
        <p class="replyText"><?=htmlspecialchars(html_entity_decode($reply['Text']))?></p>

        <div class="edit_box" style="display:none">
            <form method="post" onsubmit="editReply(event,<?=$comment_count?>)">
                <textarea id="editText" name="text" rows="3" required><?= htmlspecialchars(html_entity_decode($reply['Text']))?></textarea> 
    
                <input type="hidden" name="comment_number" value="<?=$comment_count?>">
                <input type="hidden" name="reply_id" value="<?=$reply['ID']?>">
                <input type="submit" value="Submit edit"></input>
            </form>
        </div>  

        <footer>
            <span id="edit_button">
                <?php
                    if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])) {
                        if($_SESSION['username'] == getUserByID($adoption_post['AuthorID'])) {
                            echo('<button class="edit_button" onclick="toggleEditBox('.$comment_count.');">
                            <i class="fas fa-reply"></i> Edit</button>');
                        }
                    }
                ?>
            </span>
            <span class="reply_date"><?=$replyDate?></span>
        </footer>
    </div>
    <?php
        }
    ?>
</div>


