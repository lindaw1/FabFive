

//*********************************************************************************** */
// Navigation bar animation
let barBoxClickOrder = 0;
let barBox = document.getElementById("barBox");
let barIconContainer = document.getElementById("barIconContainer");
barBox.addEventListener("click",()=>{
    barBoxClickOrder +=1;
    let navBar = document.getElementById('navBar');
    
    if (barBoxClickOrder > 1){
        barBoxClickOrder = 0;
    }

    if (barBoxClickOrder===0){
        navBar.style.display="block";
        // Styling popout bar back to normal
        barIconContainer.style.left="2%";
        barIconContainer.style.top="0";
        barIconContainer.style.borderRadius="0";
        barIconContainer.style.backgroundColor="transparent";
        barIconContainer.style.width="12vh";
        barIconContainer.style.height="12vh";  
        
    }else{
        navBar.style.display="none";
        // Styling popout bar icon move to the right
        barIconContainer.style.left="90vw";
        barIconContainer.style.top="5%";
        barIconContainer.style.borderRadius="10%";
        barIconContainer.style.backgroundColor="rgba(255,255,255,0.7)";
        barIconContainer.style.width="9vh";
        barIconContainer.style.height="9vh";                     
    }
    
});
barBox.addEventListener("mouseenter",()=>{
    barBox.style.height="calc(70/160*100%)";
    if (barBoxClickOrder===0){
        barIconContainer.style.backgroundColor="transparent";
    }else{
        barIconContainer.style.backgroundColor="rgba(255,255,255,1)";
    }
});
barBox.addEventListener("mouseleave",()=>{
    barBox.style.height="calc(50/160*100%)";
    if (barBoxClickOrder===0){
        barIconContainer.style.backgroundColor="transparent";
    }else{
        barIconContainer.style.backgroundColor="rgba(255,255,255,0.7)";
    }
});
//*********************************************************************************** */


// *********************************************************************************************************************
// Header Content slider

    // The index starting with 1 since our default image will be 0
var contentLibrary = {
    1: {
        videoUrl : "roadTrip.mp4",
        itemTitle : "Canadian Expedition",
        itemText : "The elements that make the Canadian Rockies a year round dream destination converge in perfect harmony in Banff National Park. Established after railway workers stumbled onto a thermal hot spring, Banff became Canada’s first national park in 1885 and today is part of a UNESCO World Heritage Site. "
    },
    2: {
        videoUrl : "travelNow.mp4",
        itemTitle : "Seize Your Moment",
        itemText : "With our world grandiose architecture and the vibrant cultures ingrained. Let us continues to be the number one explorers of the universe. Let us refresh our identities to strip away our anxieties in order to live the most authentic experiences."
    },
    3: {
        videoUrl : "aroundTheWorld.mp4",
        itemTitle : "The Glorious Pacific Oceans",
        itemText : "Asia features some of the best islands in the world’ list, usually grabbing first place. It’s hardly a surprise, since this place is as close as it gets to paradise. With some of the world’s most beautiful beaches, world-class private island resorts and an endless amount of activities and attractions, Travel Experts can help bring to you the perfect vacation getaway for you and your family."
    },
    4: {
        videoUrl : "maldivesSnorkeling.mp4",
        itemTitle : "The Beautiful Maldives",
        itemText : "The beautiful islands of Maldives serve up treasure of a different kind - pristine beaches, dazzling coral reefs, friendly people, and array of water sports. The culmination of it all is the perfect holiday. The moment you set foot on her sands, you will experience the warm embrace of this beautiful country. Whether this is your first visit or you're a repeat traveler, a holiday in Maldives will be memorable for all the right reasons."
    },
    5: {
        videoUrl : "japan.mp4",
        itemTitle : "Tokyo, Japan",
        itemText : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel aliquam ante. Proin elementum ante ante, a hendrerit dui tempor at. Sed sit amet augue vehicula, gravida enim ac, euismod quam. Cras ac placerat tellus. Proin non vehicula mi. Fusce lobortis libero non neque faucibus posuere congue non magna. "
    },
    6: {
        videoUrl : "france.mp4",
        itemTitle : "Paris,France",
        itemText : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel aliquam ante. Proin elementum ante ante, a hendrerit dui tempor at. Sed sit amet augue vehicula, gravida enim ac, euismod quam. Cras ac placerat tellus. Proin non vehicula mi. Fusce lobortis libero non neque faucibus posuere congue non magna. "
    },
    7: {
        videoUrl : "switzerland.mp4",
        itemTitle : "Switzerland",
        itemText : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel aliquam ante. Proin elementum ante ante, a hendrerit dui tempor at. Sed sit amet augue vehicula, gravida enim ac, euismod quam. Cras ac placerat tellus. Proin non vehicula mi. Fusce lobortis libero non neque faucibus posuere congue non magna. "
    }
};

