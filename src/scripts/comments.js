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

        let newComment = document.createElement("div");
        newComment.setAttribute("id","comment");

        const username = document.createElement("p");
        username.innerHTML = comment.Username;

        const text = document.createElement("p");
        text.innerHTML = comment.Text;

        newComment.prepend(text);
        newComment.prepend(username);
        document.getElementById("comments").prepend(newComment)
    }
}

function toggleReplyBox() {
    
}

function submitReply(event) {

}