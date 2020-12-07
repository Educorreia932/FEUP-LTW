function addComment(username,pet,event) {
    event.preventDefault();
    let commentDiv = document.getElementById("comments");

    let newComment = document.createElement("div");

    newComment.setAttribute("id", "comment");
    newComment.innerHTML = "<p>" + username + "</p>";
    var commentText = document.getElementById("commentText").value;
    newComment.innerHTML += "<p>" + commentText + "</p>";

    commentDiv.prepend(newComment);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "actions/action_addComment.php", true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify({
        comment: commentText,
        pet: pet
    }));
}


