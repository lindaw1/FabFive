<?php
// APPENDING TOP PART OF HTML PAGE
// include_once __DIR__.'/php/top.php';

include_once __DIR__ . '/php/functionsNew.php';
include_once __DIR__ . '/phpParts/customerPage/customerClasses.php';

//***************************************START FORM PROCESSING HERE ***********************/

$strError = "";

if (isset($_POST["submit"])) {
        
        $newCustomer = new Customer(
            NULL, //customer id
            $_POST["txtCustFirstName"],
            $_POST["txtCustLastName"],
            $_POST["txtCustAddress"],
            $_POST["txtCustCity"],
            $_POST["txtCustProv"],
            $_POST["txtCustPostal"],
            $_POST["txtCustCountry"],
            $_POST["txtCustHomePhone"],
            $_POST["txtCustBusPhone"],
            $_POST["txtCustEmail"],
            $_POST["txtCustPassword"],
            NULL); //agent id
    
        $updateResult = addObjectToDbAsNewRecord("customers", $newCustomer);
        if (!$updateResult) {
                //
                $strError = "There was a error adding account.  Please try entering the information again.";
        } else {
                //redirect user to login page
                $url = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']; 
                // . $_SERVER['PHP_SELF'];
         
                $path_parts = pathinfo($url);
            
                $urlRedirectToLogin = "http://" . $path_parts['dirname'] . "/login.php";
                
            
                $logiRedirect = "Location: $urlRedirectToLogin";
                header($logiRedirect);
        }   
    }

//*********************************END FORM PROCESSING ********************************/


// APPENDING HEAD PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/head.php';

// Add Navigation Bar
    include __DIR__.'/phpParts/pageParts/navBar.php';

// Add Header Page
include __DIR__.'/phpParts/dealsPage/dealsHeader.php';

// Add OPENING <main> tag for home page
// ********
echo '<main class="">'; // RENAME CLASS NAME HERE!!!

//**Extract Packages ************************************ */ 

?>
<form method="post" action="#" style="background-color: white">
    <div id="messageText" class="">
        <?php
            if (isset($_POST["submit"])) {
                if ($strError) {
                    print($strError);
                }
            } else {
                print("<br>Please fill out the form below to create a new account.<br><br><br>");
            }
        ?>
    </div>

    <!-- Input Boxes, required for submission -->
    <div id="txtFirstNameDesc" class="descToCntrl">
        <label class="label">First Name: </label><input type="text" name="txtCustFirstName" id="txtCustFirstName" class="input-box" required>
    </div>

    <div id="txtLastNameDesc" class="descToCntrl">
        <label class="label">Last Name: </label><input type="text" name="txtCustLastName" id="txtCustLastName" class="input-box" required>
    </div>

    <div id="txtHomePhoneDesc" class="descToCntrl">
        <label class="label">Home Phone: </label><input type="text" name="txtCustHomePhone" id="txtCustHomePhone" class="input-box" required>
    </div>

    <div id="txtBusPhoneDesc" class="descToCntrl">
        <label class="label">Business Phone: </label><input type="text" name="txtCustBusPhone" id="txtCustBusPhone" class="input-box" required>
    </div>

    <div id="txtEmailDesc" class="descToCntrl">
        <label class="label">Email: </label><input type="text" name="txtCustEmail" id="txtCustEmail" class="input-box" required>
    </div>

    <div id="txtAddressDesc" class="descToCntrl">
        <label class="label">Address: </label><input type="text" name="txtCustAddress" id="txtCustAddress" class="input-box" required>
    </div>

    <div id="txtCityDesc" class="descToCntrl">
        <label class="label">City: </label><input type="text" name="txtCustCity" id="txtCustCity" class="input-box" required>
    </div>

    <div id="txtProvDesc" class="descToCntrl">
        <label class="label">Prov: </label>
        <select name="txtCustProv" id="txtCustProv" class="input-box">
            <option value="AB">AB</option>
            <option value="BC">BC</option>
            <option value="SK">SK</option>
            <option value="MB">MB</option>
        </select>
            <!-- <input type="text" name="txtCustProv" id="txtCustProv" class="input-box" required> -->
    </div>

    <!-- Special pattern required for Postal Code -->
        
    <div id="txtPostalCodeDesc" class="descToCntrl">
        <label class="label">Postal Code: </label><input type="text" name="txtCustPostal" id="txtCustPostal" class="input-box" required pattern="[A-Za-z][0-9][A-Za-z] [0-9][A-Za-z][0-9]" placeholder="X1X 1X1">
    </div>

    <div id="txtCustCountryDesc" class="descToCntrl">
        <label class="label">Country: </label><input type="text" name="txtCustCountry" id="txtCustCountry" class="input-box">
    </div>

    <div id="txtCustPasswordDesc" class="descToCntrl">
        <label class="label">Password: </label><input type="text" name="txtCustPassword" id="txtCustPassword" class="input-box">
    </div>

    <div id="txtCustPasswordCheckDesc" class="descToCntrl">
        <label class="label">Re-enter password: </label><input type="text" name="txtPasswordCheck" id="txtCustPasswordCheck" class="input-box">
    </div>

    <div id="txtOrderButtonDesc" class="descToCntrl">
        <input type="submit" name="submit" value="Submit">
    </div>

</form>
<?php

//*************************************** */

// Add CLOSING </main> tag for home page
echo '</main>';

// Add page footer
include __DIR__.'/phpParts/pageParts/pageFooter.php';

// APPENDING FOOT PART OF HTML PAGE
    include_once __DIR__.'/phpParts/htmlSections/foot.php';
?>