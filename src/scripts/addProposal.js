function receivePost() {
    if (this.responseText == 'error')
        alert("Proposal has already been submited!");
    else
        alert("Proposal has been sent!");
}

function addAdoptionProp(pet, userID) {
    var text = prompt("Enter a brief description why you want to adopt the pet.");

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