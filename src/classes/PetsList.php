<?php
    require_once(__DIR__ . "/../config.php");
    require_once(ROOT . '/database/connection.php');
    require_once(ROOT . '/classes/Pet.php');

    class PetsList {
        public $pets = array();

        public function __construct() {
            $pet_entries = $this->fetchPets();

            foreach ($pet_entries as $pet_entry) {
                $pet = Pet::fromArray($pet_entry);

                array_push($this->pets, $pet);
            }
        }

        // Retrieves all pets for adoption from database
        public function fetchPets() {
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

