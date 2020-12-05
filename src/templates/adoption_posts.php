<?php
    $posts = getAdoptionPosts($user['Username']);
?>

<section id="user_posts">
    <h2>Adoption Posts</h2>
    <?php
        if(count($posts) == 0)
            echo '<p>All your adoption posts will be displayed here</p>';
        else {
            foreach($posts as $post) {
                //include("cards/proposal_card.php");
            }
        }
    ?>
</section>