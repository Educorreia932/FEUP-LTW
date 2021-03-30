function alertUsedUsername() {
    alert("Username alredy used!");
    window.location.href = "../pages/register.php";
}

function alertNoLoginSubmition() {
    alert("Please log in to submit new pets!");
    window.location.href = "../index.php";
}

function alertWrongImageExtention() {
    alert("Wrong image extention, please try again!");
    window.location.href = "../pages/pet_submission_page.php";
}

function alertWrongCSRF() {
    alert("Wrong CSRF token, please try again!");
    window.location.href = "../index.php";
}