var dots = document.createElement("ul");
dots.className="slider-dots";
dots.id="allDots";
    
for (ad in contentLibrary){
    let d = document.createElement("li");
    d.innerHTML=" &bull;";
    d.className="dot";
    dots.appendChild(d);
    console.log(ad);
}
document.getElementById("homeDisplay").append(dots);

var startingVideo = 0;

function getVideoItem(indexCount){
    // Store content of storage variable into temporary varaiable for extraction
    var tempObj = contentLibrary[indexCount];
    console.log(tempObj);
    var mediaDisplay = document.getElementById("mediaDisplay");
    mediaDisplay.innerHTML= ' <video autoplay muted loop class=\"homeHeaderVideo\" id=\"homeVideo\"><source src=\'videos/homeExplore/'+tempObj.videoUrl+'\' type=\"video/mp4\"> You browser does not support HTML5 video.<br/> Please download <a href=\"https://www.google.ca/chrome/?brand=CHBD&gclid=EAIaIQobChMI6dr_1eqO4AIVgR-tBh3pUgF_EAAYASABEgILQfD_BwE&gclsrc=aw.ds\" target=\"_blank\">Google Chrome</a>. It\'s free! </video><h1>'+ tempObj.itemTitle+'</h1><p>'+tempObj.itemText+'</p>';
};
var allDots = document.getElementById("allDots");
function changeDotColor(dotIndex){
    let adjustIndex = dotIndex - 1;
    var innerDots = allDots.childNodes;
    for (let dt = 0 ; dt < innerDots.length; dt++){
        if (dt == adjustIndex){
            innerDots[dt].className="dot active-dot";
        } else{
            innerDots[dt].className="dot";
        }
    }
}


// function for right selection video
document.getElementById("rightClick").addEventListener("click",()=>{
    startingVideo += 1;
    if (startingVideo > Object.keys(contentLibrary).length ){
        startingVideo = 1;
    }
    getVideoItem(startingVideo);
    changeDotColor(startingVideo);
});
// function for left selection video
document.getElementById("leftClick").addEventListener("click",()=>{
    startingVideo -= 1;
    if (startingVideo <  1 ){
        startingVideo = Object.keys(contentLibrary).length;
    }
    getVideoItem(startingVideo);
    changeDotColor(startingVideo);
});

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

function mouseOverMoveBg(){
    function assignIdToDiv(classNameOfEl){

        var elArray = document.getElementsByClassName(classNameOfEl);

        for (var it = 0 ; it < elArray.length; it++){
            elArray[it].id='hotDeal'+it;
            let tempMove = document.getElementById("hotDeal"+it);
            tempMove.addEventListener("mousemove",(event)=>{
                var amountMovedX = (event.clientX * -1/152-1.5);
                var amountMovedY = (event.clientY * -1 / 90);
                tempMove.style.backgroundPosition= amountMovedX + 'px ' + amountMovedY + 'px';
            });
            console.log(elArray[it]);
        }
    }
    assignIdToDiv('hotDealBg');
    var defaultHeader = document.getElementById("defaultImage");
    defaultHeader.addEventListener("mousemove",(event)=>{
        console.log("on");
        var bgMovedX = (event.clientX * -1/152-1.5);
        var bgMovedY = (event.clientY * -1 / 90);
        defaultHeader.style.backgroundPosition= bgMovedX + 'px ' + bgMovedY + 'px';
    });
}
mouseOverMoveBg();



    
