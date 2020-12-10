function favoritePet(event) {
    let pet_id = event.path[2].querySelector("span.pet-id").textContent;
    let request = new XMLHttpRequest();

    request.addEventListener("load", receiveResponse);
    request.open("post", "../api/api_favorite_pet.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            pet_id: pet_id
        })
    );
}

function receiveResponse() {
    console.log(this.responseText);
}