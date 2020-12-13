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

    function getAllSpecies() {
        global $db;

        $query = 'SELECT *
                  FROM PetSpecies';
        
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

    function getPet($id){
        global $db;
        $query =   'SELECT * FROM 
                    Pets JOIN PetSpecies 
                    ON Pets.SpeciesID = PetSpecies.PetSpeciesID where Pets.PetID = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($id));
        
        return $stmt->fetchAll()[0];
    }

    function getSpeciesName($id){
        global $db;

        $query =   'SELECT * FROM 
                    PetSpecies where PetSpeciesID = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($id));

        return $stmt->fetch()["SpeciesName"];
    }

    function getGender($gender){
        $r  = ($gender == 1) ?  "Male" :  "Female";

        return $r;
    }

    function getAge($age){
        $r = ($age > 1) ? "$age Years" : "$age Year";

        return $r;
    }

    function getSize($size) {
        $r = ($size == 0) ? "Small" : ($size == 1 ? "Medium" : "Large");
        
        return $r;
    }

    function getPost($post){
        global $db;

        $query =   'SELECT * FROM 
                    AdoptionPosts where AdoptionPostID = ?';

        $stmt = $db->prepare($query);
        $stmt->execute(array($post));

        return $stmt->fetchAll()[0];
    }

    function getPetProposal($proposal) {
        global $db;

        $query =   'SELECT *
                    FROM Pets JOIN ProposalPets ON Pets.PetID=ProposalPets.PetID
                    WHERE ProposalPets.ProposalID=?';
        
        $stmt = $db->prepare($query);
        $stmt->execute(array($proposal['ID']));

        return $stmt->fetch();
    }

    function getAllPetProposals($pet_id) {
        global $db;

        $query =   'SELECT *
                    FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID=ProposalPets.ProposalID
                    WHERE ProposalPets.PetID=?';
        
        $stmt = $db->prepare($query);
        $stmt->execute(array($pet_id));

        return $stmt->fetchAll();
    }
    
    function getAllPetUnansweredProposals($pet_id) {
        global $db;

        $query =   'SELECT *
                    FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID=ProposalPets.ProposalID
                    WHERE ProposalPets.PetID=? AND AdoptionProposal.Answered=0';
        
        $stmt = $db->prepare($query);
        $stmt->execute(array($pet_id));

        return $stmt->fetchAll();
    }

    function getPetPost($post) {
        global $db;

        $query =   'SELECT *
                    FROM Pets
                    WHERE Pets.AdoptionPostID = ?';
        
        $stmt = $db->prepare($query);
        $stmt->execute(array($post['AdoptionPostID']));

        return $stmt->fetch();
    }

    // Checks if a user has a pet in their favorites
    function favoritedPet($username, $pet_id) {
        if (!$username)
            return false;
            
        $favourite_pets = getFavouritePets($username);

        foreach ($favourite_pets as $favourite_pet)
            if ($favourite_pet["PetID"] == $pet_id)
                return true;

        return false;
    }

    // Adds a pet to a user's favorite pets list
    function addFavoritePet($pet_id, $username) {
        global $db;

        $user_id = getUserID($username);

        $stmt = $db->prepare('INSERT INTO UserFavouritePets VALUES (?, ?)');
        $stmt->execute(array($user_id, $pet_id));
    }

    // Removes a pet from a user's favorite pets list
    function removeFavoritePet($pet_id, $username) {
        global $db;

        $user_id = getUserID($username);

        $stmt = $db->prepare('DELETE FROM UserFavouritePets WHERE UserID = ? AND PetID = ?');
        $stmt->execute(array($user_id, $pet_id));
    }
   

    function edit_post($post_title, $location, $description, $post_id){
        global $db;

        $stmt = $db->prepare(
            'UPDATE AdoptionPosts
            SET Title=?, Location=?, Description=?
            WHERE AdoptionPostID=?'
        );

        if($stmt->execute(array($post_title, $location, $description, $post_id)))
            return 0;   
        return 1;  
    }
?>