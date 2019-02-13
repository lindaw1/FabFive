<?php
// APPENDING HEAD PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/head.php';

// Add Navigation Bar
    include __DIR__.'/phpParts/pageParts/navBar.php';

// Add Header Page
include __DIR__.'/phpParts/dealsPage/dealsHeader.php';

// Add OPENING <main> tag for home page
echo '<main class="dealsContent">';

//**Extract Packages ************************************ */ 

    include __DIR__.'/phpParts/dealsPage/packagesAppend.php';

//*************************************** */

// Add CLOSING </main> tag for home page
echo '</main>';

// Add page footer
include __DIR__.'/phpParts/pageParts/pageFooter.php';

// APPENDING FOOT PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/foot.php';
?>