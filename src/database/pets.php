<?php
    function getAllPets() {
        global $db;
        
        $query =   'SELECT * FROM 
                    Pets JOIN PetSpecies 
                    ON Pets.SpeciesID = PetSpecies.PetSpeciesID';
        
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getPetMaxID() {
        global $db;
        
        $query =   'SELECT MAX(PetID) AS M FROM Pets';
        
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getAllSpecies() {
        global $db;

        $query = 'SELECT *
                  FROM PetSpecies';
        
        $stmt = $db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getSearchedPets($name, $species) {
        global $db;

        $query = 'SELECT *
                  FROM Pets JOIN PetSpecies
                  ON Pets.SpeciesID = PetSpecies.PetSpeciesID
                  WHERE PetSpecies.SpeciesName=? AND Pets.Name=?';
                //   , NEAR((?, Pets.Name), 4)';
        
        $stmt = $db->prepare($query);
        $stmt->execute(array($species, $name));

        return $stmt->fetchAll();
    }

    function getPet($id){
        global $db;
        $query =   'SELECT * FROM 
                    Pets JOIN PetSpecies 
                    ON Pets.SpeciesID = PetSpecies.PetSpeciesID where Pets.PetID = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        
        return $stmt->fetchAll()[0];
    }

    function getSpecies($id){
        global $db;

        $query =   'SELECT * FROM 
                    PetSpecies where PetSpeciesID = ?';

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