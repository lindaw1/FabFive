<?php 

//getCustomerId from $_SESSION
$custId = 1;

//instantiate the objects and populate 
//with data from package description

//get Package Id from session variable
$pkgId = 1;
// create package object for selected package and populate properties from database
$pkgObject  = getPackageById($pkgId);


//create booking object and populate with PackageProperties
$orderBooking = new BookingOrder (
            NULL,          //$BookingId;
            date("Y-m-d h:i:s"), //$BookingDate;
            "XXX-435",     //$BookingNo; ***This is a placeholder value
            NULL,          //$TravelerCount;  ***This comes from form
            $custId,       //$CustomerId;
            NULL,          //$TripTypeId;
            $pkgId         //$PackageId;
        );

        
//create BookingDetail object and populate with PackageProperties
$orderBookingDetail = new BookingDetail (
        NULL,                                    //     $BookingDetailId;
        "AAA",                                //     $ItineraryNo;
        $pkgObject->getPkgStartDate(),         //     $TripStart;
        $pkgObject->getPkgEndDate(),           //     $TripEnd;
        $pkgObject->getPkgDesc(),                //     $Description;
        $pkgObject->getPkgName(),                //     $Destination;
        $pkgObject->getPkgBasePrice(),           //     $BasePrice;
        $pkgObject->getPkgAgencyCommission(),    //     $AgencyCommission;
        NULL,                                    //     $BookingId;
        NULL,                                    //     $RegionIdIndex;
        NULL,                                    //     $ClassIdIndex;
        NULL,                                    //     $FeeIdIndex;
        NULL                                     //     $ProductSupplier;
);

if (isset($_POST["submit"])){
    //validate form information, assign form values to objects and 
    //add new booking record, booking detail record and credit card record to DB

    //get form properties for Booking
    $trvlCount = floatval(2);
    $tripType = "B";
    $orderBooking->setTravelerCount($trvlCount);
    $orderBooking->setTripTypeId($tripType);


    //create credit card object and popluate properties with data from form
    print("<br>New Credit Card<br>");
    $creditCard = new CreditCard (
        NULL,
        "AMEX",
        "4444-4444-4444-4444",
        "2010-01-01",
        $custId
    );

    //add new booking to database
    $result = addObjectToDbAsNewRecord("bookings", $orderBooking);
    print_r($result);

    //get newly created booking id from database
        //$sql = "SELECT...FROM...
     
    //assign Booking Id to BookingDetail object

    //add new booking detail item to database
// `   $result = addObjectToDbAsNewRecord("bookingDetails", $orderBookingDetail);
    //add new credit card to database
    // $result = addObjectToDbAsNewRecord("creditCards", $creditCard);

    //redirect user to order summary page

}
?>