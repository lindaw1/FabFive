<?php
// APPENDING HEAD PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/head.php';

// Add Navigation Bar
    include __DIR__.'/phpParts/pageParts/navBar.php';


// Add OPENING <main> tag for page
echo '<main class="orderContent">';

//**Extract Packages ************************************ */ 
?>
<div class="wrapper">
<h2>Customer Online Order Form</h2>
<form action="">
        <!-- Input Boxes, required for submission -->
        <div id="txtNameDesc" class="descToCntrl">
            <label class="label">Name: </label><input type="text" id="txtName" class="input-box" required>
        </div>

        <div id="txtAddressDesc" class="descToCntrl">
            <label class="label">Address: </label><input type="text" id="txtAddress" class="input-box" required>
        </div>

        <div id="txtCityDesc" class="descToCntrl">
            <label class="label">City: </label><input type="text" id="txtCity" class="input-box" required>
        </div>

        <div id="txtProvinceDesc" class="descToCntrl">
            <label class="label">Province: </label><input type="text" id="txtProvince" class="input-box" required>
        </div>

        <!-- Special pattern required for Postal Code -->
            
        <div id="txtPostalCodeDesc" class="descToCntrl">
            <label class="label">Postal Code: </label><input type="text" id="txtPostalCode" class="input-box" required pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" placeholder="X1X 1X1">
        </div>

        <div id="txtPhoneDesc" class="descToCntrl">
            <label class="label">Phone: </label><input type="text" id="txtPhone" class="input-box" required>
        </div>

        <div id="txtCreditCardDesc" class="descToCntrl">
            <label class="label">Credit Card: </label><input type="text" id="txtCreditCard" class="input-box" required>
        </div>

        <div id="txtCreditCardExpDesc" class="descToCntrl">
            <label class="label">Credit Card Expiry: </label><input type="text" id="txtCreditExpCard" class="input-box" required>
        </div>

        <div id="txtOrderButtonDesc" class="descToCntrl">
        <!-- <a href="links.php" target="_blank">  -->
            <img src="img/checkout-button.jpg" alt="Order Now"
                class="orderButton"></a><br>
        </div>

</form>
</div>
<?php
//*************************************** */

// Add CLOSING </main> tag for home page
echo '</main>';

// Add page footer
include __DIR__.'/phpParts/pageParts/pageFooter.php';

// APPENDING FOOT PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/foot.php';
?>