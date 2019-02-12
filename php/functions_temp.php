<!--****************************************************************
*                                                                  *
*                      GET PACKAGES                                *
*                                                                  *
*                                                                  *
***************************************************************/ -->

<?php function getPackages_temp($filterStartDate) {

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