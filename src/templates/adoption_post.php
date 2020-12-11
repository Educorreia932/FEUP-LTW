<script defer src="../scripts/addProposal.js"></script>
<div id="pet_profile">
    <h1>
        <?= $adoption_post["Title"] ?>
    </h1>
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
            <button type="button" id="favorite">
                <span class="pet-id"><?= $pet["PetID"] ?></span>
                Favorite
                <?php
                    if(favoritedPet($user? $user["Username"] : null, $pet["PetID"])) {
                ?>

                <i class="fas fa-heart fa-inverse"></i>

                <?php
                    }

                    else {
                ?>

                <i class="far fa-heart fa-inverse"></i>

                <?php
                    }
                ?>
            </button>

            <?php
                if (array_key_exists('username', $_SESSION) && !empty($_SESSION['username'])){
                    $id = $user["UserID"];

                    if($adoption_post["AuthorID"] == $id){
            ?>
                    <button type="button" id="edit" onclick='<?= 'window.location.href = "../pages/edit_post.php?id=' . $adoption_post["AdoptionPostID"] . '"'?> '>Edit</button>
            <?php
                    }
                    else{
            ?>
                    <button type="button" id="adopt" onclick='addAdoptionProp(<?= $pet["PetID"] . "," . $id ?>)'> Adopt </button>
            <?php
                    }
                }
            ?>
            
            
        </div>
    </div>
</div>
