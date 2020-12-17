let fields = document.querySelectorAll("input, select");

for (let field of fields) {
    field.addEventListener("keyup", (event) => {search(event)})
    field.addEventListener("change", (event) => {search(event)})
}

function search(event) {
    event.preventDefault();

    let name = document.querySelector("input[name=name]").value;
    let color = document.querySelector("input[name=color]").value;
    let min_weight = document.querySelector("input[name=min-weight]").value;
    let max_weight = document.querySelector("input[name=max-weight]").value;
    let min_age = document.querySelector("input[name=min-age]").value;
    let max_age = document.querySelector("input[name=max-age]").value;
    let species = document.querySelector("select[name=species]").value;
    let size = document.querySelector("select[name=size]").value;

    let request = new XMLHttpRequest();

    request.addEventListener("load", receiveSearchResults)
    request.open("post", "../api/api_search.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            name: name,
            color: color,
            min_weight: min_weight,
            max_weight: max_weight,
            min_age: min_age,
            max_age: max_age,
            species: species,
            size: size
        })
    );
}

function receiveSearchResults() {
    pet_cards = document.querySelectorAll("section#pet-grid .pet-card");

    console.log(this.responseText);
    let searchResults = JSON.parse(this.responseText);

    for (let pet_card of pet_cards) {
        let pet_id = pet_card.querySelector("span.pet-id").textContent;

        if (!searchResults.includes(pet_id))
            pet_card.style.display = "none";

        else
            pet_card.style.display = "inline-block";
    }
}

