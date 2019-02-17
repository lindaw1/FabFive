<?php

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


?>