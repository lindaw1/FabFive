<?php
//***************************************************************************
// Authors: Stuart Peters, Hoang (Eric) Truong, Linda Wallace
// Date:    February 15, 2019
// Purpose: Webpage lists the Locations and agents for Travel Experts
//
//
// Requirements:    
//************************************************************************* */

include_once('php/top.php'); 
$agencies = GetAgencies();
?>

<!DOCTYPE html>
<html>

<head>
<title>Agency List</title>
<?php include_once('php/head.php'); ?> 

</head>


<body>
    <header>
        <?php include_once('php/Header.php'); ?>
    </header>

    <nav>
    <?php include_once("php/nav.php"); ?>
    </nav>
    <section>
        <table >
        <?php
            foreach ($agencies as $agen) {
            print("<tr>");

            print("<td>". $agen->getId() ."</td>");
            print("<td>". $agen->getAddress() ."</td>");
            print("<td>". $agen->getCity() ."</td>");
            print("<td>". $agen->getProv() ."</td>");
            print("<td>". $agen->getPostal() ."</td>");
            print("<td>". $agen->getCountry() ."</td>");
            print("<td>". $agen->getPhone() ."</td>");
            print("<td>". $agen->getFax() ."</td>");
            print("</tr>");
            }

        ?>
        </table>
    </section>


<?php include_once('php/footer.php');?>

</body>
<script src="script.js"></script>
</html>