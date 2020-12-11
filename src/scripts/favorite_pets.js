let pet_cards = document.querySelectorAll(".pet-card");

for (pet_card of pet_cards) {
    pet_card.addEventListener("click", sendRequest.bind(pet_card));
}

function sendRequest() {
    let pet_id = this.querySelector("span.pet-id").textContent;

    let request = new XMLHttpRequest();
    let element = this;

    request.addEventListener("load", function() {
        updatePet(
            element, 
            request.status, 
            request.responseText 
        )
    });
    request.open("POST", "../api/api_favorite_pet.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            pet_id
        })
    );
}

function updatePet(element, status, responseText) {
    if (status == 401)
        alert("You should be logged in to perform this action.");

    else if (status == 200) {
        if (responseText.trim("\n") == "Added to favorites")
            changeAppearance(element, true);

        else if (responseText.trim("\n") == "Removed from favorites")
            changeAppearance(element, false);
    }
}

function changeAppearance(element, favorited) {
    if (element.classList.contains("pet-card")) {
        let icon_classes = element.querySelector("span.favorite-icon i.fa-heart").classList;

        if (favorited) {
            icon_classes.add("fas");
            icon_classes.remove("far");
        }
    
        else {
            icon_classes.add("far");
            icon_classes.remove("fas");
        }
    }
}
