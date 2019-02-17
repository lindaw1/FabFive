<?php
// Navigation bar
echo<<<NAVBAR
<div class="leftIconMore" id="barIconContainer">
        <div id="barBox">
            <div id="bar1"></div>
            <div id="bar2"></div>
            <div id="bar3"></div>
        </div>
    </div>
    <nav id="navBar">
        
        <a href="#" class="navItem aboutLink">About</a>
        <a href="contact.php" class="navItem contactLink">Contact</a>
        <a href="deals.php" class="navItem dealsLink">Deals</a>
        <a href="index.php" > <div class="navItem  brandLogo"></div> </a>
        <button class="navItem signInButton">Sign In</button>
NAVBAR;
    if(empty($_SESSION['shopping-cart'])){
        $numSelected = '';
    }else{
        $numSelected =0;
        foreach($_SESSION['shopping-cart'] as $selectedItemCart){
            $numSelected+=$selectedItemCart['quantity'];
        }
        
    }
    echo'    <a class="shoppingCartLogoContainer" href="order.php"><img src="img/generalLogo/shoppingCart.svg" width="38vh" height="38vh" /><div class="numItems">'.$numSelected.'</div></div></a>';
    echo'</nav>';

?>