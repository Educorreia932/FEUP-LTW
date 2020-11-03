<?php
    include_once("templates/common/header.php");
    include_once("database/connection.php");
    include_once("database/pets.php");
?>

    <div id="search-bar">
        <form action="">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>


    <section id="adoption">
        <h2>Available Pets for Adoption</h2>

        <section id="pets">

        <?php
            $pets = getAllPets();

            foreach ($pets as $pet) {
        ?>

            <div class="pet-card">
                <div class="favorite-icon">
                    <span class="fa-stack fa-x">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-heart fa-stack-1x fa-inverse"></i>
                    </span>
                </div>

                <img src=<?= $pet["URL"] ?> alt="Pet Photo">

                <div class="container">
                    <p><?= $pet["Name"] ?></p>
                    <i class="fas fa-external-link-alt fa-inverse""></i>
                </div>
            </div>

        <?php 
            } 
        ?>

        </section>
    </section>
</body>

</html>