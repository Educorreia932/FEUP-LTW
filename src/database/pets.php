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

    function getPet($id){
        global $db;
        $query =   'SELECT * FROM 
                    Pets JOIN PetSpecies 
                    ON Pets.SpeciesID = PetSpecies.ID where Pets.ID = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        
        return $stmt->fetchAll()[0];
    }

    function getSpecies($id){
        global $db;

        $query =   'SELECT * FROM 
                    PetSpecies where ID = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        return $stmt->fetchAll()[0];
    }

    function convertGender($gender){
        $r  = ($gender == 1) ?  "Male" :  "Female";
        return $r;
    }

    function getAge($age){
        $r = ($age > 1) ? "$age Years" : "$age Year";
        return $r;
    }
?>