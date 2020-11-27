<section id="adoption">
    <h2>Available Pets for Adoption</h2>

    <section id="pets">

    <?php
        foreach ($pets as $pet) {
    ?>

        <a href="pet_profile.php?id=1"> 
            <div class="pet-card">
                <div class="favorite-icon">
                    <span class="fa-stack fa-x">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="far fa-heart fa-stack-1x fa-inverse"></i>
                    </span>
                </div>

                <div class="post-icon">
                    <span class="fa-stack fa-x">
                        <i class="fas fa-square fa-stack-2x"></i>
                        <i class="fas fa-external-link-alt fa-stack-1x fa-inverse""></i>
                    </span>
                </div>

                <img src=<?= $pet["URL"] ?> alt="Pet Photo">

                <div class="container">
                    <p><?= $pet["Name"] ?></p>

                    <footer>
                        <p><?= $pet["SpeciesName"]?> <?= $pet["Symbol"] ?></p>
                    </footer>
                </div>
            </div>
        </a>

    <?php 
        } 
    ?>

    </section>
</section>