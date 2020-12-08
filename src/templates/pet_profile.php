<div id="pet_profile">
    <h2>
        <img id="front" src="<?= $pet["Photo"] ?>" alt="Pet Photo">
        <img id="background" src="<?= $pet["Photo"] ?>" alt="Pet Photo">
    </h2>

    <div id="grid">
        <div id="pet_info">
            <h3>
                <?= $pet["Name"] ?>
            </h3>
            <p>
                <?= $post["Location"] ?>
            </p>
            <hr>
            <p id="info_bullets">
                <a> <?= $specie["SpeciesName"] ?> </a>
                <a> <?= convertGender($pet["Gender"]) ?> </a>
                <a> <?= getAge($pet["Age"]) ?> </a> 
            </p>
            <hr>
            <p>
                About
            </p>
            <p>
                <?php
                    if($post["Description"] != "")
                        echo($post["Description"]);
                        
                    else
                        echo("YEEEEEEEEEEEE BUDDYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY");
                ?>
            </p>
        </div>
        
        <div id="buttons">
            <button type="button" id="favorite">Favorite</button>
            <button type="button" id="adopt">Adopt</button>
        </div>
    </div>
</div>