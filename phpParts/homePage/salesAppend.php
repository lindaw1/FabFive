<?php

include __DIR__.'/../classes/dbh/dbh.inc.php';
include __DIR__.'/../classes/discountPkgs/discountsPkg.inc.php';
include __DIR__.'/../classes/discountPkgs/viewDiscounts.inc.php';
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

$salePackages = new ViewDiscounts();
$discountsCoppiedArray = $salePackages->showAllDiscounts();
// Instantly destoy our class instance to prevent database leakages
unset($salePackages);

$vacationPackages = new ViewPackages();
$packagesCoppiedArray = $vacationPackages->showAllPackages();
// Instantly destoy our class instance to prevent database leakages
unset($vacationPackages);

/** PROPERTIES WITHIN discountsCoppiedArray
 * idDiscount
 * discountValue
 * disStartDate
 * disEndDate
 * pkgId_fk
 * */ 

date_default_timezone_set("America/Edmonton");
$currentDate = strtotime(date("Y-m-d"));

foreach($discountsCoppiedArray as $sale){
    foreach($packagesCoppiedArray as $pkg ){

        if ($sale['pkgId_fk'] == $pkg['PackageId']){

            $dateSaleStart = strtotime($sale['disStartDate']);
            $dateSaleEnd = strtotime($sale['disEndDate']);
            if ($currentDate>=$dateSaleStart && $currentDate<$dateSaleEnd){
                $oldPrice = round((float)$pkg['PkgBasePrice']);
                $salePrice = round((float)$pkg['PkgBasePrice'] * (float)$sale['discountValue'],2);                

                echo ' <div class="content hotDealBg" style="background-image:url(\'img/packages/'.$pkg['PkgPicUrl'].' \');">
                <div class="priceTag">';

                echo' <p class="cost oldCost" >C$ <span class="oldPrice" style="text-decoration: line-through;">'.$oldPrice.'</span> </>';
                echo' <p class="cost saleCost">C$ <span class="newPrice">' .$salePrice.'</span> </p>';
                echo' <p class="cost perPerson">per person</p>
                        </div>

                        <div class="textBoard">
                        <h1 class="whiteText salePackageTitle">'.$pkg['PkgName'].'</h1>';
                echo'   <p class=" whiteText subDescription">'.$pkg['PkgSubDesc'].'</p>
                        <div class="starsContainer">';
                        $reviewScore = (int)$pkg['PkgReviewScore'];
                        for ($i = 0; $i< $reviewScore ;$i+=1){
                            echo '<div class="star"> <i class="fas fa-star fa-2x" style="color: yellow;"></i> </div>';
                        }
                echo        '</div>
                        <a href="#" class="reviews">View all '.$pkg['numPkgReviews'].' verified reviews</a>';
                $dateExtractEnd = explode("-",$sale['disEndDate']);
                $dateExtractStart = explode("-",$sale['disStartDate']);
                $startDate = round((int)$dateExtractStart[2]).'th '. $dateNum2Word[$dateExtractStart[1]].' '.$dateExtractStart[0];
                $endDate = round((int)$dateExtractEnd[2]).'th '. $dateNum2Word[$dateExtractEnd[1]].' '.$dateExtractEnd[0];
                echo'    <p class="whiteText packageTimeframe"> Sale Period:  
                            From <span class="startDate">'.$startDate.'</span> to <span class="endDate">'.$endDate.'</span> 
                        </p>
                        <p class="whiteText packageDescription">'.$pkg['PkgDesc'].'
                        </p>

                    </div>
                    <div class="addToCart"><i class="fas fa-cart-plus fa-2x" style="margin-left: 5px;margin-top: 3px;"></i></div>
                </div>';

            }
        }
    }
}

?>