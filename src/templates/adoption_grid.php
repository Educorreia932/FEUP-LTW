<section id="adoption">
    <h2>Available Pets for Adoption</h2>

    <?php
        include_once(ROOT . "/templates/forms/search_form.php");
    ?>

    <section id="pet-grid">

    <?php
        if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
            include(ROOT . "/templates/cards/submit_pet_card.php");

        include(ROOT . "/templates/cards/pet_card.php");

        if(count($pets) > 0) {
            foreach ($pets as $pet)
                drawPetCard($username, $pet); 
        }
        else {
            echo '<p>No results</p>';
        }
    ?>

    </section>
</section>