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