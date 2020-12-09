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
                <?= "WIP" //$post["Location"] ?>
            </p>

            <hr>
            
            <p id="info_bullets">
                <a> <?= $pet->pet_species ?> </a>
                <a> <?= convertGender($pet->gender) ?> </a>
                <a> <?= getAge($pet->age) ?> </a> 
            </p>
            
            <hr>
            
            <p>
                About
            </p>

            <p>
                <?php
                    // if($post["Description"] != "")
                    //     echo($post["Description"]);
                        
                    // else
                    //     echo("YEEEEEEEEEEEE BUDDYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY");
                ?>
            </p>
        </div>
        
        <div id="buttons">
            <button type="button" id="favorite">Favorite</button>
            <button type="button" id="adopt">Adopt</button>
        </div>
    </div>
</div>
