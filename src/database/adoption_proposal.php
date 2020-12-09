<?php
function getAdoptionMaxID() {
        global $db;
        
        $query =   'SELECT MAX(ID) AS M FROM AdoptionProposal';
        
        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    

function proposedBefore($user_id, $pet_id) {
    global $db;
    
    $query =   'SELECT * FROM AdoptionProposal JOIN ProposalPets ON (AdoptionProposal.ID = ProposalPets.ProposalID)
                WHERE AdoptionProposal.AuthorID = ? AND ProposalPets.PetID = ?';
    
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id,$pet_id));

    return $stmt->fetch();
}
?>