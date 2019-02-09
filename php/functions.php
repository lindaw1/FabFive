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
    
        $link = mysqli_connect('localhost', 'admin', 'P@ssw0rd', 'travelexperts');
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

?>

    