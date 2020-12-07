<?php
?>

<a> 
    <div class="adoption-post-card">
        <div id="proposal-pet-info">
        <div id="pet-pic-proposal" >
            <img src="<?=$proposal_pet['Photo']?>" alt="Pet photo">
        </div>
            <h4><?=$proposal_pet['Name']?></h4>
            <h5><?=$species['SpeciesName']?></h5>
            <h5>Age <?=$proposal_pet['Age']?></h5>
        </div>

        <div id="proposal-text">
            <p><?=$proposal['Text']?></p>
            <footer>
                <p><?=$propDate?></p>
            </footer>
        </div>
    </div>
</a> 