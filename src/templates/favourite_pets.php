<?php
    $favouritePets = getFavouritePets($user['Username']);
?>

<section id="favourites">
    <h2>Favourite Pets</h2>
    <?php
        foreach($favouritePets as $pet) {
            include("cards/pet_card.php");
        }
    ?>
</section>