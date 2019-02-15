

//*********************************************************************************** */
// Navigation bar animation
let barBxsoxClickOrder = 0;
lset barBox = document.getElementById("barBox");
=
});
barBox.axddEventListener("mouseenter",()=>{
    barBox.style.height="calc(70/160*100%)";
    if (barBoxClickOrder===0){
        barIconContainer.style.backgroundColor="rgba(255,255,255,1)";
    }
});
barBox.addEventListener("mouseleave",()=>{
    barBox.style.height="calc(50/160*100%)";
    if 
        barIconContainer.style.backgroundColor="rgba(255,255,255,0.7)";
    }
});
//*********************************************************************************** */


// Scroll to pause video
window.onscroll = function(){
    var homeDisplay = document.getElementById("homeDisplay");
    var videoHeight = homeDisplay.clientHeight*0.3;
    if (startingVideo != 0){
        if (window.pageYOffset >= videoHeight) {
            document.getElementById("homeVideo").pause();
        } else{
            document.getElementById("homeVideo").play();
        }           

    }
    if ( window.pageYOffset > homeDisplay.clientHeight*0.6 && window.pageYOffset < homeDisplay.clientHeight) {
        window.scrollTo({
            top: homeDisplay.clientHeight,
            behavior: 'smooth'
        });
    }
};
// ****************************************************************************************
// Mouse Move Jiggle images on index page

