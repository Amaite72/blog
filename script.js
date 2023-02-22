const bgTitle = document.getElementById("title-bg-img")
const navChoices = document.getElementById("nav-choices-display");
const navButton = document.getElementById("nav-choices");
const navButtonClose = document.getElementById("nav-choices-close");

navChoices.style.width = "0";
navChoices.style.height = "0";
navChoices.style.transition = "width 1s, left 1s"; 
navChoices.style.position = "absolute";
navChoices.style.left = "-100%";
navChoices.style.zIndex = "1";
navChoices.style.backgroundColor = "#ffffff";

navButton.addEventListener("click", function() {
    navChoices.style.display = "block";  

    navButtonClose.style.display = "block"; 
    transitionNvabar(navChoices,true); 
});
navButtonClose.addEventListener("click", function() {
    /* navChoices.style.display = "none";  */
    navButton.style.display = "block"; 
    transitionNvabar(navChoices,false); 
       
});

function transitionNvabar(obj,boolStateChange)
{
    console.log('test');
    if (boolStateChange == true)
    {
    obj.style.width = "100%";
    obj.style.height = "100%";
    obj.style.transition = "width 1s, left 1s"; 
    obj.style.position = "absolute";
    obj.style.left = "0";
    obj.style.zIndex = "1";
    obj.style.backgroundColor = "#ffffff";
    }
    else
    {
        obj.style.width = "0";
        obj.style.height = "100%";
        obj.style.transition = "width 1s, left 1s"; 
        obj.style.position = "absolute";
        obj.style.left = "-100%";
        obj.style.zIndex = "1";
        obj.style.backgroundColor = "#ffffff";
        if(obj.style.width === "0"){
            obj.style.display = "none"; 
        }
    }

}

