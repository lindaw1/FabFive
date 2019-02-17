<?php
// APPEDNING SESSION start
include_once __DIR__.'/php/top.php';

// APPEND PACKAGES FUNCTION
include __DIR__.'/phpParts/packagesFunctions/functions.php';

// Remove Item from shopping cart
if (filter_input(INPUT_POST,'removeFromCart')){
    foreach($_SESSION['shopping-cart'] as $numIt => $infoStored){
        if ($infoStored['itemId']==filter_input(INPUT_GET,'id')){
            unset($_SESSION['shopping-cart'][$numIt]);
        }
    }
}

// APPEND ORDERCLASSES
include_once __DIR__.'/phpParts/orderPage/orderClasses.php';
// APPEND ORDER FUCNTIONS
include_once __DIR__.'/phpParts/orderPage/orderFunctions.php';
// APPEND newFUNCTION
    include_once __DIR__.'/php/functionsNew.php';
// APPEND CUSTOMER TOP
    include_once __DIR__.'/phpParts/orderPage/orderTop.php';
// APPENDING HEAD PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/head.php';

// Add Navigation Bar
    include __DIR__.'/phpParts/pageParts/navBar.php';
?>

<!-- Header     -->
<header class="order">
    <h1 class="headerOrderTitle">/ Shopping Cart</h1>
</header>

<?php
// Add OPENING <main> tag for page


if(!empty($_SESSION['shopping-cart'])){
    echo '<main class="orderContent">';
    //**Extract Selections in Cart ************************************ */ 
    echo '<div class="displayCartSelections">';
    $packagesCoppiedArray = retrievePackages();
    $discountsCoppiedArray = retrieveDiscounts();
    foreach($_SESSION['shopping-cart'] as $selectedItem){
        $stringProcess = explode('-',$selectedItem["itemId"]);
        $itemId = $stringProcess[1];
        foreach($packagesCoppiedArray as $correctPkg){
            if ($itemId == $correctPkg['PackageId']){    
                echo '    <form class="itemInCart" method="post" action="order.php?action=add&id='.$correctPkg['PkgName'].'-'.$correctPkg['PackageId'].'">';
                echo '        <div class="cartItemSection itemImg" style="background-image:url(\'img/packages/'.$correctPkg['PkgPicUrl'].'\')"></div>';
                echo '        <div class="cartItemSection itemInfo"> 
                                <h1 class="selPkgTitle">'.$correctPkg['PkgName'].'</h1>
                                <h1 class="selPkgCost">Item Price: c$'.round((float)$correctPkg['PkgBasePrice'],2).'</h1>
                                <h1 class="selPkgQuanity">Quantity: '.$selectedItem['quantity'].'</h1>
                                </div>';
                echo '    <input type="submit" class="remvItemBttn" value="Remove From Cart" name="removeFromCart"/>';
                echo '    </form>';
            }
        }
    }
    echo '</div>';
    include __DIR__.'/phpParts/orderPage/orderForm.php';
}else{
    echo '<main class="orderEmptyCart">';
    echo'<h1 class="noneCartTitle">0 Package Selected</h1>';
    echo'<div class="boxDisplay">
            <img src="img/generalLogo/emptyCart.svg" class="imageCart" width="150vh" height="150vh" />
            <div class="noItemMessage">Your shopping cart is currently empty</div>
            <a href="index.php" class="toHome">Current Sales</a>
            <a href="deals.php" class="toDeals">All Deals</a>
    </div>';
}

//*************************************** */

// Add CLOSING </main> tag for home page
echo '</main>';

// Add page footer
include __DIR__.'/phpParts/pageParts/pageFooter.php';

// APPENDING FOOT PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/foot.php';
?>