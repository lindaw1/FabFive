<?php
    
    $arrayPackageObjs = GetPackages();  //return an array of Package class objects
    // echo"<pre style='color: white;'>" .print_r($arrayPackageObjs)."</pre>";
    // foreach($arrayPackageObjs as $row){
    //     echo ($row->PackageId . "<br>");
    //     echo($row->PkgName . "<br>");
    //     echo($row->PkgDesc . "<br>");
    //     echo($row->PkgStartDate . "<br>");
    //     echo($row->PkgEndDate . "<br>");
    //     echo($row->PkgBasePrice . "<br>");   
    // }
    // echo"<script>" .print_r($arrayPackageObjs)."</script>";
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

    foreach($arrayPackageObjs as $row){
        echo ' <div class="content hotDealBg" style="background-image:url(\'img/salePackages/banffTour.jpg\');">
        <div class="priceTag">';

        echo' <p class="cost oldCost" >C$ <span class="oldPrice" style="text-decoration: line-through;">'.$row->PkgName.'</span> </>';
        echo' <p class="cost saleCost">C$ <span class="newPrice">' . $row->PkgName .'</span> </p>';
        echo' <p class="cost perPerson">per person</p>
                </div>

                <div class="textBoard">
                <h1 class="whiteText salePackageTitle">'.$row->PkgName.'</h1>';
        echo'   <p class=" whiteText subDescription">'.$row->PkgName.'</p>
                <div class="starsContainer">
                    <div class="star"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>
                    <div class="star"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>
                    <div class="star"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>
                    <div class="star"> <i class="fas fa-star fa-1x" style="color: yellow;"></i> </div>
                </div>
                <a href="#" class="reviews">View all 70 verified reviews</a>';
        echo'    <p class="whiteText packageTimeframe"> Guaranteed Departure:  
                    <span class="startDate">'.$row->PkgName.'</span> to <span class="endDate">'.$row->PkgName.'</spanclass> 
                </p>
                <p class="whiteText packageDescription">'.$row->PkgName.'
                </p>

            </div>
            <div class="addToCart"><i class="fas fa-cart-plus fa-2x" style="margin-left: 5px;margin-top: 3px;"></i></div>
        </div>';
    }
    

?>