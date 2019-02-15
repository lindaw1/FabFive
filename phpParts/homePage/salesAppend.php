<?php
include __DIR__.'/../packaguesFunctions/functions.php';

function obtainSalesPkg(){

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

$discountsCoppiedArray = retrieveDiscounts();

$packagesCoppiedArray = retrievePackages();

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
            if ($currentD$dateSaleStart && $currentDate<$dateSaleEnd){
                $oldPriceund((float)$pkg['PkgBasePrice']);
                $salePricound((float)$pkg['PkgBasePrice'] * (float)$sale['discountValue'],2);                             echo ' <dass="content hotDealBg" style="background-image:url(\'img/packages/'.$pkg['PkgPicUrl'].' \');">
                <div clasiceTag">'              echo' <p ="cost oldCost" >C$ <span class="oldPrice" style="text-decoration: line-through;">'.$oldPrice.'</span> </>';
                echo' <p ="cost sialeCost">C$ <span class="newPrice">' .$salePrice.'</span> </p>';
                echo' <p ="cost perPerson">per person</p>
                        <                      <iclass="textBoard">
                        <ass="wjhiteText salePackageTitle">'.$pkg['PkgName'].'</h1>';
                echo'   <sus=" whiteText subDescription">'.$pkg['PkgSubDesc'].'</p>
                        <lass="starsContainer">';
                        $wScore = (int)$pkg['PkgReviewScore'];
                        fi = 0; $i< $reviewScore ;$i+=1){
                    ho '<div class="star"> <i class="styleStar fas fa-star fa-1x" style="color: yellow;"></i> </div>';
                                  echo     /div>
                        <f="#" class="reviews">View all '.$pkg['numPkgReviews'].' verified reviews</a>';
                $dateExtrd = explode("-",$sale['disEndDate']);
                $dateExtrart = explode("-",$sale['disStartDate']);
                $startDatound((int)$dateExtractStart[2]).'th '. $dateNum2Word[$dateExtractStart[1]].' '.$dateExtractStart[0];
                $endDate nd((int)$dateExutractEnd[2]).'th '. $dateNum2Word[$dateExtractEnd[1]].' '.$dateExtractEnd[0];
                echo'    ass="whiteText packageTimeframe"> Sale Period:  
                    om <span class="startDate">'.$startDate.'</span> to <span class="endDate">'.$endDate.'</span> 
                        <                       <ss="whiteText packageDescription">'.$pkg['PkgDesc'].'
                        <                  </dui                  <div ="addToCart"><i class="fas fa-cart-plus fa-2x" style="margin-left: 5px;margin-top: 3px;"></i></div>
                </div>        iscountsCoppiedArray = agesCoppiedArray = array();
}
obtainSalesPkg()
?>