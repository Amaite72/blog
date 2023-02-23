const bgTitle = document.getElementById("title-bg-img")
const navChoices = document.getElementById("nav-choices-display");
const navButton = document.getElementById("nav-choices");
const navButtonClose = document.getElementById("nav-choices-close");
const actionMode = document.querySelector(".actions-post");
const buttonLeft = document.querySelector(".button-left");
const buttonRight = document.querySelector(".button-right");
const fontUpdate = document.querySelector(".fa-pen-to-square");
const fontDelete = document.querySelector(".fa-trash");

navChoices.style.width = "0";
navChoices.style.height = "0";
navChoices.style.transition = "width 1s, left 1s"; 
navChoices.style.position = "absolute";
navChoices.style.left = "-100%";
navChoices.style.zIndex = "1";
navChoices.style.backgroundColor = "#ffffff";

/***************** NAVBAR ***************/

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
        obj.style.transition = "width 2s, left 2s"; 
        obj.style.position = "absolute";
        obj.style.left = "-100%";
        obj.style.zIndex = "1";
        obj.style.backgroundColor = "#ffffff";
        if(obj.style.width === "0"){
            obj.style.display = "none"; 
        }
    }

}

/***************** POST ACTIONS ***************/
buttonRight.style.display = "block";
buttonLeft.style.display = "none";
buttonRight.addEventListener("click", function() {
    console.log(actionMode);
    actionMode.style.width = "160px";
    /* while(actionMode.style.width != "150px"){
        fontUpdate.style.display = "none";
        fontDelete.style.display = "none";
    } */
    actionMode.style.transition = "width 1s"
    buttonRight.style.display = "none";
    buttonLeft.style.display = "block";
    
});


buttonLeft.addEventListener("click", function() {
    actionMode.style.width = "50px";
    actionMode.style.transition = "width 1s"
    buttonRight.style.display = "block";
    buttonLeft.style.display = "none";
}); 

fontDelete.addEventListener("click", function() {
    console.log("coucou");
}); 