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
// Joins the Agent and Agency tables from the database travelagents and 
// creates a new array/table $agtAgencyTableArray.
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

?>

    