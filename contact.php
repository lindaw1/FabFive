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
<link rel="stylesheet" href="style/style.css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    
    <?php     include __DIR__.'/phpParts/pageParts/navBar.php'; ?>

    <div class="mainContact" style="color: white;">

        <h1 class="contactTitle">Reach Out.</h1>

        <!-- <div class="agencyPic" style='background-image: url("img/contact/agencies/calgary.jpg");'>
            <div class="whiteBox"></div>
            <div class="calgaryPic"></div>
        </div> -->
        <?php


        foreach ($agtAgenciesArray as $agency) {
            
            echo '<div class="AgencyContent">';
            echo '<div class="positionPic" \'>
                <div class="whiteBox"></div>
                <div class="agencyPic" style="background-image: url(\'img/contact/agencies/'.$agency['AgncyCity'].'.jpg\');"></div>
                <h1 class=\'cityTitle\'>'.$agency['AgncyCity'].'</h1>
                </div>';

            echo "<div class='address' >".$agency['AgncyAddress']."<br>" .$agency['AgncyPhone']."</div>" ;
           
            echo"<h1 class=\"ourAgents\"> Our Agents: </h1>";

            echo "<table class=\"agentsTable\">";
            foreach ($agtAgentsArray as $agent) {
                if ($agency['AgencyId'] === $agent['AgencyId']) {
                echo "<tr class=\"rowAgent\"><td>" . $agent['AgtFirstName'] . " " . $agent['AgtLastName'] . "</td><td>" 
                . $agent['AgtBusPhone'] . "</td><td>" . $agent['AgtEmail']."</td></tr>";
                }
             }
            echo "</table>";
            echo'</h1>';
            echo'</div>';
        }

        ?>
    </div>

<?php
    // Add page footer
include __DIR__.'/phpParts/pageParts/pageFooter.php';

    include_once __DIR__.'/phpParts/htmlSections/foot.php';
?>