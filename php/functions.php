<!-- ***************************************************************
*                                                                  *
*                       FUNCTION ADD OBJECT TO DB                 *
*                                                                  *
*                                                                  *
***************************************************************/ -->
<?php

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
// ***************************************************
// LINDA'S CODE
function myGetAgencies() {
    $dbh = ConnectDB();
    $sql = "SELECT AgencyId, AgncyAddress, AgncyPhone, AgncyCity, AgncyProv, AgncyPostal, AgncyCountry, AgncyFax FROM agencies";
    if (!$result = $dbh->query($sql)) {
        echo "Error #". $dbh->errno . ": " . $dbh->error . " <br>";
    } else {
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
function myGetAgents() {
    $dbh = ConnectDB();
    $sql = "SELECT AgencyId, AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents ORDER BY AgencyId, AgtLastName, AgtFirstName"; 
    if (!$result = $dbh->query($sql)) {
        echo "Error #". $dbh->errno . ": " . $dbh->error . " <br>";
    } else {
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

// ***************************************************************8
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
        //instantiates the Agengcies
        $agency = new Agency(
            $agen["AgencyId"],
            $agen["AgncyAddress"],
            $agen["AgncyCity"],
            $agen["AgncyProv"],
            $agen["AgncyPostal"],
            $agen["AgncyCountry"],           
            $agen["AgncyPhone"],
            $agen["AgncyFax"]);


        $agencies[] = $agency;
    }

    return $agencies;
}
function JoinTables() {

    $dbh = ConnectDB();
//    $sql = "SELECT  agents.AgencyId, agents.AgtFirstName, agents.AgtLastName, agents.AgtBusPhone, 
//                agents.AgtEmail, agents.AgtPosition"; 
                
                $sql = "SELECT AgencyId, AgtFirstName, AgtLastName, AgtBusPhone, AgtEmail, AgtPosition FROM agents ORDER BY AgencyId, AgtLastName, AgtFirstName"; 
                
                $sql = "SELECT AgencyId, AgncyAddress, AgncyPhone, AgncyCity, AgncyProv, AgncyPostal, AgncyCountry, AgncyFax FROM agencies";
                
                // -- agencies.AgncyAddress, agencies.AgncyPhone, agencies.AgncyCity, 
                // -- agencies.AgncyProv, agencies.AgncyPostal, agencies.AgncyCountry, agencies.AgncyFax 
                // -- FROM agents INNER JOIN agencies 
                // -- ON  = agencies.AgencyId";

    if (!$result = $dbh->query($sql)) {
        echo "ERROR: the SQL failed to execute. <br>";
        echo "SQL: $sql <br>";
        echo "Error #: ". $dbh->errno . "<br>";
        echo "Error msg: " . $dbh->error . " <br>";
    } else {
        $agtAgencyTableArray = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $agtAgencyTableArray[] = $row;
        }
    }

    for ($i=0; $i < sizeof($agtAgencyTableArray); $i++) { 
        $row = $agtAgencyTableArray[$i];
        // print_r($row);
        // echo "<hr>";
    }
    // print_r($agtAgencyTableArray);
    return $agtAgencyTableArray;

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
    print_r($pkg);
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