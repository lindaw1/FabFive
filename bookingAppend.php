<?php
//***************************************************************************
// Authors: Stuart Peters, Hoang (Eric) Truong, Linda Wallace
// Date:    February 15, 2019
// Purpose: 
//
//
// Requirements:    
//************************************************************************* */

include_once('php/top.php'); 
?>

<!------------------------------------PAGE SPECIFIC PHP PROCESSES-------------------->

<?php
//Get PackageId from Session Variable
$PackageId = 1;
$orderPackage = getPackageById($PackageId);
print("<br>");
print($orderPackage->getPackageId());
print($orderPackage->getPkgName());

//Get Package from DB and create package object based on Id
//Get Customer Info and create customer object



?>



<!DOCTYPE html>
<html>

<head>
<title>New Booking</title>
<?php include_once('php/head.php'); ?> 

</head>


<body>
    <header>
        <?php include_once('php/Header.php'); ?>
    </header>

    <nav>
    <?php include_once("php/nav.php"); ?>
    </nav>



<?php include_once('php/footer.php');?>

</body>
<script src="script.js"></script>
</html>