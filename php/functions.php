<!-- ***************************************************************
*                                                                  *
*                       FUNCTION ADD OBJECT TO DB                 *
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