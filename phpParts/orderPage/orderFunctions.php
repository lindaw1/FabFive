<!--****************************************************************
*                                                                  *
*                      GET PACKAGE BY ID                           *
*          Returns a Package Class Object of a given Package ID    *
*                                                                  *
***************************************************************/ -->


<?php function getPackageById($varPackageId) {

// //open database connection
$dbh= ConnectDB_Object();
$sql = "SELECT * FROM packages WHERE PackageId='" . $varPackageId . "'";
$result = $dbh->query($sql);
//looping through result for each package ($pkg)
while ($pkg = $result->fetch_assoc()){
    //Constructing a single $pkg object
    $packageTemp = new Package(
        $pkg["PackageId"],
        $pkg["PkgName"],
        $pkg["PkgStartDate"],
        $pkg["PkgEndDate"],
        $pkg["PkgDesc"],
        $pkg["PkgBasePrice"],
        $pkg["PkgAgencyCommission"]           
        );
}  

return $packageTemp;
CloseDB($dbh);

}
?>