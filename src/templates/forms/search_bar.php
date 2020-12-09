<form id="search-bar" action="../actions/action_search.php" method="get">
    <!-- <input id="title" name="title" type="text" placeholder="Adoption Post Title"> -->
    <input id="name" name="name" type="text" placeholder="Pet Name">
    <input id="location" name="location" type="text" placeholder="Location">
    <input id="color" name="color" type="text" placeholder="Color">
    <div id="weight">
        <input id="min-weight" type="number" name="max-weight" placeholder="Minimum Weight">
        <input id="max-weight" type="number" name="min-weight" placeholder="Maximum Weight">
    </div>

    <select name="species" id="species">
        <option value="none" selected disabled hidden>Pet Species</option> 
        <?php
            include_once(ROOT . '/database/connection.php'); 
            include_once(ROOT . '/database/pets.php');  

            $species = getAllSpecies();

            foreach($species as $sp) {
                $speciesname = $sp['SpeciesName'];

                echo("<option value='$speciesname'>$speciesname</option>");
            }
        ?>
    </select>

    <select id="size" name="size">
        <option value="none" selected disabled hidden>Pet Size</option> 
        <option value="0">Small</option>
        <option value="1">Medium</option>
        <option value="2">Large</option>
    </select>

    <button type="submit"><i class="fas fa-search"></i></button>
</form>