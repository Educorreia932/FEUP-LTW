<?php
    $username = getUserByID($proposal["AuthorID"]);
    $proposalDate = DateTime::createFromFormat('d-m-Y H:i:s', $proposal['Date'])->format('j M Y \a\t H:i');
?>

<div class="post_proposal">
    <p class="proposal_author">
        by
        <a href="../pages/user_profile.php?user=<?=$username?>">  
            <?=htmlspecialchars($username)?>
        </a>
    </p>

    
    <p class="proposal_text">
        <?= htmlspecialchars($proposal["Text"]) ?>
    </p>

    <span class="proposal_buttons">
        <button class="accept_proposal" onclick="answerProposal(<?=$proposal['ID']?>,<?=$proposal_count?>, 1)"><i class="fas fa-check"></i></button>
        <button class="refuse_proposal" onclick="answerProposal(<?=$proposal['ID']?>,<?=$proposal_count?>, -1)"><i class="fas fa-times"></i></i></button>
    </span>

    <footer>
        <span id="proposal_date"><?=$proposalDate?></span>
    </footer>
</div>