<?php
    include_once(__DIR__ . "/../config.php");
    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/adoption_proposal.php'); 

    date_default_timezone_set('Europe/Lisbon');
    
    $pet_id = $_POST["pet_id"];
    $user_id = $_POST["userID"];
    $text = $_POST["text"];
    $date = (new DateTime('NOW'))->format('d-m-Y H:i:s');
    $test = proposedBefore($user_id,$pet_id);

    if(!$test){
        $tablesID = (int)getAdoptionMaxID()[0]['M'] + 1;
        
        $stmt = $db->prepare('INSERT INTO AdoptionProposal VALUES (?, ?, ?, ?)');
        $stmt->execute(array($tablesID, $text, $date, $user_id));

        $stmt = $db->prepare('INSERT INTO ProposalPets VALUES (?, ?, ?)');
        $stmt->execute(array($tablesID, $tablesID, $pet_id));

        echo json_encode($test);
    }
    else{
        echo 'error';
    }

?>