<?php

//*********************************************************************
// Authors:  Stuart Peters, Hoang (Eric) Truong, Linda Wallace
// Date:    February 15, 2019
// Purpose:  
//
// Requirements:
// 
//*********************************************************************** */




// ******************************************************************************

    function ConnectDB(){
    
        $link = mysqli_connect('127.0.0.1', 'admin', 'P@ssw0rd', 'travelexperts');
        if (!$link){
            print("There was an error connecting:". mysqli_errno($link) . " -- " . mysqli_error($link));
            exit;
        }
        return $link;
    }

// ******************************************************************************
    function CloseDB($link) {
        mysqli_close($link);
    }
// ******************************************************************************
    function AgentCreate ($agent_data){
        $dbh = ConnectDB();

        $sql = "INSERT INTO agents (
            AgtFirstName,
            AgtMiddleInitial,
            AgtLastName,
            AgtBusPhone,
            AgtEmail,
            AgtPosition,
            AgencyId) 
            VALUES (?,?,?,?,?,?,?)";

        $stmt = mysqli_prepare($dbh, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssssi',
            $agent_data["AgtFirstName"],
            $agent_data["AgtMiddleInitial"],
            $agent_data["AgtLastName"],
            $agent_data["AgtBusPhone"],
            $agent_data["AgtEmail"],
            $agent_data["AgtPosition"],
            $agent_data["AgtAgencyId"]);
        $result = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        
        CloseDB($dbh);
        return $result;
    }
// ******************************************************************************
    function GetUsers() {
        $user_array = file("php/userNameUpload.txt");
        $assocArray = array();
        foreach ($user_array as $lineEntry) {
            $data = explode(",", $lineEntry);
            $assocArray[trim($data[0])] = trim($data[1]);
        }
        return $assocArray;
    }
// ******************************************************************************


function GetAgencies() {
    include_once("classes.php");

    $dbh = ConnectDB();

    $sql = "SELECT * FROM agencies";

    if (!$result = $dbh->query($sql)) {
        echo "ERROR: the SQL failed to execute. <br>";
        echo "SQL: $sql <br>";
        echo "Error #: ". $dbh->errno . "<br>";
        echo "Error msg: " . $dbh->error . " <br>";
    }

    if ($result === 0) {
        echo "There were no results<br>";
    }
    $agencies = array();
    while ($agen = $result->fetch_assoc()){
        $agency = new Agency(
            $agen["AgencyId"],
            $agen["AgncyAddress"],
            $agen["AgncyCity"],
            $agen["AgncyProv"],
            $agen["AgncyPostal"],
            $agen["AgncyCountry"],           
            $agen["AgncyFax"],
            $agen["AgncyPhone"]);


        $agencies[] = $agency;
    }

    return $agencies;
}

// ******************************************************************************


function getPackages() {

    //open database connection
    $dbh= ConnectDB();
   
    $sql = "SELECT * FROM packages";

    $result = mysqli_query($dbh, $sql);

    // initializing array for all packages
    $packages = array();
    // looping through result for each package($pkg)
    while ($pkg = $result->fetch_assoc()){
        // Constructing a singe $pkg object

        $package = new Package(
            $pkg["PackageId"],
            $pkg["PkgName"],
            $pkg["PkgStartDate"],
            $pkg["PkgEndDate"],
            $pkg["PkgDesc"],
            $pkg["PkgBasePrice"],
            $pkg["PkgAgencyCommission"]           
            );        
        // adding the pakcage object to array of packages
        $packages[] = $package;
    } // end of While 
    return $packages;
}
?>

<!--****************************************************************
*                                                                  *
*                      GET PACKAGES                                *
*                                                                  *
*                                                                  *
***************************************************************/ -->

<?php function GetPackages_temp($filterStartDate) {

    //open database connection
    $dbh = ConnectDB();

    //If $filterStartDate not specified, then use today's date as default sql filter
    if ($filterStartDate=""){
        //get the current date in YYYY-MM-DD format
        $dt = date("Y-m-d H:i:s",mktime()); 
    } else {
        //check that $filterStartDate is a date
        print("not null");
        //if valid date, format date for $sql string
        $dt = date("Y-m-d",mktime());
    }

    $sql = "SELECT * FROM packages WHERE PkgStartDate >= '" . $dt ."'";

    if (!$result = mysqli_query($dbh, $sql)){
        print("There was an error retreiving the recors from the database.");
        $packages = "";
    } else {
        // initializing array for all packages
        $packages = array();
        // looping through result for each package($pkg)
        while ($pkg = $result->fetch_assoc()){
            // Constructing a singe $pkg object
            $package = new Package(
                $pkg["PackageId"],
                $pkg["PkgName"],
                $pkg["PkgStartDate"],
                $pkg["PkgEndDate"],
                $pkg["PkgDesc"],
                $pkg["PkgBasePrice"],
                $pkg["PkgAgencyCommission"]           
                );        
            // adding the pakcage object to array of packages
            $packages[] = $package;
        } // end of While
        return $packages;
    }
}
?>


