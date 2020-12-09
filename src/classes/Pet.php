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
            $this->pet_species = $pet_species_id;
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
                    $this->pet_species_id,
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
    
        public function getSearchedPets($name, $species) {
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
    
        public function getGender(){
            $r  = ($this->gender == 1) ?  "Male" :  "Female";

            return $r;
        }
    
        public function getAge(){
            $r = ($this->age > 1) ? $this->age . " Years" :  $this->age . " Year";

            return $r;
        }
    
        public function getSize() {
            $r = ($this->size == 0) ? "Small" : ($this->size == 1 ? "Medium" : "Large");

            return $r;
        }
    
        public function getComments($post){
            global $db;
    
            $query =   'SELECT * FROM 
                        Comments where AdoptionPostID = ?';
    
            $stmt = $db->prepare($query);
            $stmt->execute(array($post));
    
            return $stmt->fetchAll();
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