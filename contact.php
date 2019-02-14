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
$agtAgenciesArray = myGetAgencies();
$agtAgentsArray = myGetAgents();
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

    
    <?php     include __DIR__.'/phpParts/pageParts/navBar.php'; ?>

    <div class: agency>
        <h1>Reach Out.</h1>

        <?php


        echo "<ul>";
        foreach ($agtAgenciesArray as $agency) {
            echo "<h1>".$agency['AgncyCity']."</h1>".$agency['AgncyAddress']."<br>" .$agency['AgncyPhone'] ;
           

            echo "<table>";
            foreach ($agtAgentsArray as $agent) {
                if ($agency['AgencyId'] === $agent['AgencyId']) {
                echo "<tr><td>" . $agent['AgtFirstName'] . " " . $agent['AgtLastName'] . "</td><td>" 
                . $agent['AgtBusPhone'] . "</td><td>" . $agent['AgtEmail']."</td></tr>";
                }
             }
            echo "</table>";
        }
        echo "</ul>";

        ?>
    </div>

<?php include_once('php/footer.php');?>

</body>
<script src="script.js"></script>
</html>