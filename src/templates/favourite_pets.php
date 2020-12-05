<?php
    $favouritePets = getFavouritePets($user['Username']);
?>

<section id="favourites">
    <h2>Favourite Pets</h2>
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