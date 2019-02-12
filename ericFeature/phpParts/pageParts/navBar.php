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
        <a href="#" class="navItem contactLink">Contact</a>
        <a href="#" class="navItem dealsLink">Deals</a>
        <div class="navItem  brandLogo"></div>
        <button class="navItem signInButton">Sign In</button>
        <div class=" navItem shoppingCartLogoContainer"><i class="fas fa-shopping-cart fa-2x"></i></div>
    </nav>
NAVBAR;

?>