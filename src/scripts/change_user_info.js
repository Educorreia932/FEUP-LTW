function check_pass() {
    if (document.getElementById('newPassword1').value ==
            document.getElementById('newPassword2').value) {
        document.getElementById('submit_password').disabled = false;
        document.getElementById('password_error').innerHTML = "";
    } else {
        document.getElementById('submit_password').disabled = true;
        document.getElementById('password_error').innerHTML = "Password confirmation invalid!";
    }
}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function submitNewPass(event) {
    event.preventDefault();

    let oldPassword = document.querySelector("input[name=oldPassword]").value;
    let newPassword = document.querySelector("input[name=newPassword1]").value; 
    let username = document.querySelector("input[name=user_username]").value; 

    let request = new XMLHttpRequest();

    request.addEventListener("load", receivePasswordResponse)
    request.open("post", "../api/api_change_password.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            oldPassword: oldPassword,
            newPassword: newPassword,
            username: username
        })
    );
}

function receivePasswordResponse() {
    switch(this.responseText.trim('\n')) {
        case "0":
            alert("Password changed successfuly! Please log in again.");
            document.getElementById('password_error').innerHTML = "";
            window.location.href = "../actions/log_out.php";
            break;
        case "1":
            document.getElementById('password_error').innerHTML = "New password cannot be the same as current password!";
            break;
        case "2":
            console.log("cur pass inv");
            document.getElementById('password_error').innerHTML = "Invalid current password!";
            break;
        default:
            break;
    }
}

function submitNewUsername(event) {
    event.preventDefault();

    let currentUsername = document.querySelector("input[name=user_username]").value;
    let newUsername = document.querySelector("input[name=newUsername]").value; 

    let request = new XMLHttpRequest();

    request.addEventListener("load", receiveUsernameResponse)
    request.open("post", "../api/api_change_username.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            currentUsername: currentUsername,
            newUsername: newUsername
        })
    );
}

function receiveUsernameResponse() {
    switch(this.responseText.trim('\n')) {
        case "0":
            alert("Username changed successfuly! Please log in again.");
            document.getElementById('username_error').innerHTML = "";
            window.location.href = "../actions/log_out.php";
            break;
        case "1":
            document.getElementById('username_error').innerHTML = "Username already taken!";
            break;
        case "2":
            document.getElementById('username_error').innerHTML = "New username cannot be the same as the current username!";
            break;
        default:
            break;
    }
}

function submitNewProfile(event) {
    event.preventDefault();

    let newName = document.querySelector("input[name=newName]").value;
    let username = document.querySelector("input[name=user_username]").value;
    let newBio = document.getElementById("newBio").value;
    if(newBio == null) 
        newBio = "";

    console.log(newBio);


    let request = new XMLHttpRequest();

    request.addEventListener("load", receiveProfileResponse);
    request.open("post", "../api/api_change_profile.php", true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(
        encodeForAjax({ 
            username: username,
            newName: newName,
            newBio: newBio
        })
    );
}

function receiveProfileResponse() {
    switch(this.responseText.trim('\n')) {
        case "0":
            alert("Profile info saved successfuly!");
            document.getElementById('info_error').innerHTML = "";
            break;
        case "1":
            document.getElementById('info_error').innerHTML = "An error ocurred while saving changes";
            break;
        default:
            break;
    }
}
