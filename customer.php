<?php
// APPEND CUSTOMER CLASSES
    include_once __DIR__.'/phpParts/customerPage/customerClasses.php';
// APPEND newFUNCTION
    include_once __DIR__.'/php/functionsNew.php';
// APPEND CUSTOMER TOP
    include_once __DIR__.'/phpParts/customerPage/customerTop.php';
// APPENDING HEAD PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/head.php';

// Add Navigation Bar
    include __DIR__.'/phpParts/pageParts/navBar.php';


// Add OPENING <main> tag for home page
// ********
echo '<main class="">'; // RENAME CLASS NAME HERE!!!

//**Extract Packages ************************************ */ 

include __DIR__.'/phpParts/customerPage/customerForm.php';
//*************************************** */

// Add CLOSING </main> tag for home page
echo '</main>';

// Add page footer
include __DIR__.'/phpParts/pageParts/pageFooter.php';

// APPENDING FOOT PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/foot.php';
?>