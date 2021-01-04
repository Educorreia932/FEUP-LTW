<?php
    if(isset($dynamic_search))
        if($dynamic_search)
            echo '<script defer src="../scripts/search.js"></script>';
?>

<form id="search-bar" action="../pages/search.php" method="get">
    <div class="text-inputs">
        <h3>Pet Information</h3>
        <input id="name" name="name" type="text" placeholder="Pet Name">
        <input id="color" name="color" type="text" placeholder="Color">
    </div>

    <div id="weight" class="range-inputs">
        <h3>Weight</h3>
        <input id="min-weight" name="min-weight" type="number" min="0" placeholder="Minimum">
        <input id="max-weight" name="max-weight" type="number" min="0" placeholder="Maximum">
    </div>

    <div id="age" class="range-inputs">
        <h3>Age</h3>
        <input id="min-age" name="min-age" type="number" min="0" placeholder="Minimum">
        <input id="max-age" name="max-age" type="number" min="0" placeholder="Maximum">
    </div>
    
    <div class="selection-inputs">
        <h3>Other</h3>

        <select id="species" name="species">
            <option value="none" selected hidden>Pet Species</option> 
            <option value="none">Clear</option> 

            <?php
                include_once(ROOT . '/database/connection.php'); 
                include_once(ROOT . '/database/pets.php');  
    
                $species = getAllSpecies();
    
                foreach($species as $sp) {
            ?>
    
                <option value="<?= $sp['PetSpeciesID'] ?>"><?= $sp['SpeciesName'] ?></option>
    
            <?php
                }
            ?>
        </select>
    
        <select id="size" name="size">
            <option value="none" selected hidden>Pet Size</option> 
            <option value="none">Clear</option> 
            <option value="0">Small</option>
            <option value="1">Medium</option>
            <option value="2">Large</option>
        </select>
    </div>

    <button type="submit"><i class="fas fa-search"></i></button>
</form>