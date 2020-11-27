<?php
    function getAllPets() {
        global $db;
        
        $query =   'SELECT * FROM 
                    Pets JOIN PetSpecies 
                    ON Pets.SpeciesID = PetSpecies.ID';
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll();
    }

    function getSearchedPets($name, $species) {
        global $db;

        $query = 'SELECT *
                  FROM Pets JOIN PetSpecies
                  ON Pets.SpeciesID = PetSpecies.ID
                  WHERE PetSpecies.SpeciesName=?, MATCH(Pets.Name) AGAINST(? IN NATURAL LANGUAGE)';
        
        $stmt = $db->prepare($query);
        $stmt->execute(array($species, $name));

        return $stmt->fetchAll();
    }
?>