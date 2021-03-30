<?php
    include_once(__DIR__ . "/../config.php");

    include_once(ROOT . '/database/connection.php'); 
    include_once(ROOT . '/database/adoption_proposal.php'); 

    $answer = $_POST['answer'];
    $proposal_id = $_POST['proposal_id'];

    if($answer == 1) {
        // $wow = acceptProposal($proposal_id);
        // if($wow == 1)
        //     echo(json_encode(1));
        // else if($wow == 2) {
        //     echo(json_encode(2));
        // }
        if(acceptProposal($proposal_id))
            echo(json_encode(1));
        else echo(json_encode(0));
    } 
    else if($answer == -1) {
        if(refuseProposal($proposal_id))
            echo(json_encode(1));
        else echo(json_encode(0));
    }
?>