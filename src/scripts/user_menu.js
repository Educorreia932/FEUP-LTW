function toggleMenuDisplay() {
    let currentDisplay = document.getElementById("avatar_dropdown").style.display;

    if(currentDisplay == "none")
        document.getElementById("avatar_dropdown").style.display = "block";
        
    else
        document.getElementById("avatar_dropdown").style.display = "none";
}