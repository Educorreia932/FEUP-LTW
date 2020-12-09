<?php
    require_once(__DIR__ . "/../config.php");
    require_once(ROOT . '/database/connection.php');
    require_once(ROOT . '/classes/Pet.php');

    class PetsList {
        public $pets = array();

        public function __construct() {
            $stored_pets = $this->getPets();

            foreach ($stored_pets as $stored_pet) {
                $pet = new Pet(
                    $stored_pet["PetID"],
                    $stored_pet["Name"],
                    $stored_pet["Gender"],
                    $stored_pet["Age"],
                    $stored_pet["Color"],
                    $stored_pet["Weight"],
                    $stored_pet["Size"],
                    $stored_pet["Photo"],
                    $stored_pet["SpeciesID"],
                );

                array_push($this->pets, $pet);
            }
        }

        // Retrieves all pets for adoption from database
        public function getPets() {
            global $db;
        
            $query =   'SELECT * FROM 
                        Pets JOIN PetSpecies 
                        ON Pets.SpeciesID = PetSpecies.PetSpeciesID';
            
            $stmt = $db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
?>

