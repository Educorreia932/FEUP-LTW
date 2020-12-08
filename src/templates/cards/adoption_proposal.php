<?php
    $proposal_pet = getPetProposal($proposal);
    $species = getSpecies($proposal_pet['SpeciesID']);
    $propDate = DateTime::createFromFormat('d-m-Y H:i:s', $proposal['Date'])->format('j M Y \a\t H:i');
?>

<a> 
    <div class="user-proposal-card">
        <div id="proposal-pet-info">
        <div id="pet-pic-proposal" >
            <img src="../<?=$proposal_pet['Photo']?>" alt="Pet photo">
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

