<script defer src="../scripts/addProposal.js"></script>
<div id="pet_profile">
    <h2>
        <img id="front" src="../<?= $pet["Photo"] ?>" alt="Pet Photo">
        <img id="background" src="../<?= $pet["Photo"] ?>" alt="Pet Photo">
    </h2>

    <div id="grid">
        <div id="pet_info">
            <h3>
                <?= $pet["Name"] ?>
            </h3>

            <p>
                <?= $adoption_post["Location"] ?>
            </p>

            <hr>
            
            <p id="info_bullets">
                <a> <?= htmlspecialchars(getSpeciesName($pet["SpeciesID"])) ?> </a>
                <a> <?= htmlspecialchars(getGender($pet["Gender"])) ?> </a>
                <a> <?= $pet["Age"] ?> </a> 
            </p>
            
            <hr>
            
            <p>
                About
            </p>

            <p>
                <?= $adoption_post["Description"] ?>
            </p>
        </div>
        
        <div id="buttons">
            <button type="button" id="favorite">Favorite</button>
            <button type="button" id="adopt" onclick='addAdoptionProp(<?= $pet["PetID"] . "," . getUser($_SESSION["username"], $_SESSION["password"])["UserID"] ?>)'> Adopt </button>
        </div>
    </div>
</div>
