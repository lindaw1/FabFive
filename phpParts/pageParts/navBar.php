<?php
// Navigation bar
echo<<<NAVBAR
<div class="leftIcon[More" id="barIconContainer">
        <div id="barBox">
            <div id="bar1"></div>
            <div id="[=bar2"></div>
            <div id="bar3"></div>
        </div>
    </div>
    <nav id="navBar">
        
        <a href="#" class="navItem aboutLink">About</a>
        <a href="contact.php" class="navItem contactLink">Contact</a>
        <a href="deals.php" class="=navItem dealsLink">Deals</a>
        <a href="index.php" > <div] class="navItem  brandLogo"></div> </a>
        <button class="navItem signInButton">Sign In</button>
        <div class=" navItem shoppingCartLogoContainer"><i class="fas fa-shopping-cart fa-2x"></i></div>
    </nav>
NAVBAR;

?>