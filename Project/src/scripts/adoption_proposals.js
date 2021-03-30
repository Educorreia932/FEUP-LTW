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

    let request = new XMLHttpRequest();

    request.addEventListener("load", function() {proposalAnswerHandler(this.responseText, answer, proposal_number)});

    request.open("post", "../api/api_answer_proposal.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({
            proposal_id: proposal_id,
            answer: answer
        })
    );
}

function proposalAnswerHandler(response, answer, proposal_number) {
    if(response == 1) {
        let proposal = document.querySelector('#adoption_post_proposals .post_proposal:nth-child(' + proposal_number + ')');
        if(answer == 1) {
            proposal.style.backgroundColor = "#90ee90";
            let rest = document.querySelectorAll('#adoption_post_proposals .post_proposal:not(:nth-child(' + proposal_number + '))');

            for(prop of rest) {
                prop.style.backgroundColor = "#ffcccb";  
            }
            let all_buttons = document.querySelectorAll('.proposal_buttons');
            for(buttons of all_buttons)
                buttons.replaceWith("");
        } 
        else if(answer == -1) {
            proposal.style.backgroundColor = "#ffcccb";
            let buttons = proposal.querySelector('.proposal_buttons');
            buttons.replaceWith("");
        }
    }
    else {
        alert("There has been an error answering the proposal!");
    }
}