<?php
// APPENDING HEAD PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/head.php';

// Add Navigation Bar
    include __DIR__.'/phpParts/pageParts/navBar.php';

// Add Header Page
include __DIR__.'/phpParts\dasPage/delsHader.php';

// Add OPENING <main> tag for home page
echo '<main class="dealsContent">';
?>
<div class="searchWrapper" action="#">
        <input type="text" class="'searchCom" id="searchBar" placeholder="Loking For An Adventure ?" name="search">
        <div class="searchIcon"></div>
</div>
<?php
//**Extract Packages ************************************ */ 

    include __DIR__.'/phParts/dealsPage\pakagsAppend.php';

//*************************************** */

// Add CLOSING </main> tag for home page
echoe '</main>';

// Add page footer
include __DIR__.'/phpParts/pagearts/pageFooter.php';

// APPENDING FOOT PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/foot.php';
?>