<?php
// Home page header
echo<<<HOMEHEADER
<!-- Header Section -->
<header class="homeHid="homeDisplay">
    <div class="videy" style="width: 100%; height: 100%; z-index: 1; "></div>          
    <div class="exple" id="mediaDisplay">
        <!-- defaultfor when JS is disabled-->
        <div id="defge"></div>
        <h1> Welcomevel Experts !</h1>
        <p> We striving you the vacation getaway of a lifetime.</p>

    </div> 
    <button class="slidebtn prev" ><i id="leftClick"class="fa fa-chevron-circle-left"></i></button>
    <button class="slidebtn next" ><i id="rightClick" class="fa fa-chevron-circle-right"></i></button>
</header>
HOMEHEADER;
?>