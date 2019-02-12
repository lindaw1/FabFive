<?php
    $packagesHolder = array(
        0 => array(
            'packageImgUrl'=>"banffTour.jpg",
            'packageOldPrice'=>"111",
            'packageSalePrice'=>"999",
            'packageTitle'=>"Norway",
            'packageSubDescription'=>"Something Here",
            'packageStartDate'=>"Feb 12 2018",
            'packageEndDate'=>"Feb 12 2018",
            'packageDescription'=>"This is the place to Go to asdjfksdhf ksdjhfksdjhfksdf"
        ),
        1 => array(
            'packageImgUrl'=>"banffTour.jpg",
            'packageOldPrice'=>"111",
            'packageSalePrice'=>"999",
            'packageTitle'=>"Norway",
            'packageSubDescription'=>"Something Here",
            'packageStartDate'=>"Feb 12 2018",
            'packageEndDate'=>"Feb 12 2018",
            'packageDescription'=>"This is the place to Go to asdjfksdhf ksdjhfksdjhfksdf"
        ),   
        2 => array(
            'packageImgUrl'=>"banffTour.jpg",
            'packageOldPrice'=>"111",
            'packageSalePrice'=>"999",
            'packageTitle'=>"Norway",
            'packageSubDescription'=>"Something Here",
            'packageStartDate'=>"Feb 12 2018",
            'packageEndDate'=>"Feb 12 2018",
            'packageDescription'=>"This is the place to Go to asdjfksdhf ksdjhfksdjhfksdf"
        ),
        3 => array(
            'packageImgUrl'=>"banffTour.jpg",
            'packageOldPrice'=>"111",
            'packageSalePrice'=>"999",
            'packageTitle'=>"Norway",
            'packageSubDescription'=>"Something Here",
            'packageStartDate'=>"Feb 12 2018",
            'packageEndDate'=>"Feb 12 2018",
            'packageDescription'=>"This is the place to Go to asdjfksdhf ksdjhfksdjhfksdf"
        ),
        4 => array(
            'packageImgUrl'=>"banffTour.jpg",
            'packageOldPrice'=>"111",
            'packageSalePrice'=>"999",
            'packageTitle'=>"Norway",
            'packageSubDescription'=>"Something Here",
            'packageStartDate'=>"Feb 12 2018",
            'packageEndDate'=>"Feb 12 2018",
            'packageDescription'=>"This is the place to Go to asdjfksdhf ksdjhfksdjhfksdf"
        ),
        5 => array(
            'packageImgUrl'=>"banffTour.jpg",
            'packageOldPrice'=>"111",
            'packageSalePrice'=>"999",
            'packageTitle'=>"Norway",
            'packageSubDescription'=>"Something Here",
            'packageStartDate'=>"Feb 12 2018",
            'packageEndDate'=>"Feb 12 2018",
            'packageDescription'=>"This is the place to Go to asdjfksdhf ksdjhfksdjhfksdf"
        )                     
    );
?>





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

<!DOCTYPE html>
<html>

<head>
<title>Packages</title>
<?php include_once('php/head.php'); ?> 

</head>


<body>
    <header>
        <?php include_once('php/Header.php'); ?>
    </header>

    <nav>
    <?php include_once("php/nav.php"); ?>
    </nav>
    <main>
    <!------------------------------START PRODUCT LIST ------------------------------->
    <?php    
        foreach ($packagesHolder as $key => $value){
            echo ' <div class="content hotDealBg" style="background-image:url(\'img/salePackages/ '.$value['packageImgUrl'].'\');">
            <div class="priceTag">';

            echo' <p class="cost oldCost" >C$ <span class="oldPrice" style="text-decoration: line-through;">'.$value['packageOldPrice'].'</span> </p>';
            echo' <p class="cost saleCost">C$ <span class="newPrice">' . $value['packageSalePrice'].'</span> </p>';
            echo' <p class="cost perPerson">per person</p>
                    </div>

                    <div class="textBoard">
                    <h1 class="whiteText salePackageTitle">'.$value['packageTitle'].'</h1>';
            echo'   <p class=" whiteText subDescription">'.$value['packageSubDescription'].'</p>
                    <div class="starsContainer">
                        <div class="star"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>
                        <div class="star"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>
                        <div class="star"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>
                        <div class="star"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>
                    </div>
                    <a href="#" class="reviews">View all 70 verified reviews</a>';
            echo'    <p class="whiteText packageTimeframe"> Guaranteed Departure:  
                        <span class="startDate">'.$value['packageStartDate'].'</span> to <span class="endDate">'.$value['packageEndDate'].'</spanclass> 
                    </p>
                    <p class="whiteText packageDescription">'.$value['packageDescription'].'
                    </p>

                </div>
                <div class="addToCart"><i class="fas fa-cart-plus fa-2x" style="margin-left: 5px;margin-top: 3px;"></i></div>
            </div>';
        }
        ?>
    </main>

<?php include_once('php/footer.php');?>

</body>
<script src="script.js"></script>
</html>