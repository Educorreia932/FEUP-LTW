<?php
    $favouritePets = getFavouritePets($user['Username']);
?>

<h2>Favourite Pets</h2>

<?php
    if(count($favouritePets) == 0)
        echo '<p>All your favourite pets will be displayed here</p>';
        
    else {
        echo '<section id="favourites">';
        foreach($favouritePets as $pet)
            include("cards/pet_card.php");
        echo '</section>';
    }
?>