<section id="adoption">
    <h2>Available Pets for Adoption</h2>

    <?php
        include_once("templates/search_bar.php");
    ?>
    
    <section id="pets">

    <?php
        if(array_key_exists('username', $_SESSION) && !empty($_SESSION['username']))
            include("cards/proposal_card.php");

        foreach ($pets as $pet)
            include("cards/pet_card.php");
    ?>

    </section>
</section>