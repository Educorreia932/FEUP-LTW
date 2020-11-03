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

    <h2>Available Pets for Adoption</h2>

    <section id="adoption">

    <?php
        $pets = getAllPets();

        foreach ($pets as $pet) {
    ?>

        <div class="pet-card">
            <div class="favorite-icon">
                <i class="far fa-heart"></i>
            </div>

            <img src=<?= $pet["URL"] ?> alt="Pet Photo">

            <div class="container">
                <p><?= $pet["Name"] ?></p>
             </div>
        </div>

    <?php 
        } 
    ?>

    </section>
</body>

</html>