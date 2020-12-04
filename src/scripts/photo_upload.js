function readURL(input) {

    if (input.files && input.files[0]) {

        let element = document.getElementById("photo_button");

        var reader = new FileReader();
        
        let image = document.createElement("img");
        let resetButton = document.createElement("button");
        resetButton.setAttribute("id", "resetButton");
        resetButton.setAttribute("onclick", "resetImage();");
        resetButton.innerHTML = "Reset";
        
        reader.onload = function (e) {
            image.setAttribute('src', e.target.result);
            image.setAttribute('id', 'photo-preview');

            element.outerHTML = image.outerHTML + resetButton.outerHTML;
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function resetImage() {
    let element = document.getElementById("photo-preview");

    let photoButton = document.createElement("div");
    photoButton.setAttribute('id', 'photo_button');
    photoButton.innerHTML = '<label for="image"><i class="fas fa-plus fa-4x"></i><p>Submit a photo</p></label>';

    element.replaceWith(photoButton);

    let resetButton = document.getElementById("resetButton");
    resetButton.remove();
}