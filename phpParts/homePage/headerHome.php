<?php
// Home page header
echo<<<HOMEHEADER
<!-- Header Section -->
<header class="homeHeader" id="homeDisplay">
    <div class="videoOverlay" style="width: 100%; height: 100%; z-index: 1; "></div>          
    <div class="exploreImage" id="mediaDisplay">
        <!-- default image for when JS is disabled-->
        <div class="defaultImage"></div>
        <h1> Welcome To Travel Experts !</h1>
        <p> We strive to bring you the vacation getaway of a lifetime.</p>

    </div> 
    <button class="slidebtn prev" ><i id="leftClick"class="fa fa-chevron-circle-left"></i></button>
    <button class="slidebtn next" ><i id="rightClick" class="fa fa-chevron-circle-right"></i></button>
</header>
HOMEHEADER;
?>