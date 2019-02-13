<?php
//***************************************************************************
// Authors: Stuart Peters, Hoang (Eric) Truong, Linda Wallace
// Date:    February 15, 2019
// Purpose: PHP script for login/logout subform $_POST action
//
//
// Requirements:  
//             - this code assumes a login form with
//             - form named "login"
//             - email input field name="Email", 
//             - agent emails all have "@travelexperts.com" suffix
//             - password input field name="password"
//             - a login button name="loginSubmit", value="loginSubmit"
//             - a "new account" button name="", value=""
//************************************************************************* */
?> 

<?php include_once('php/top.php'); ?>

<!--------------------------PAGE SPECIFIC PHP PROCESSING------------------------------->
<?php
   //check if submit - if yes, get user data from file with GetUsers function
   if (isset($_POST["loginSubmit"])){    
        //set empty error string
        $strError = "";
        print("Password" . $_POST["password"] . "<br>");
        print("Email: " . $_POST["email"] . "<br>");
        //validate the email and password provided
        if (!$_POST["password"]){
            //append error msg to error string
            $strError .= "There was an error logging into the system. <br>";
        } else if (!$_POST["email"]){
            //append error msg to error string
            $strError .= "There was an error logging into the system. <br>";    
        } else if (!preg_match("/.@+.+\.+./",$_POST["email"])){
                //validate that a proper email was provided
                $strError .= "There was an error logging into the system. <br>";
        }

        print($strError);
        
        // if error string = "" (no errors in login form field)
        if (!$strError){
            $emailCheck = false;
            if (preg_match('/.@travelexperts.com/',$_POST["email"])){
                //if email contains @travelexperts
                print("agent<br>");
                //getAgents from database
                $data = getAgents();
                $usertype = "agent"; 
                if(!$data){
                    //check that database returned at least one object
                    $strError .= "There was an error logging into the system. <br>";
                } else {
                    foreach ($data as $row){
                        if ($row["AgtEmail"]==$_POST["email"]){
                            $emailCheck = true;
                            $dbEmail = $row["AgtEmail"];
                            $dbPassword = $row["AgtPassword"];
                            $dbId = $row["AgentId"];
                            $dbFirstName = $row["AgtFirstName"];
                        }
                    }  
                } 
            } else {   
                print("customer<br>");
                //get customers from database
                $usertype = "customer";
                $data = getCustomers();
                if(!$data){
                    //check that database returned at least one object
                    $strError .= "There was an error logging into the system. <br>";
                } else {
                    foreach ($data as $row){
                        if ($row["CustEmail"]==$_POST["email"]){
                            $emailCheck = true;
                            $dbEmail = $row["CustEmail"];
                            $dbPassword = $row["CustPassword"];
                            $dbId = $row["CustomerId"];
                            $dbFirstName = $row["CustFirstName"];
                        }
                    }
                }  
            }
    
            //check if email was found
            if ($emailCheck == false) {
                $strError = "There was an error logging into the system.";
            } else {
                //validate password
                if ($dbPassword == $_POST["password"]){
                    print("<br>password valid");
                    //if password matches set session variables
                    $_SESSION['loggedIn'] = true;
                    $_SESSION['userType'] = $usertype;
                    $_SESSION['userId'] = $dbId;
                    $_SESSION['firstName'] = $dbFirstName;

                    print( $_SESSION['loggedIn'] . "<br>"); 
                    print($_SESSION['userType'] . "<br>");
                    print($_SESSION['userId'] . "<br>");
                    print($_SESSION['firstName'] . "<br><br><br>");

                    print ($_SESSION['loginReturnUrl']);

                    if (!$_SESSION['loginReturnUrl']){
                        //show logout button
                    } else {
                        $redirectUrl = "http://localhost/GitHub/FabFive/" . $_SESSION['loginReturnUrl'];
                        print($redirectUrl);
                        $_SESSION['loginReturnUrl'] = "";
                        header("Location: $redirectUrl");
                    }

                } else {
                    $strError = "There was an error logging into the system.";
                }
            }
        }
    } else if (isset($_POST["logoutSubmit"])){
        //logout user
        unset($_SESSION['loggedIn']);
        unset($_SESSION['userType']);
        unset($_SESSION['userId']);
        unset($_SESSION['firstName']);
    }         
?>


<!--------------------------HMTL PAGE------------------------------->

<!DOCTYPE html>
<html>

<head>
<title>Travel Experts</title>
<?php include_once('php/head.php'); ?> 

</head>


<body>
    <header>
        <?php include_once('php/Header.php'); ?>
    </header>

    <nav>
    <?php include_once("php/nav.php"); ?>
    </nav>
    <main>
    <!----------------------------------START LOGIN FORM ------------------------------------->
    <?php
    if (!isset($_SESSION['loggedIn']))  {  
        $str = <<<EOF
        <form method="post" action="#" class="reg-form" name="infoForm" id="infoForm">
            <!-- // Username --> 
            <p>
                <label class="formItemDesc" for="email" id="emailLabel">Username:</label>
                <input type="text" class="formInputCtrl" name="email" id="email">
            </p>
            <!--  Password --> 
            <p>
                <label class="formItemDesc" for="password" id="passwordLabel">Password:</label>
                <input type="password" class="formInputCtrl" name="password" id="password">
            </p>                
            <!-- Submit button -->
            <input type="submit" value="login" id="loginSubmit" name="loginSubmit">
            <p class="formError" id="formError" display="none"></p>
        </form>
EOF;
    } else {
        $str =  '<form method="post" action="#" class="reg-form" name="infoForm" id="infoForm">';            
        $str .= "<!-- Submit button -->";
        $str .= '<input type="submit" value="logout" id="logoutSubmit" name="logoutSubmit">';
        $str .= '<p class="formError" id="formError" display="none"></p>';
        $str .= '</form>';
    }
    print($str);
    ?>
    </main>


<?php include_once('php/footer.php');?>

</body>
<script src="script.js"></script>
</html>







