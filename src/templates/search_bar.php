<div id="search-bar">
    <form action="actions/action_search.php" method="get">
        <input id="name" name="name" type="text" placeholder="Search..">

        <select name="species" id="species">
            <?php
                include_once(__DIR__.'/../database/connection.php'); 
                include_once(__DIR__.'/../database/pets.php');  

                $species = getAllSpecies();

                foreach($species as $sp) {
                    $speciesname = $sp['SpeciesName'];
                    echo("<option value='$speciesname'>$speciesname</option>");
                }
            ?>
        </select>

        <button type="submit"><i class="fas fa-search"></i></button>
    </form>
</div>