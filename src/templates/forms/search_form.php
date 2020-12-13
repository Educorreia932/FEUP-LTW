<script defer src="../scripts/search.js"></script>

<form id="search-bar" method="post" onsubmit="search(event)">
    <div class="text-inputs">
        <input id="name" name="name" type="text" placeholder="Pet Name">
        <input id="location" name="location" type="text" placeholder="Location">
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
        <select id="species" name="species">
            <option value="none" selected disabled hidden>Pet Species</option> 
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
            <option value="none" selected disabled hidden>Pet Size</option> 
            <option value="0">Small</option>
            <option value="1">Medium</option>
            <option value="2">Large</option>
        </select>
    </div>

    <button type="submit"><i class="fas fa-search"></i></button>
</form>