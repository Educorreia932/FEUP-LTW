<section id="adoption">
    <h2>Available Pets for Adoption</h2>

    <?php
        include_once(ROOT . "/templates/forms/search_bar.php");
    ?>

    <section id="pets">

    <?php
        if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
            include(ROOT . "/templates/cards/proposal_card.php");

        include(ROOT . "/templates/cards/pet_card.php");

        foreach ($pets as $pet)
            drawPetCard($pet); 
    ?>

    </section>
</section>