<!--****************************************************************
*                                                                  *
*                      GET CUSTOMERS DATA                          *
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

    switch ($case){
        case 'public':
            //break statement without action - allows page to load
            break;
        case "agent":
            if (!$_SESSION["userType"] || ($_SESSION["userType"] !='agent')){
                //user is not logged in - redirect user to login page and set source
                $_SESSION['loginReturnUrl'] = $strPageName;
                header("Location: http://localhost/GitHub/FabFive/login.php");
            }
            break;
        case 'customer':
            if (!$_SESSION["userType"] || ($_SESSION["userType"] !='customer')){
                //user is not logged in - redirect user to login page and set source
                $_SESSION['loginReturnUrl'] = $strPageName;
                header("Location: http://localhost/GitHub/FabFive/login.php");
            }
            break;
    }
}

?>

<!-- ***************************************************************
*                                                                  *
*                       FUNCTION CADD OBJECT TO DB                 *
*                                                                  *
*                                                                  *
***************************************************************/ -->
<?php
	function addObjToDb($table, $object){
			
	//*********** CREATE DATABASE CONNECTION OBJECT ******************************
		$dbh = fnDbConnOpen();
		// print_r($dbh);

	//**************************CREATE PREPARED STATEMENT ********************************/

		//use $data to create sql string ($sql) 
		$message = "";
		
		
		$data = $object->getPropertyArray();
		array_shift($data);  //remove primary key

		//create string to store key data from associative array $data
		$keys = array_keys($data);
		$keystring = implode(",", $keys);
		
		// //create string of question marks for each item in associative array
		// i.e. "?,?,?,?,?," for five items in $data
		$questionmarks = "";
		for ($i=0; $i<count($keys); $i++) {
			$questionmarks .= "?,";
		}
		$questionmarks = rtrim($questionmarks, ","); // removes the trailing comma
		
		//create sql string using the target table name $table, $keystring and values
		$sql = "INSERT INTO $table($keystring)"	. "VALUES ($questionmarks)";


		// //**********************CREATE AND BIND PARAMETERS TO STATEMENT OBJECT**************** */

		//create a statement class object called $stmt by using the mysqli_prepare function
		$stmt = mysqli_prepare($dbh, $sql);
		
		// //get info from the mySQL table to build type string for bind param function  ******************
		// $typestring = buildtypestring($dbh);
		// print("<p>typestring: " . $typestring . "<br />");
		
		$arTblInfo= mysqli_query($dbh, "DESCRIBE $table");
		$arTblCol = array();

		//create an associative array for all table columns EXCEPT autonumber columns
		while ($tblCol = mysqli_fetch_assoc($arTblInfo)){
			if ($tblCol["Extra"] != "auto_increment") {
				$arTblColType[$tblCol["Field"]] = getTypeString($tblCol);
			}
		}

		//create a typestring for all fields in the class object, EXCLUDING autonumber
		//enumerate through $data keys, and find matching value in $arTblColType
		$strType = "";
		for ($i=0; $i<count($keys); $i++) {
			$strTemp = $keys[$i];
			$strType .= $arTblColType[$strTemp];
		}

		//create an arguments array, set the first item in the array to the $typestring
		$args = array($strType);

		// //**************BIND THE DATA (REFERENCE) TO THE STATEMENT******************************/
		
		//use "reset" function ensures that pointer to $keys array is at first position
		reset($keys);  

		// pass the reference to just the data in the $data array to the $args array 
		// this this passes the reference rather than the data itself.
		
		$i = 0;
		foreach ($keys as $key){
			$args[] = &$data[$key];   //NTD -- find out what this does 
			$i++;
		}
		// the result is array("typestring","data1", "data2", etc.....)

		//call the "bind_param method" for the 
		call_user_func_array(array($stmt,"bind_param"), $args);


		//******************************EXECUTE PREPARED STATEMENT******************* */
		// execute the prepared statement to insert the data into the database table
		if ($result = mysqli_stmt_execute($stmt)) {
			$message = "Inserted 1 row\n";
		} else {
			$message = "Insert failed, contact tech support\n";
		}
		
		//********************************CLOSE DB CONNECTION *****************
		mysqli_close($dbh);
		return $message;
	}
?>

<!-- ***************************************************************
*                                                                  *
*                       FUNCTION RETURN TYPE STRING                *
*                                                                  *
*                                                                  *
***************************************************************/ -->

<?php
	function getTypeString($tempColumn){
	
		// print($tempColumn["Type"]);
		$arTemp = explode("(", $tempColumn["Type"]);	
		switch ($arTemp[0]) {
			case "tinyint";
			case "smallint";
			case "mediumint";
			case "bigint";
			case "int":
				$typestring = "i";
				break;
			case "decimal";
			case "double";
			case "real";
			case "float":
				$typestring = "d";
				break;
			case "tinytext";
			case "mediumtext";
			case "longtext";
			case "date";
			case "time";
			case "timestamp";
			case "datetime";
			case "year";
			case "varchar":
				$typestring = "s";
				break;
			default:
				$typestring = "b";
		}
	return $typestring;
	}
?>



    