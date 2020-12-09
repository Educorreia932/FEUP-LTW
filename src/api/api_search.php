<?php
    function is_similar($source, $target) {
        $source = strtolower($source);
        $target = strtolower($target);

        similar_text($source, $target, $similarity);

        return $similarity >= 70.0 || $source == NULL;
    }

    function is_between($lower_bound, $higher_bound, $target) {
        if ($lower_bound == NULL && $higher_bound == NULL)
            return True;

        if ($lower_bound == NULL && $higher_bound != NULL) 
            return $target <= $higher_bound;

        if ($higher_bound == NULL && $lower_bound != NULL)
            return $lower_bound <= $target;

        return $lower_bound <= $target && $target <= $higher_bound;
    }

    function getSearchResults($name, $location, $color, $min_weight, $max_weight, $min_age, $max_age, $species, $size) {
        require_once(ROOT . "/templates/cards/pet_card.php");

        $pets = getAllPets();

        foreach ($pets as $pet) {
            if (!is_similar($name, $pet["Name"]))
                continue;

            if (!is_similar($color, $pet["Color"]))
                continue;

            if (!is_between($min_weight, $max_weight, $pet["Weight"]))
                continue;

            if (!is_between($min_age, $max_age, $pet["Age"]))
                continue;

            drawPetCard($pet);
        }
    }

    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/pets.php'); 

    $name = $_POST["name"];
    $location = $_POST["location"];
    $color = $_POST["color"]; 
    $min_weight = $_POST["min_weight"];
    $max_weight = $_POST["max_weight"];
    $min_age = $_POST["min_age"];
    $max_age = $_POST["max_age"];
    $species = $_POST["species"];
    $size = $_POST["size"];

    getSearchResults($name, $location, $color, $min_weight, $max_weight, $min_age, $max_age, $species, $size);
?>