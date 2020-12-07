<?php
    $posts = getAdoptionPosts($user['Username']);
?>

<h2>Adoption Posts</h2>
<?php
    if(count($posts) == 0)
        echo '<p>All your adoption posts will be displayed here</p>';
    else {
        echo '<section id="user_posts">';
        foreach($posts as $post) {
            include("cards/post_card.php");
        }
        echo '</section>';
    }
?>