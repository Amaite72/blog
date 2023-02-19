const bgTitle = document.getElementById("title-bg-img")
const navChoices = document.getElementById("nav-choices-display");
const navButton = document.getElementById("nav-choices")
window.addEventListener("load", function() {
    console.log("page is fully loaded");
});

navButton.addEventListener("click", function() {
    navChoices.style.display = "block";
    
    
    navChoices.style.position = "absolute";
    navChoices.style.zIndex = "1";
    navChoices.style.backgroundColor = "#ffffff";
    navChoices.style.transition = "width 2s";
    navChoices.style.width = "80%";
    navChoices.style.height = "100vh";
});