function receivePost() {
    if (this.responseText == 'error')
        alert("Proposal has already been submited!");
    else
        alert("Proposal has been sent!");
}

function addAdoptionProp(pet, userID) {
    var text = "";

    while(text==""){
        text = prompt("Enter a brief description why you want to adopt the pet.")
        if(text == null)
        {
            alert("Canceled Proposal.");
            return;
        }
        if(text == "")
        {
            alert("Please enter a description.");
        }
    }

    let request = new XMLHttpRequest();

    request.addEventListener("load", receivePost);

    request.open("post", "../api/api_adoption_propose.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({
            pet_id: pet,
            userID: userID,
            text: text
        })
    );
}

function answerProposal(proposal_id, proposal_number, answer) {
    if(answer != -1 && answer != 1)
        return;
    
    if(answer == 1)
        console.log("accept " + proposal_number);
    else 
        console.log("refuse " + proposal_number);

    // let request = new XMLHttpRequest();

    // request.addEventListener("load", proposalAnswerHandler);

    // request.open("post", "../api/api_answer_proposal.php", true);
    // request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // request.send(
    //     encodeForAjax({
    //         proposal_id: proposal_id,
    //         answer: answer
    //     })
    // );
}