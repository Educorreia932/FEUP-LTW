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

function getPostIDFromProposalId($proposal_id) {
    global $db;
    
    $query =   'SELECT * FROM (
                    (AdoptionProposal JOIN ProposalPets ON (AdoptionProposal.ID = ProposalPets.ProposalID))
                    JOIN Pets ON (ProposalPets.PetID = Pets.PetID))
                WHERE AdoptionProposal.ID = ?';
    
    $stmt = $db->prepare($query);
    $stmt->execute(array($proposal_id));

    return $stmt->fetch();
}

function acceptProposal($proposal_id) {
    global $db;
    
    $query =   'SELECT *
                FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
                WHERE Answered = 1 AND AdoptionProposal.ID <> ? 
                AND ProposalPets.PetID IN (
                    SELECT ProposalPets.PetID
                    FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
                    WHERE AdoptionProposal.ID = ?
                )
                ';

    $stmt = $db->prepare($query);
    $stmt->execute(array($proposal_id, $proposal_id));           

    if(count($stmt->fetchAll()) != 0)
        return FALSE;

    
    if($stmt = $db->prepare($query) && $stmt->execute(array($proposal_id))) {

        $query =   'UPDATE AdoptionProposal SET Answered=1, SeenAuthor=0
                WHERE AdoptionProposal.ID = ?';

        $query1 =   'UPDATE AdoptionProposal SET Answered=-1, SeenAuthor=0
                WHERE AdoptionProposal.ID <> ?
                AND AdoptionProposal.ID IN (
                    SELECT AdoptionProposal.ID 
                    FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
                    WHERE ProposalPets.PetID IN (
                        SELECT ProposalPets.PetID
                        FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
                        WHERE AdoptionProposal.ID = ?
                    )
                )';

        $query2 =   'UPDATE AdoptionPosts SET Closed=1
                WHERE AdoptionPostID = ?';
        
        $stmt = $db->prepare($query);
        if($stmt->execute(array($proposal_id)) && ($stmt = $db->prepare($query1)) && $stmt->execute(array($proposal_id, $proposal_id))) {
            $post = getPostIDFromProposalId($proposal_id);
            $stmt = $db->prepare($query2);
            if($stmt->execute(array($post['AdoptionPostID'])));
                return TRUE;
        }
    }
    return FALSE;
}

function refuseProposal($proposal_id) {
    global $db;
    
    $query = 'UPDATE AdoptionProposal SET Answered=-1, SeenAuthor=0
              WHERE AdoptionProposal.ID = ?';
              
    if(($stmt = $db->prepare($query)) && $stmt->execute(array($proposal_id)))
        return TRUE;
    return FALSE;
}

function getNotifications($user_id) {
    global $db;
    
    $query =   'SELECT * FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
                WHERE AdoptionProposal.AuthorID = ? AND SeenAuthor = 0';
    
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id));

    $newAnswers = $stmt->fetchAll();

    $newAnswers = array_map('setNewAnswer', $newAnswers);

    $query =   'SELECT * FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
                WHERE AdoptionProposal.ID IN (
                    SELECT AdoptionProposal.ID FROM (
                        (AdoptionProposal JOIN ProposalPets ON (AdoptionProposal.ID = ProposalPets.ProposalID))
                        JOIN Pets ON (ProposalPets.PetID = Pets.PetID)
                        JOIN AdoptionPosts ON (AdoptionPosts.AdoptionPostID = Pets.AdoptionPostID)
                    )
                    WHERE AdoptionPosts.AuthorID = ?
                ) AND AdoptionProposal.SeenPostAuthor = 0';
    
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id));

    $newProposals = $stmt->fetchAll();

    $newProposals = array_map('setNewProposal', $newProposals);

    $notifications = array_merge($newAnswers, $newProposals);

    return $notifications;
}

function setNewAnswer($value) {
    $value['NotificationType'] = "NewAnswer";
    return $value;
}

function setNewProposal($value) {
    $value['NotificationType'] = "NewProposal";
    return $value;
}

function verifyPostNotifications($user_id, $pet_id) {
    global $db;

    $query =   'UPDATE AdoptionProposal SET SeenPostAuthor=1
                WHERE ID IN (
                    SELECT AdoptionProposal.ID 
                    FROM (
                        AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
                    )
                    WHERE PetID = ? AND SeenPostAuthor=0
                )';

    // $query = 'SELECT AdoptionProposal.ID 
    // FROM (
    //     AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
    // )
    // WHERE PetID = ? AND SeenPostAuthor=0';
    
    $stmt = $db->prepare($query);
    $stmt->execute(array($pet_id));
    echo("<script>console.log('PHP: " . count($stmt->fetchAll()) . "');</script>");
}

function verifyAnswersNotifications($user_id, $pet_id) {
    global $db;

    $query =   'UPDATE AdoptionProposal SET SeenAuthor=1
                WHERE AdoptionProposal.ID IN (
                    SELECT AdoptionProposal.ID 
                    FROM AdoptionProposal JOIN ProposalPets ON AdoptionProposal.ID = ProposalPets.ProposalID
                    WHERE AuthorID = ? AND SeenAuthor=0 AND ProposalPets.PetID = ?
                )';
    
    $stmt = $db->prepare($query);
    $stmt->execute(array($user_id, $pet_id));
    echo("<script>console.log('PHP: " . count($stmt->fetchAll()) . "');</script>");
}

function notifID($value) {
    return $value['ID'];
}

?>