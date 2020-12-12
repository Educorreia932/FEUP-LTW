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
    console.log(comment_number);
    let reply_box = document.querySelector('#comments .question_answer:nth-child(' + comment_number + ')').querySelector('.reply_box');

    if(replyActive == comment_number) {
        reply_box.style.display = "none";
        replyActive = 0;
    } 
    else {
        reply_box.style.display = "block";
        if(replyActive > 0) {
            toggleReplyBox(replyActive);
        }
        replyActive = comment_number;

    }

    // if(comment_number == replyActive) 
        
}

function submitReply(event) {
    event.preventDefault();
}