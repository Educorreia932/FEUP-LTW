<section id="adoption">
    <h2>Available Pets for Adoption</h2>

    <?php
        include_once(ROOT . "/classes/PetsList.php");
        include_once(ROOT . "/templates/search_bar.php");

        $pets_list = (new PetsList())->pets;
    ?>

    <section id="pets">

    <?php
        if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
            include(ROOT . "/templates/cards/proposal_card.php");

        include(ROOT . "/templates/cards/pet_card.php");

        foreach ($pets_list as $pet)
            drawPetCard($pet);
    ?>

    </section>
</section>