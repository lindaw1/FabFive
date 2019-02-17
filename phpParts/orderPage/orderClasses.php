
<?php

//*********************************************************************************
//*                                                                               *
//*                                                                               *
//*                           STUART'S CLASSES                                    *
//*                                                                               *
//*                                                                               *
//*******************************************************************************-->

class Package {
    //set properties
    protected $PackageId;
    protected $PkgName;
    protected $PkgStartDate;
    protected $PkgEndDate;
    protected $PkgDesc;
    protected $PkgBasePrice;
    protected $PkgAgencyCommission;


    //
    public function __construct($tempPackageId, $tempPkgName, $tempPkgStartDate, $tempPkgEndDate, $tempPkgDesc, $tempPkgBasePrice, $tempPkgAgencyCommission) {
        
        $this->PackageId = $tempPackageId;
        $this->PkgName = $tempPkgName;
        $this->PkgStartDate = $tempPkgStartDate;
        $this->PkgEndDate = $tempPkgEndDate;
        $this->PkgDesc = $tempPkgDesc;
        $this->PkgBasePrice = $tempPkgBasePrice;
        $this->PkgAgencyCommission = $tempPkgAgencyCommission;
        }


    public function getPackageId(){
        return $this->PackageId;
    }

    public function setPackageId($tempPackageId){
        $this->PackageId = $tempPackageId;   
    }

    public function getPkgName(){
        return $this->PkgName;
    }

    public function setPkgName($tempPkgName){
        $this->PkgName = $tempPkgName;   
    }

    public function getPkgStartDate(){
        return $this->PkgStartDate;
    }

    public function setPkgStartDate($tempPkgStartDate){
        $this->MiddleInitial = $tempPkgStartDate;   
    }

    public function getPkgEndDate(){
        return $this->PkgEndDate;
    }

    public function setPkgEndDate($tempPkgEndDate){
        $this->PkgEndDate = $tempPkgEndDate;   
    }

    public function getPkgDesc(){
        return $this->PkgDesc;
    }

    public function setPkgDesc($tempPkgDesc){
        $this->PkgDesc = $tempPkgDesc;   
    }

    public function getPkgBasePrice(){
        return $this->PkgBasePrice;
    }

    public function setPkgBasePrice($tempPkgBasePrice){
        $this->PkgBasePrice = $tempPkgBasePrice;   
    }

    public function getPkgAgencyCommission(){
        return $this->PkgAgencyCommission;
    }

    public function setPkgAgencyCommission($tempPkgAgencyCommission){
        $this->PkgAgencyCommission = $tempPkgAgencyCommission;   
    }

    public function getPropertyArray() {
        $tempArray = array();
        foreach ($this as $key => $value) {
            $tempArray[$key] = $value;
        }
        return $tempArray;
     }
}


//--------------------------------------------------------------------
//
//                      Booking/Order Class
//
//--------------------------------------------------------------------


class BookingOrder {
    //set properties
    protected $BookingId;
    protected $BookingDate;
    protected $BookingNo;
    protected $TravelerCount;
    protected $CustomerId;
    protected $TripTypeId;
    protected $PackageId;


    //
    public function __construct($tempBookingId, $tempBookingDate, $tempBookingNo, $tempTravelerCount, 
                                $tempCustomerId, $tempTripTypeId, $tempPackageId) {
        
        $this->BookingId = $tempBookingId;
        $this->BookingDate = $tempBookingDate;
        $this->BookingNo = $tempBookingNo;
        $this->TravelerCount = $tempTravelerCount;
        $this->CustomerId = $tempCustomerId;
        $this->TripTypeId = $tempTripTypeId;
        $this->PackageId = $tempPackageId;
    }


    public function getBookingId(){
        return $this->BookingId;
    }

    public function setBookingId($tempBookingId){
        $this->BookingId = $tempBookingId;   
    }

    public function getBookingDate(){
        return $this->BookingDate;
    }

    public function setBookingDate($tempBookingDate){
        $this->BookingDate = $tempBookingDate;   
    }

    public function getBookingNo(){
        return $this->BookingNo;
    }

    public function setBookingNo($tempBookingNo){
        $this->BookingNo = $tempBookingNo;   
    }

    public function getTravelerCount(){
        return $this->TravelerCount;
    }

    public function setTravelerCount($tempTravelerCount){
        $this->TravelerCount = $tempTravelerCount;   
    }

    public function getCustomerId(){
        return $this->CustomerId;
    }

    public function setCustomerId($tempCustomerId){
        $this->CustomerId = $tempCustomerId;   
    }

    public function getTripTypeId(){
        return $this->TripTypeId;
    }

    public function setTripTypeId($tempTripTypeId){
        $this->TripTypeId = $tempTripTypeId;   
    }

    public function getPackageId(){
        return $this->PackageId;
    }

    public function setPackageId($tempPackageId){
        $this->PackageId = $tempPackageId;   
    }

    public function getPropertyArray() {
        $tempArray = array();
        foreach ($this as $key => $value) {
            $tempArray[$key] = $value;
        }
        return $tempArray;
     }
}


//--------------------------------------------------------------------
//
//                      Booking Detail Class
//
//--------------------------------------------------------------------





class BookingDetail {
    //set properties
    protected $BookingDetailId;
    protected $ItineraryNo;
    protected $TripStart;
    protected $TripEnd;
    protected $Description;
    protected $Destination;
    protected $BasePrice;
    protected $AgencyCommission;
    protected $BookingId;
    protected $RegionIdIndex;
    protected $ClassIdIndex;
    protected $FeeIdIndex;
    protected $ProductSupplier;

