// document.addEventListener("DOMContentLoaded", function() {
//     var section = document.getElementById("password_change");
//     var elements = section.getElementsByTagName("input");
//     // var elements = document.getElementsByTagName("input");
//     for (var i = 0; i < elements.length; i++) {
//         elements[i].oninvalid = function(e) {
//             e.target.setCustomValidity("");
//             if (!e.target.validity.valid) {
//                 e.target.setCustomValidity("This field cannot be left blank");
//             }
//         };
//         elements[i].oninput = function(e) {
//             e.target.setCustomValidity("");
//         };
//     }
// })
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

    request.addEventListener("load", receiveResponse)
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

function receiveResponse() {
    console.log(this.responseText);
    switch(this.responseText) {
        case "0":
            alert("Password changed successfuly! Please log in again.");
            document.getElementById('password_error').innerHTML = "Invalid current password!"
            window.location.href = "../actions/log_out.php";
            break;
        case "-1":
            document.getElementById('password_error').innerHTML = "New password cannot be the same as current password!";
            break;
        case "-2":
            console.log("cur pass inv");
            document.getElementById('password_error').innerHTML = "Invalid current password!"
            break;
        default:
            break;
    }
}