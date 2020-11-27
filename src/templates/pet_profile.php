<section id="pet_profile">
    <h2><img src="<?= $pet["URL"] ?>" alt="Pet Photo"></h2>

    <section id="pet_info">
        <p>
            <?= $pet["Name"] ?>
        </p>
        <p>
            Trofa, Portugal
        </p>
        <label class = "location_separator"></label>
        <p>
            <?= $specie["SpeciesName"] ?> 
            <?= convertGender($pet["Gender"]) ?>
            <?= getAge($pet["Age"]) ?>
        </p>
        <label class = "info_separator"></label>
        <p>
            <?= "About" ?>
        </p>
        <p>
            <?= "Hamilton is the best!" ?>
        </p>
        <p>
            <?= "Favorite" ?>
        </p>
        <p>
            <?= "Adopt" ?>
        </p>
    </section>
</section>