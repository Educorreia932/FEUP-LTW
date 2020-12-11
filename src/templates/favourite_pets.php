<?php
    $favouritePets = getFavouritePets($user['Username']);
?>

<h2>Favorite Pets</h2>

<?php
    if (count($favouritePets) == 0)
        echo '<p>All your favourite pets will be displayed here</p>';
        
    else {
        echo '<section id="favourites">';

        include(ROOT . "/templates/cards/pet_card.php");
        
        foreach($favouritePets as $pet_entry)
            drawPetCard($user['Username'], $pet_entry);

        echo '</section>';
    }
?>