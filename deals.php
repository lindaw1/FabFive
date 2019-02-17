<?php

// APPEDNING SESSION start
include_once __DIR__.'/php/top.php';
// Add to cart 
if (filter_input(INPUT_POST,'addToCart')){
    if(isset($_SESSION['shopping-cart'])){
        $count = count($_SESSION['shopping-cart']);
        $itemCount = 0;
        foreach( $_SESSION['shopping-cart'] as $indexItem => $valueItem){
            if($valueItem['itemId'] == filter_input(INPUT_GET,'id')){
                $_SESSION['shopping-cart'][$indexItem]=array(
                    'itemId' => filter_input(INPUT_GET,'id'),
                    'quantity' => $valueItem['quantity']+1 // input quanity if there is input value added later on
                );            
            }else{
                $itemCount += 1;
            }
        }        
        if ($itemCount == count($_SESSION['shopping-cart'])){
            $_SESSION['shopping-cart'][$count]=array(
                'itemId' => filter_input(INPUT_GET,'id'),
                'quantity' => 1
            );
        }

    }else{
        $_SESSION['shopping-cart'][0]=array(
            'itemId' => filter_input(INPUT_GET,'id'),
            'quantity' => 1 // input quanity if there is input value added later on
        );
    }
}

// APPENDING HEAD PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/head.php';

// Add Navigation Bar
    include __DIR__.'/phpParts/pageParts/navBar.php';

// Add Header Page
include __DIR__.'/phpParts/dealsPage/dealsHeader.php';

// Add OPENING <main> tag for home page
echo '<main class="dealsContent">';
?>

<div class="searchWrapper" action="#">
    <input type="text" class="searchCom" id="searchBar" placeholder="Looking For An Adventure ?" name="search">
    <div class="searchIcon"></div>
</div>

<?php
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