function favoritePet(event) {
    let petCard = event.path[2];
    let pet_id = petCard.querySelector("span.pet-id").textContent;
    let request = new XMLHttpRequest();

    request.addEventListener("load", function() {updatePet(petCard, this.responseText, this.status)});
    request.open("POST", "../api/api_favorite_pet.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            pet_id
        })
    );
}

function updatePet(petCard, responseText, status) {
    if (status == 401)
        alert("You should be logged in to perform this action.");

    else if (status == 200) {
        if (responseText.trim("\n") == "Added to favorites")
            changeFavoriteIcon(petCard, true);

        else if (responseText.trim("\n") == "Removed from favorites")
            changeFavoriteIcon(petCard, false);
    }
}

function changeFavoriteIcon(petCard, favorited) {
    iconClasses = petCard.querySelector("span.favorite-icon i.fa-heart").classList;

    if (favorited) {
        iconClasses.add("fas");
        iconClasses.remove("far");
    }

    else {
        iconClasses.add("far");
        iconClasses.remove("fas");
    }
}
