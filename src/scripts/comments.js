function submitComment(event) {
    event.preventDefault();

    let text = document.querySelector("textarea[name=text]").value;
    let pet_id = document.querySelector("input[name=pet_id]").value; 
    let username = document.querySelector("input[name=username]").value;

    let request = new XMLHttpRequest();

    request.addEventListener("load", receiveComments)
    request.open("post", "../api/api_add_comment.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            text: text,
            pet_id: pet_id,
            username: username
        })
    );
}

function receiveComments() {
    console.log(this.responseText);
    const comments = JSON.parse(this.responseText);

    for (const comment of comments) {

        let newQuestionAnswer = document.createElement("div");
        newQuestionAnswer.setAttribute("class","question_answer");

        let newComment = document.createElement("div");
        newComment.setAttribute("class","comment");

        const username = document.createElement("p");
        username.innerHTML = comment.Username;

        const text = document.createElement("p");
        text.innerHTML = comment.Text;

        newComment.prepend(text);
        newComment.prepend(username);
        newQuestionAnswer.prepend(newComment);
        document.getElementById("comments").prepend(newQuestionAnswer);
    }
}

var replyActive = 0;

function toggleReplyBox(comment_number) {
    let reply_box = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ') .reply_box');
    let reply_button = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ') .reply_button');

    if(replyActive == comment_number) {
        reply_box.style.display = "none";
        reply_button.innerHTML = '<i class="fas fa-reply"></i> Reply';
        replyActive = 0;
    } 
    else {
        reply_box.style.display = "block";
        if(replyActive > 0) {
            toggleReplyBox(replyActive);
        }
        replyActive = comment_number;
        reply_button.innerHTML = '<i class="fas fa-window-close"></i> Cancel';

    }   
}

var editActive = 0;

function toggleEditBox(comment_number) {
    let edit_box = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ') .edit_box');
    let edit_button = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ') .edit_button');
    let text = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ') .replyText');

    if(editActive == comment_number) {
        text.style.display = "block";
        edit_box.style.display = "none";
        edit_button.innerHTML = '<i class="fas fa-edit"></i> Edit';
        editActive = 0;
    } 
    else {
        text.style.display = "none";
        edit_box.style.display = "block";
        if(editActive > 0) {
            toggleEditBox(editActive);
        }
        editActive = comment_number;
        edit_button.innerHTML = '<i class="fas fa-window-close"></i> Cancel';

    }   
}

function submitReply(event, number) {
    event.preventDefault();

    let text = document.querySelector('#comments .question_answer:nth-child(' + number + ') .reply_box textarea[id=replyText]').value;
    let comment_id = document.querySelector('#comments .question_answer:nth-child(' + number + ') .reply_box input[name=comment_id]').value;
    let comment_number = document.querySelector('#comments .question_answer:nth-child(' + number + ') .reply_box [name=comment_number]').value;

    let request = new XMLHttpRequest();

    request.addEventListener("load", function() { receiveCommentsReplies(comment_number, this.responseText); })
    request.open("post", "../api/api_add_reply.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            text: text,
            question_id: comment_id,
        })
    );
}

function editReply(event, number) {
    event.preventDefault();

    let text = document.querySelector('#comments .question_answer:nth-child(' + number + ') .edit_box textarea[id=editText]').value;
    let reply_id = document.querySelector('#comments .question_answer:nth-child(' + number + ') .edit_box input[name=reply_id]').value;
    let comment_number = document.querySelector('#comments .question_answer:nth-child(' + number + ') .edit_box [name=comment_number]').value;

    let request = new XMLHttpRequest();

    request.addEventListener("load", function() { receiveEditReply(comment_number, this.responseText); })
    request.open("post", "../api/api_edit_reply.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            text: text,
            reply_id: reply_id,
        })
    );
}

function receiveEditReply(comment_number, response)
{
    if(response != -1){
        let replyText = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ') p.replyText');
        replyText.innerHTML = JSON.parse(response);
        toggleEditBox(comment_number);
    }
}

function receiveCommentsReplies(comment_number, response) {
    if(response != -1) {
        const reply = JSON.parse(response);

        let questionAnswer = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ')');

        let reply_div = document.createElement("div");
        reply_div.setAttribute("class", "reply");

        let replyFooter = document.createElement("footer");
        let replyDate = document.createElement("p");
        replyDate.setAttribute("class", "reply_date");
        replyDate.innerHTML = reply.Date;
        replyFooter.prepend(replyDate);

        let replyText = document.createElement("p");
        replyText.innerHTML = reply.Text;

        reply_div.prepend(replyFooter);
        reply_div.prepend(replyText);

        questionAnswer.append(reply_div);

        toggleReplyBox(comment_number);
        removeReplyButton(comment_number);
    }
}

function removeReplyButton(comment_number) {
    let reply_button = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ') .reply_button');
    reply_button.outerHTML = "";
}