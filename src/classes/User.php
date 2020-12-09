<?php
    require_once(__DIR__ . "/../config.php");
    require_once(ROOT . '/database/connection.php');
    
    class User {
        public $id;
        public $username;
        public $password;
        public $name;
        public $biography;
        public $profile_picture;
        public $favorite_pets;
        public $adoption_proposals;

        public function __construct($id, $username, $password, $name, $biography, $profile_picture) {
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
            $this->name = $name;
            $this->biography = $biography;
            $this->profile_picture = $profile_picture;
            $this->favorite_pets = $this->fetchFavoritePets();
            $this->adoption_proposals = array();

            $adoption_proposals_entries = $this->fetchAdoptionProposals();

            foreach ($adoption_proposals_entries as $adoption_proposal_entry) {
                $adoption_proposal = Pet::fromArray($adoption_proposal_entry);

                array_push($this->adoption_proposals, $adoption_proposal);
            }
        }

        // Retrieves user's favorite pets from database
        public function fetchFavoritePets() {
            global $db;

            $stmt = $db->prepare(
                'SELECT Pets.* FROM 
                 (UserFavouritePets JOIN Pets ON UserFavouritePets.PetID = Pets.PetID) 
                 JOIN Users ON UserFavouritePets.UserID = Users.UserID
                 WHERE Username = ?;'
            );

            $stmt->execute(array($this->username));

            return $stmt->fetchAll();
        }

        // Retrieves user's adoption proposals from database
        public function fetchAdoptionProposals() {
            global $db;

            $stmt = $db->prepare(
                'SELECT *
                 FROM AdoptionProposal JOIN Users
                 ON AdoptionProposal.AuthorID = Users.UserID
                 WHERE Users.Username = ?'
            );
    
            $stmt->execute($this->username);

            return $stmt->fetchAll();
        }
    }
?>