const bgTitle = document.getElementById("title-bg-img")
const navChoices = document.getElementById("nav-choices-display");

const navButton = document.getElementById("nav-choices");
const navButtonClose = document.getElementById("nav-choices-close");
/* window.addEventListener("load", function() {
    console.log("page is fully loaded");
}); */

navButton.addEventListener("click", function() {
    navChoices.style.display = "block";  
    navChoices.style.width = "100%";
    navChoices.style.transition = "width 2s"; 
    navChoices.style.height = "100%";    
    navChoices.style.position = "absolute";
    navChoices.style.zIndex = "1";
    navChoices.style.backgroundColor = "#ffffff";
    navButton.style.display = "none";
    navButtonClose.style.display = "block";  
});

navButtonClose.addEventListener("click", function() {
    navChoices.style.display = "none"; 
    navButton.style.display = "block"; 
    navButtonClose.style.display = "none";   
});