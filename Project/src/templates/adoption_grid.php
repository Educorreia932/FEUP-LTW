<section id="adoption">
    <h2>Available Pets for Adoption</h2>

    <?php
        include_once(ROOT . "/templates/forms/search_form.php");

        if(count($pets) > 0) {
            echo '<section id="pet-grid">';

            if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
                include(ROOT . "/templates/cards/submit_pet_card.php");

            include(ROOT . "/templates/cards/pet_card.php");

            foreach ($pets as $pet)
                drawPetCard($username, $pet); 

            echo '</section>';
        }
        else {
            echo '<div style="text-align:center; width:100%"><h1>No results</h1></div>';
        }
    ?>
</section>