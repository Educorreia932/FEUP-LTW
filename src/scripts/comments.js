function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function submitComment(event) {
    event.preventDefault();

    let text = document.querySelector("textarea[name=text]").value;
    let pet_id = document.querySelector("input[name=pet_id]").value; 
    let username = document.querySelector("input[name=username]").value;

    let request = new XMLHttpRequest();

    request.addEventListener("load", receiveComments)
    request.open("post", "api/api_add_comment.php", true);
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
    const comments = JSON.parse(this.responseText)

    for (const comment of comments) {
        console.log(comment)
        document.getElementById("comments");

        const username = document.createElement("strong");
        username.innerHTML = comment.Username;

        const text = document.createElement("p");
        text.innerHTML = comment.Text;

        document.getElementById("comments").prepend(text);
        document.getElementById("comments").prepend(username);
    }
}
