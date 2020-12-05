let button = document.getElementById("edit_profile_button");
console.log(button);

button.addEventListener('click', setEditProfile);

function setEditProfile() {
    console.log("Edit profile");
    let user_name = document.getElementById("user_info").children[0];
    console.log(user_name);

    let nameInput = document.createElement("input");
    nameInput.setAttribute("type", "text");
    nameInput.setAttribute("id", "editName");
    nameInput.setAttribute("value", user_name.innerHTML);
    user_name.replaceWith(nameInput);
}