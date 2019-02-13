<?php

include __DIR__.'/../classes/dbh/dbh.inc.php';
include __DIR__.'/../classes/packages/package.inc.php';
include __DIR__.'/../classes/packages/viewPackage.inc.php';

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
$packagesCopiedArray = $vacationPackages->showAllPackages();
// Add sales header Title
echo '<h1 class="dealsTitle">'.count($packagesCopiedArray).' Packages Found: </h1>';
echo '<div class="packagesDisplayWrapper">';
foreach($packagesCopiedArray as $item){
    echo '<div class="packageItem">';
    
    //  Processing Date Format   output under 'YYY-MM-DD' we extract and reformat to DD Month Year
    $dateExtract = explode("-",$item['PkgEndDate']);
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

    echo '</div>';
        
        echo '    <h1 class="pkgTitle">'.$item['PkgName'].'</h1>';
        
        echo '    <p class=" pkgSubDesc" >'.$item['PkgSubDesc'].'</p>';
        
        echo '    <p class=" pkgDesc" >'.$item['PkgDesc'].'</p>';
    echo '</div>';
}
echo '</div>';
?>