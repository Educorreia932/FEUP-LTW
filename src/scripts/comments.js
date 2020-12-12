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
    let reply_box = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ')').querySelector('.reply_box');
    let reply_button = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ')').querySelector('input#reply_button');

    if(replyActive == comment_number) {
        reply_box.style.display = "none";
        reply_button.value = "Reply";
        replyActive = 0;
    } 
    else {
        reply_box.style.display = "block";
        if(replyActive > 0) {
            toggleReplyBox(replyActive);
        }
        replyActive = comment_number;
        reply_button.value = "Cancel";

    }   
}

function submitReply(event, number) {
    event.preventDefault();

    let text = document.querySelector('#comments .question_answer:nth-child(' + number + ') .reply_box textarea[id=replyText]').value;
    let comment_id = document.querySelector('#comments .question_answer:nth-child(' + number + ') .reply_box input[name=comment_id]').value;
    let comment_number = document.querySelector('#comments .question_answer:nth-child(' + number + ') .reply_box [name=comment_number]').value;

    console.log(text);
    console.log(comment_id);
    console.log(comment_number);

    // let d = new Date();
    // let date = d.getDate() + '-' + d.getMonth() + '-' + d.getFullYear() + ' ' + 
    //     ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2) + ':' + ("0" + d.getSeconds()).slice(-2);

    let request = new XMLHttpRequest();

    request.addEventListener("load", function() { receiveCommentsReplies(comment_number, this.responseText); })
    request.open("post", "../api/api_add_reply.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            text: text,
            question_id: comment_id,
            // date: date,
        })
    );
}

function receiveCommentsReplies(comment_number, response) {
    console.log(response);
    const reply = JSON.parse(response);

    let reply_div = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ')').querySelector('.reply');

    let replyFooter = document.createElement("footer");
    let replyDate = document.createElement("p");
    replyDate.innerHTML = reply.Date;
    replyFooter.prepend(replyFooter);

    let replyText = document.createElement("p");
    replyText.innerHTML = reply.text;

    reply_div.prepend(replyDate);
    reply_div.prepend(replyText);
}