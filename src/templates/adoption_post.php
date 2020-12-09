<div id="pet_profile">
    <h2>
        <img id="front" src="../<?= $pet->photo ?>" alt="Pet Photo">
        <img id="background" src="../<?= $pet->photo ?>" alt="Pet Photo">
    </h2>

    <div id="grid">
        <div id="pet_info">
            <h3>
                <?= $pet->name ?>
            </h3>

            <p>
                <?= $adoption_post->location ?>
            </p>

            <hr>
            
            <p id="info_bullets">
                <a> <?= $pet->pet_species ?> </a>
                <a> <?= $pet->getGender() ?> </a>
                <a> <?= $pet->getAge() ?> </a> 
            </p>
            
            <hr>
            
            <p>
                About
            </p>

            <p>
                <?= $adoption_post->description ?>
            </p>
        </div>
        
        <div id="buttons">
            <button type="button" id="favorite">Favorite</button>
            <button type="button" id="adopt">Adopt</button>
        </div>
    </div>
</div>
