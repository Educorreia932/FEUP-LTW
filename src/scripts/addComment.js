function addComment(username,petID){
    let commentDiv = document.getElementById("comments");

    let newComment = document.createElement("div");

    newComment.setAttribute("id","comment");
    newComment.innerHTML = "<p>" + username + "</p>";
    var commentText = document.getElementById("commentText").value;
    newComment.innerHTML += "<p>" + commentText + "</p>";

    commentDiv.prepend(newComment);
    return false;
}


