<section id="adoption">
    <h2>Available Pets for Adoption</h2>

    <?php
        include_once("templates/search_bar.php");
    ?>
    
    <section id="pets">

    <?php
        // include("cards/proposal_card.php");
        $searchedPets = getSearchedPets($name, $species);
        foreach ($pets as $pet)
            include("cards/pet_card.php");
    ?>

    </section>
</section>