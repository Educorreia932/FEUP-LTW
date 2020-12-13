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

function acceptProposal($proposal_id) {
    global $db;
    
    $query =   'SELECT *
                FROM AdoptionProposal 
                WHERE Answered = 1 AND ID <> ?';

    $stmt = $db->prepare($query);
    $stmt->execute(array($proposal_id));
    if(count($stmt->fetchAll()) != 0)
        return FALSE;

    
    if($stmt = $db->prepare($query) && $stmt->execute(array($proposal_id))) {

        $query =   'UPDATE AdoptionProposal SET Answer=1
                WHERE AdoptionProposal.ID = ?';

        $query1 =   'UPDATE AdoptionProposal SET Answer=-1
                WHERE AdoptionProposal.ID <> ?';
        
        $stmt = $db->prepare($query);
        if($stmt->execute(array($proposal_id)) && ($stmt = $db->prepare($query1)) && $stmt->execute(array($proposal_id)))
            return TRUE;
    }
    return FALSE;
}

function refuseProposal($proposal_id) {
    global $db;
    
    $query = 'UPDATE AdoptionProposal SET Answer=-1
              WHERE AdoptionProposal.ID = ?';
              
    if($stmt = $db->prepare($query) && $stmt->execute(array($proposal_id)))
        return TRUE;
    return FALSE;
}

?>