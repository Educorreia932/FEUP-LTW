<?php
    $favouritePets = getFavouritePets($user['Username']);
?>

<h2>Favourite Pets</h2>
<section id="favourites">
    <?php
        if(count($favouritePets) == 0)
            echo '<p>All your favourite pets will be displayed here</p>';
        else {
            foreach($favouritePets as $pet) {
                include("cards/pet_card.php");
            }
        }
    ?>
</section>