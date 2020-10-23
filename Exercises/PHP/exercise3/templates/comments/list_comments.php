<h1><?= count($comments) ?> Comments</h1>

<?php foreach ($comments as $comment) {?>

<article class="comment">
    <span class="user"><?= ucfirst($comment['username']) ?></span>
    <span class="date"><?= date("F d, Y", $article['published']) ?></span>
    <p><?= $comment['text']?></p>
</article>

<?php }?>