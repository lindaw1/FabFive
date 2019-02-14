<?php

include __DIR__.'/../classes/dbh/dbh.inc.php';
include __DIR__.'/../classes/packages/package.inc.php';
include __DIR__.'/../classes/packages/viewPackage.inc.php';

function packagesAppend(){
$dateNum2Word = array(
    '01'=>'Jan',
    '02'=>'Feb',
    '03'=>'Mar',
    '04'=>'Apr',
    '05'=>'May',
    '06'=>'Jun',
    '07'=>'Jul',
    '08'=>'Aug',
    '09'=>'Sep',
    '10'=>'Oct',
    '11'=>'Nov',
    '12'=>'Dec',
);

$vacationPackages = new ViewPackages();
$packagesCoppiedArray = $vacationPackages->showAllPackages();
// Instantly destoy our class instance to prevent database leakages
unset($vacationPackages);

// Today Date, For processing Start Date
date_default_timezone_set("America/Edmonton");
$todayDate = strtotime(date("Y-m-d"));

// Add sales header Title
echo '<h1 class="dealsTitle">'.count($packagesCoppiedArray).' Packages Found: </h1>';
echo '<div class="packagesDisplayWrapper">';
foreach($packagesCoppiedArray as $item){
    $datePkgStart = strtotime($item['PkgStartDate']);
    $datePkgEnd = strtotime($item['PkgEndDate']);
    if ($todayDate>=$datePkgStart && $todayDate<$datePkgEnd){
        
        echo '<div class="packageItem">';
        $dateExtract = explode("-",$item['PkgEndDate']);
        //  Processing Date Format   output under 'YYY-MM-DD' we extract and reformat to DD Month Year
        $endDate = round((int)$dateExtract[2]).'th '. $dateNum2Word[$dateExtract[1]].' '.$dateExtract[0];
        $price = round((float)$item['PkgBasePrice'],2);
        echo'<div class="packageImage" style= "background-image: url(\'img/packages/'.$item['PkgPicUrl'].'\');">
                <div class="packageTag">
                    <p class="costTag ">C$ <span class="pkgCost">'. $price .'</span> </p> 
                    <p class="tagPer ">per person</p>
                </div>';
        echo '  <p class="pkgEndDate"> Available Until: <span style="padding-left: 2%; text-shadow: 0px 0px 1px black;;color: crimson; font-weight: 700;">'.$endDate.'</span></p>';
            
            $reviewScore = (int)$item['PkgReviewScore'];
            echo '<div class="pkgStarsContainer">';
                for ($i = 0; $i< $reviewScore ;$i+=1){
                    echo '<div class="pkgStar"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>';
                }
            echo '</div>';
        
        echo '<a href="#" alt="Package Review Link" class="allReview">View all '.$item['numPkgReviews'].' reviews </a>';
        
        echo '</div>';
            
        echo '    <h1 class="pkgTitle">'.$item['PkgName'].'</h1>';
            
        echo '    <p class=" pkgSubDesc" >'.$item['PkgSubDesc'].'</p>';
            
        echo '    <p class=" pkgDesc" >'.$item['PkgDesc'].'</p>';
        echo '    <button class="add2CartBttn" value=" '.$item['PackageId'].'" onClick="letValue(event)"> Add To Cart </button>';
        echo '</div>';
    }
}
echo '</div>';
$packagesCoppiedArray = array();
}
packagesAppend();

?>