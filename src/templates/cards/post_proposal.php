<div class="post_proposal">
    <p class="proposal_author">
        <?php 
            $username = getUserByID($proposal["AuthorID"]);
            echo(htmlspecialchars($username));
            $proposalDate = DateTime::createFromFormat('d-m-Y H:i:s', $proposal['Date'])->format('j M Y \a\t H:i');
        ?>
    </p>
    
    <p class="proposal_text">
        <?= htmlspecialchars($proposal["Text"]) ?>
    </p>

    <span class="proposal_buttons">
        <button class="accept_proposal" onclick="answerProposal(<?=$proposal['ID']?>,<?=$proposal_count?>, 1)"><i class="fas fa-check"></i></button>
        <button class="refuse_proposal" onclick="answerProposal(<?=$proposal['ID']?>,<?=$proposal_count?>, -1)"><i class="fas fa-times"></i></i></button>
    </span>

    <footer>
        <!-- <span id="reply_button">
            <?php
                if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']) && $reply == null) {
                    if($_SESSION['username'] == getUserByID($adoption_post['AuthorID'])) {
                        // echo('<input class="reply_button" type="button" onclick="toggleReplyBox('.$comment_count.');" value="Reply">');
                        echo('<button class="reply_button" onclick="toggleReplyBox('.$comment_count.');">
                        <i class="fas fa-reply"></i> Reply</button>');
                    }
                }
            ?>
        </span> -->
        <span id="proposal_date"><?=$proposalDate?></span>
    </footer>
</div>