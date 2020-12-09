<?php
    require_once(__DIR__ . "/../config.php");
    require_once(ROOT . '/database/connection.php');
    require_once(ROOT . "/classes/PetsList.php");

    class Pet {
        public $id;
        public $name;
        public $gender;
        public $age;
        public $color;
        public $weight;
        public $size;
        public $photo;
        public $pet_species;
        public $adoption_post;

        public function __construct($id, $name, $gender, $age, $color, $weight, $size, $photo, $pet_species_id) {
            $this->id = $id;
            $this->name = $name;
            $this->gender = $gender;
            $this->age = $age;
            $this->color = $color;
            $this->weight = floatval($weight);
            $this->size = $size;
            $this->photo = $photo;
            $this->pet_species_id = $pet_species_id;
            $this->adoption_post = $id;
        }

        public static function fromArray($pet_entry) {
            return new Pet(
                $pet_entry["PetID"],
                $pet_entry["Name"],
                $pet_entry["Gender"],
                $pet_entry["Age"],
                $pet_entry["Color"],
                $pet_entry["Weight"],
                $pet_entry["Size"],
                $pet_entry["Photo"],
                $pet_entry["SpeciesID"],
            );
        }

        public function addToDatabase() {
            global $db;

            $stmt = $this->$db->prepare('INSERT INTO Pets VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

            $stmt->execute(
                array(
                    $this->id,
                    $this->name, 
                    $this->gender,
                    $this->age, 
                    $this->color, 
                    $this->weight,
                    $this->size, 
                    $this->photo, 
                    $this->fetchSpeciesID($this->pet_species),
                    $this->id
                )
            );
        }

        public static function fetchByID($id) {
            global $db;
    
            $query = 'SELECT *
                      FROM Pets
                      WHERE PetID = ?';
            
            $stmt = $db->prepare($query);
            $stmt->execute(array($id));

            $pet_entry = $stmt->fetch();
            $pet = Pet::fromArray($pet_entry);
    
            return $pet;
        }

        public static function fetchSpeciesName($species_id) {
            global $db;
    
            $query = 'SELECT SpeciesName
                      FROM PetSpecies
                      WHERE PetSpeciesID = ?';
            
            $stmt = $db->prepare($query);
            $stmt->execute(array($species_id));

            $species_name = $stmt->fetch()["SpeciesName"];
    
            return $species_name;
        }

        public static function fetchSpeciesID($species_name) {
            global $db;
    
            $query = 'SELECT PetSpeciesID
                      FROM PetSpecies
                      WHERE SpeciesName = ?';
            
            $stmt = $db->prepare($query);
            $stmt->execute(array($species_name));

            $species_id = $stmt->fetch()["SpeciesName"];
    
            return $species_id;
        }
    
        public function getGender() {
            $r  = ($this->gender == 1) ?  "Male" :  "Female";

            return $r;
        }
    
        public function getAge() {
            $r = ($this->age > 1) ? $this->age . " Years" :  $this->age . " Year";

            return $r;
        }
    
        public function getSize() {
            $r = ($this->size == 0) ? "Small" : ($this->size == 1 ? "Medium" : "Large");

            return $r;
        }

        public function getSpecies() {
            $r = $this->fetchSpeciesName($this->pet_species_id);

            return $r;
        }
    
        public function getPetProposal($proposal) {
            global $db;
    
            $query =   'SELECT *
                        FROM Pets JOIN ProposalPets ON Pets.PetID=ProposalPets.PetID
                        WHERE ProposalPets.ProposalID=?';
            
            $stmt = $db->prepare($query);
            $stmt->execute(array($proposal['ID']));
    
            return $stmt->fetch();
        }
    
        public function getPetPost($post) {
            global $db;
    
            $query =   'SELECT *
                        FROM Pets
                        WHERE Pets.AdoptionPostID = ?';
            
            $stmt = $db->prepare($query);
            $stmt->execute(array($post['AdoptionPostID']));
    
            return $stmt->fetch();
        }
    }
?>