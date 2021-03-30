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

    function getSearchResults($name, $color, $min_weight, $max_weight, $min_age, $max_age, $species, $size) {
        $searchResults = array();

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

            if (((int) $species) != $pet["SpeciesID"] && $species != "none")
                continue;

            if ($size != $pet["Size"] && $size != "none")
                continue;

            array_push($searchResults, $pet);
        }

        return $searchResults;
    }
?>