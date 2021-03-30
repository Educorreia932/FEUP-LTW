let commentForm = document.querySelector("section#comments form")

commentForm.addEventListener("submit", (event) => submitComment(event));

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
      return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
  }

function submitComment(event) {
    event.preventDefault();

    let id = commentForm.querySelector("input[name=id]").value;
    let comment_id = document.querySelector("article.comment span.id").textContent;
    let username = commentForm.querySelector("input[name=username]").value;
    let text = commentForm.querySelector("textarea[name=text]").value;

    let request = new XMLHttpRequest();

    request.addEventListener("load", receiveComments)
    request.open("post", "api_add_comment.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            id: id, 
            comment_id: comment_id,
            username: username,
            text: text 
        })
    );
}

function receiveComments() {
    console.log(this.responseText)
    const comments_after = JSON.parse(this.responseText)

    for (const comment of comments_after) {

        const article = document.createElement('article')
        article.classList.add('comment')
        article.setAttribute('id', comment.id)

        const user = document.createElement('span')
        user.classList.add('user')
        user.innerHTML = comment.username
        article.appendChild(user)

        const date = document.createElement('span')
        date.classList.add('date')
        date.innerHTML = comment.published
        article.appendChild(date)

        const text = document.createElement('p')
        text.innerHTML = comment.text
        article.appendChild(text)

        const comments = document.querySelector('#comments')
        comments.insertBefore(article, document.querySelector('#comments form'))

        const comments_header = document.querySelector('#comments > h1')
        comments_header.innerHTML = comments.childNodes.length - 2 + ' comments'
    }
}
