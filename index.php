<?php
// APPENDING HEAD PART OF HTML PAGE
// include_once __DIR__."/php/classes.php";
// include_once __DIR__."/php/functions.php";

// APPENDING HEAD PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/head.php';

// Add Navigation Bar
    include __DIR__.'/phpParts/pageParts/navBar.php';

// Add Home Page Header
    include __DIR__.'/phpParts/homePage/headerHome.php';

// Add OPENING <main> tag for home page
echo '<main class="homeContent">';

// Add sales header Title
echo '<h1 class="homeHotDeals">Our Monlthy Limited Sales:</h1>';


//**Extract Data For Sales************************************ */ 

    include __DIR__.'/phpParts/homePage/salesAppend.php';

//*************************************** */

// Add CLOSING </main> tag for home page
echo '</main>';

// Add page footer
include __DIR__.'/phpParts/pageParts/pageFooter.php';

// APPENDING FOOT PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/foot.php';
?>