    public function __construct($tempBookingDetailId,$tempItineraryNo,$tempTripStart,$tempTripEnd,$tempDescription, 
                                $tempDestination, $tempBasePrice, $tempAgencyCommission,$tempBookingId, 
                                $tempRegionIdIndex,$tempClassIdIndex,$tempFeeIdIndex,$tempProductSupplier){
        
        $this->BookingDetailId = $tempBookingDetailId;
        $this->ItineraryNo = $tempItineraryNo;
        $this->TripStart = $tempTripStart;
        $this->TripEnd = $tempTripEnd;
        $this->Description = $tempDescription;
        $this->Destination = $tempDestination;
        $this->BasePrice = $tempBasePrice;
        $this->AgencyCommission = $tempAgencyCommission;
        $this->BookingId = $tempBookingId;
        $this->RegionIdIndex = $tempRegionIdIndex;
        $this->ClassIdIndex = $tempClassIdIndex;
        $this->FeeIdIndex = $tempFeeIdIndex;
        $this->ProductSupplier = $tempProductSupplier;
    }


    public function getBookingDetailId(){
        return $this->BookingDetailId;
    }

    public function setBookingDetailId($tempBookingDetailId){
        $this->BookingDetailId = $tempBookingDetailId;   
    }

    public function getItineraryNo(){
        return $this->ItineraryNo;
    }

    public function setItineraryNo($tempItineraryNo){
        $this->ItineraryNo = $tempItineraryNo;   
    }

    public function getTripStart(){
        return $this->TripStart;
    }

    public function setTripStart($tempTripStart){
        $this->TripStart = $tempTripStart;   
    }

    public function getTripEnd(){
        return $this->TripEnd;
    }

    public function setTripEnd($tempTripEnd){
        $this->TripEnd = $tempTripEnd;   
    }

    public function getDescription(){
        return $this->Description;
    }

    public function setDescription($tempDescription){
        $this->Description = $tempDescription;   
    }

    public function getDestination(){
        return $this->Destination;
    }

    public function setDestination($tempDestination){
        $this->Destination = $tempDestination;   
    }

    public function getBasePrice(){
        return $this->BasePrice;
    }

    public function setBasePrice($tempBasePrice){
        $this->BasePrice = $tempBasePrice;   
    }

    public function getAgencyCommission(){
        return $this->AgencyCommission;
    }

    public function setAgencyCommission($tempAgencyCommission){
        $this->AgencyCommission = $tempAgencyCommission;   
    }

    public function getBookingId(){
        return $this->BookingId;
    }

    public function setBookingId($tempBookingId){
        $this->BookingId = $tempBookingId;   
    }

    public function getRegionIdIndex(){
        return $this->RegionIdIndex;
    }

    public function setRegionIdIndex($tempRegionIdIndex){
        $this->RegionIdIndex = $tempRegionIdIndex;   
    }

    public function getClassIdIndex(){
        return $this->ClassIdIndex;
    }

    public function setClassIdIndex($tempClassIdIndex){
        $this->ClassIdIndex = $tempClassIdIndex;   
    }

    public function getFeeIdIndex(){
        return $this->FeeIdIndex;
    }

    public function setFeeIdIndex($tempFeeIdIndex){
        $this->FeeIdIndex = $tempFeeIdIndex;   
    }

    public function getProductSupplier(){
        return $this->ProductSupplier;
    }

    public function setProductSupplier($tempProductSupplier){
        $this->ProductSupplier = $tempProductSupplier;   
    }

    public function getPropertyArray() {
        $tempArray = array();
        foreach ($this as $key => $value) {
            $tempArray[$key] = $value;
        }
        return $tempArray;
     }
}

//--------------------------------------------------------------------
//
//                      Credit Card Class
//
//--------------------------------------------------------------------


class CreditCard {
    //set properties
    // protected $CreditCardId;  
    protected $CCName;      
    protected $CCNumber;        
    protected $CCExpiry;          
    protected $CustomerId;     
 
    // $tempCreditCardId,
    public function __construct($tempCCName,$tempCCNumber,
                                $tempCCExpiry,$tempCustomerId){
        
        // $this->CreditCardId = $tempCreditCardId;
        $this->CCName = $tempCCName;
        $this->CCNumber = $tempCCNumber;
        $this->CCExpiry = $tempCCExpiry;
        $this->CustomerId = $tempCustomerId;

    }

    // public function getCreditCardId(){
    //     return $this->CreditCardId;
    // }

    // public function setCreditCardId($tempCreditCardId){
    //     $this->CreditCardId = $tempCreditCardId;   
    // }

    public function getCCName(){
        return $this->CCName;
    }

    public function setCCName($tempCCName){
        $this->CCName = $tempCCName;   
    }

    public function getCCNumber(){
        return $this->CCNumber;
    }

    public function setCCNumber($tempCCNumber){
        $this->CCNumber = $tempCCNumber;   
    }

    public function getCCExpiry(){
        return $this->CCExpiry;
    }

    public function setCCExpiry($tempCCExpiry){
        $this->CCExpiry = $tempCCExpiry;   
    }

    public function getCustomerId(){
        return $this->CustomerId;
    }

    public function setCustomerId($tempCustomerId){
        $this->CustomerId = $tempCustomerId;   
    }

    public function getPropertyArray() {
        $tempArray = array();
        foreach ($this as $key => $value) {
            $tempArray[$key] = $value;
        }
        return $tempArray;
     }
}
?>