<!--****************************************************************
*                                                                  *
*                      CHECK CREDENTIALS                           *
*                                                                  *
*                                                                  *
***************************************************************/ -->
<?php function checkCredentials($strPageName){

//this function uses the $arrayPagePermissions variable found in php/variables.php
//and the $SESSION properties to check the permissions of the user and determine if
//the page should be displayed, or if the user should be redirected to login

    if (!isset($_SESSION["userType"])){
        $_SESSION["userType"] = "";
    }
    
    $url = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
    $path_parts = pathinfo($url);
    // echo $path_parts['basename'];
    $urlRedirectToLogin = $path_parts['dirname'] . "/login.php";

    $arrayPermissions = getPagePermissions();

    if (!$arrayPermissions[$strPageName]){
        $case = 'public'; //default to public view if page is not listed in permssions array
    } else {
        $case = $arrayPermissions[$strPageName];
    }
    $strRedirectTemp = "";
    $url = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']; 
    $path_parts = pathinfo($url);
    $urlRedirectToLogin = "http://" . $path_parts['dirname'] . "/login.php";
    $loginRedirect = "Location: $urlRedirectToLogin";
    switch ($case){
        case 'public':
            //break statement without action - allows page to load
            break;
        case "agent":
            if ($_SESSION["userType"] !='agent'){
                //user is not logged in - redirect user to login page and set source
                $_SESSION['loginReturnUrl'] = $strPageName;
                $strRedirectTemp = $loginRedirect;
            } 
            break;
        case 'customer':
            if ($_SESSION["userType"] !='customer'){
                //user is not logged in - redirect user to login page and set source
                $_SESSION['loginReturnUrl'] = $strPageName;
                $strRedirectTemp = $loginRedirect;  
            }
            break;
    }
    return $strRedirectTemp;
}
?>
                

<!--****************************************************************
*                                                                  *
*                      GET CUSTOMERS DATA                          *
*                                                                  *
*                                                                  *
*                                                                  *
***************************************************************/ -->

<?php function GetCustomers() {
    //open db connection
    $dbh = ConnectDB();

    //build SQL and query DB
    $result = $dbh->query("SELECT * FROM customers");

    //check if query successful
    if (!$result) {
        //display error message
        print("There was an error retreiving the recors from the database.");
    }

    //return result
    return $result;
    
    //close db connection
    CloseDB();
}   
?>

<!--****************************************************************
*                                                                  *
*                      GET Agents DATA                             *
*                                                                  *
*                                                                  *
***************************************************************/ -->


<?php function GetAgents() {
    //open db connection
    $dbh = ConnectDB();

    //build SQL and query DB
    $result = $dbh->query("SELECT * FROM agents");

    //check if query successful
    if (!$result) {
        //display error message
        print("There was an error retreiving the recors from the database.");
    }

    //return result
    return $result;
    
    //close db connection
    CloseDB();
}
?>

