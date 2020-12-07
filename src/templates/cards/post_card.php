<?php
    $post_pet = getPetPost($post);
    $postDate = DateTime::createFromFormat('d-m-Y H:i:s', $post['Date'])->format('j M Y \a\t H:i');
    $postpet_species = getSpecies($post_pet['SpeciesID']);
?>

<a> 
    <div class="adoption-post-card">
        <h2><?=$post['Title']?></h2>

        <div id="post-pet-info">
            <div id="pet-pic-post" >
                <img src="<?=$post_pet['Photo']?>" alt="Pet photo">
                <h3><?=$post_pet['Name']?></h3>
                <h4><?=$post['Location']?></h4>
            </div>
            <div id="pet_details">
                <div id="pet-details-left">
                    <p>Age: <?=$post_pet['Age']?></p>
                    <p>Size: Small</p> <!-- TODO: ADD TO DATABASE-->
                    <p>Color: Brown</p>
                </div>
                <div id="pet-details-right">
                    <p>Species: <?=$postpet_species['SpeciesName']?></p>
                    <p>Race: Persa</p>
                    <p>Gender: Male</p> <!-- Change to read from db-->
                </div>
                <div id="pet-description">
                    <p><?=$post['Description']?></p>
                </div>
            </div>
        </div>

        <footer>
            <p><?=$postDate?></p>
        </footer>
    </div>
</a> 