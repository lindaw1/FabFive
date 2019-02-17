<?php 
// print("functionsNew.php<br>");
?>




<!--******************************************************************************   
*
*
*                                   ConnectDB_Object
*               (database connection using object oriented notation required 
*                to support)
*
*
********************************************************************************-->

<?php function ConnectDB_Object(){

    $link = new mysqli("localhost", "admin", "P@ssw0rd", "travelexperts");

    // /* check connection */
    if ($link->connect_errno) {
        printf("Connect failed: %s\n", $link->connect_error);
        exit();
    } 
    return $link;
}
?>

<!-- **************************************************************************
*                                                                  
*                       addObjectToDbAsNewRecord           
*                 
*             Function that updates the database table arguement provided with 
*             information property values of the object.  
*                            
*             Note: This function is generic and works provided the property names
*                   of the object have the SAME names as the table columns 
*                   DB columns for this function to work.
*             Note: Auto-number fields a not sent to the database as these values are
*                   automatically generated 
*             Note: This function calls the getTypeString() function to
*                   obtain the datatype of each field (i.e. i, s  etc) for
*                   for the data binding to the prepared statement
*             
*                                                                  
******************************************************************************/ -->
<?php

	// STILL REQUIRE TO be included
	function getPagePermissions() {
	
		$arrayPagePermissions = array(
		"agencyAppend.php"=>"agent",
		"agencyList.php"=>"public",
		"agentAppend.php"=>"agent",
		"agentList.php"=>"public",
		"customerAppend.php"=>"customer",
		"customerList.php"=>"agent",
		"index.php"=>"public",
		"indexNew.php"=>"public",
		"deals.php"=>"public",
		"login.php"=>"public",
		"productAppend.php"=>"agent",
		"productList.php"=>"public",
		"order"=>"customer",
		"bookingAppend.php"=>"public",
		"bookingDetails.php"=>"public",
		"bookingView"=>"public");
		
		return $arrayPagePermissions;
		
	}

	function addObjectToDbAsNewRecord($table, $object){
			
	//*********** CREATE DATABASE CONNECTION OBJECT ******************************
		$dbh = ConnectDB_Object();

	//**************************CREATE PREPARED STATEMENT ********************************/
		print("db connect");
		//use $data to create sql string ($sql) 
		$message = "";
		
		
		$data = $object->getPropertyArray();
		//************************* */
		//find auto number fields and remove them from the properties to update
		array_shift($data);  //remove primary key
		//****************************************8 */


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


		//**********************CREATE AND BIND PARAMETERS TO STATEMENT OBJECT**************** */

		//create a statement class object called $stmt by using the mysqli_prepare function
		$stmt = $dbh->prepare($sql);
		
		$arTblInfo= $dbh->query("DESCRIBE $table");
		print("arTblInfo: <br>");
		print_r($arTblInfo);
		print("<br>");
		$arTblCol = array();

		//create an associative array for all table columns EXCEPT autonumber columns
		while ($tblCol = $arTblInfo->fetch_assoc()){
			if ($tblCol["Extra"] != "auto_increment") {

				//*****************************************************88 */
				//use the object keys array to lookup the field in the DB table
				//confirm the field exists
				$arTblColType[$tblCol["Field"]] = getTypeString($tblCol);
			}
		}
		print("<br>arTblColType: <br>");
		print_r($arTblColType);
		print("<br>");
		//create a typestring for all fields in the class object, EXCLUDING autonumber
		//enumerate through $data keys, and find matching value in $arTblColType
		$strType = "";
		for ($i=0; $i<count($keys); $i++) {
			$strTemp = $keys[$i];
			$strType .= $arTblColType[$strTemp];
		}
		print("<br>$strType");
		print("<br>");
		// //create an arguments array, set the first item in the array to the $typestring
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
		print_r($args);
		print("<br>");
		//call the "bind_param method" for the 
		call_user_func_array(array($stmt,"bind_param"), $args);


		//******************************EXECUTE PREPARED STATEMENT******************* */
		// execute the prepared statement to insert the data into the database table
		if ($result = $stmt->execute()) {
			$message = "Inserted 1 row\n";
		} else {
			$message = "Insert failed, contact tech support\n";
		}
		print("<br>$message");
		print("<br>");
		// //********************************CLOSE DB CONNECTION *****************
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

<?php function getTypeString($tempColumn){
	
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