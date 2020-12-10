function favoritePet(event) {
    let petCard = event.path[2];
    let pet_id = petCard.querySelector("span.pet-id").textContent;
    let request = new XMLHttpRequest();

    request.addEventListener("load", () => {updatePet(petCard)});
    request.open("POST", "../api/api_favorite_pet.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            pet_id
        })
    );
}

function updatePet(petCard) {
    if (this.status == 401)
        alert("You should be logged in to perform this action.");

    else if (this.status == 200) {
        if (this.responseText == "Added to favorites")
            changeFavoriteIcon(petCard, true);

        else if (this.responseText == "Removed from favorites")
            changeFavoriteIcon(petCard, false);
    }
}

function changeFavoriteIcon(petCard, favorited) {
    console.log(":o")
    iconClasses = petCard.querySelector("span.favorite-icon").classList;
    favorited? iconClasses.add("fas") : iconClasses.add("fas");
}
