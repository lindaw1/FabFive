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



    