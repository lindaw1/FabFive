<?php

//--------------------------------------------------------------------
//
//                      Agent Class
//
//--------------------------------------------------------------------

class Agent {
    //set properties
    private $AgentId;
    private $AgtFirstName;
    private $AgtMiddleInitial;
    private $AgtLastName;
    private $AgtBusPhone;
    private $AgtEmail;
    private $AgtPosition;
    private $AgencyId;
    private $AgtUsername;
    private $AgtPassword;

    //
    public function __construct($tempAgentId, $tempAgtFirstName, $tempAgtMiddleInitial, $tempAgtLastName, $tempAgtBusPhone, $tempAgtEmail, $tempAgtPosition, $tempAgencyId, $tempAgtUsername, $tempAgtPassword) {
        
        $this->AgentId = $tempAgentId;
        $this->AgtFirstName = $tempAgtFirstName;
        $this->AgtMiddleInitial = $tempAgtMiddleInitial;
        $this->AgtLastName = $tempAgtLastName;
        $this->AgtBusPhone = $tempAgtBusPhone;
        $this->AgtEmail = $tempAgtEmail;
        $this->AgtPosition = $tempAgtPosition;
        $this->AgencyId = $tempAgencyId; 
        $this->AgtUsername = $tempAgtUsername;
        $this->AgtPassword = $tempAgtPassword;
    }

    public function __toString(){

        $tempString = "";
        return $tempString;
    }

    public function getAgentId(){
        return $this->AgentId;
    }

    public function setAgentId($tempAgentId){
        $this->AgentId = $tempAgentId;   
    }

    public function getAgtFirstName(){
        return $this->AgtFirstName;
    }

    public function setAgtFirstName($tempAgtFirstName){
        $this->AgtFirstName = $tempAgtFirstName;   
    }

    public function getAgtMiddleInitial(){
        return $this->AgtMiddleInitial;
    }

    public function setAgtMiddleInitial($tempAgtMiddleInitial){
        $this->MiddleInitial = $tempAgtMiddleInitial;   
    }

    public function getAgtLastName(){
        return $this->AgtLastName;
    }

    public function setAgtLastName($tempAgtFirstName){
        $this->AgtLastName = $tempAgtLastName;   
    }

    public function getAgtBusPhone(){
        return $this->AgtBusPhone;
    }

    public function setAgtBusPhone($tempAgtBusPhone){
        $this->AgtBusPhone = $tempAgtBusPhone;   
    }

    public function getAgtEmail(){
        return $this->AgtEmail;
    }

    public function setAgtEmail($tempAgtEmail){
        $this->AgtEmail = $tempAgtEmail;   
    }

    public function getAgtPosition(){
        return $this->AgtPosition;
    }

    public function setAgtPosition($tempAgtPosition){
        $this->AgtPosition = $tempAgtPosition;   
    }

    public function getAgencyId(){
        return $this->AgencyId;
    }

    public function setAgencyId($tempAgencyId){
        $this->AgencyId = $tempAgencyId;   
    }

    public function getAgtUsername(){
        return $this->AgtUsername;
    }

    public function setAgtUsername($tempAgtUsername){
        $this->AgtUsername = $tempAgtUsername;   
    }
    public function getAgtPassword(){
        return $this->AgtPassword;
    }

    public function setAgtPassword($tempAgtPassword){
        $this->AgtPassword = $tempAgtPassword;   
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
//                      Customer Class
//
//--------------------------------------------------------------------

class Customer {
    private $CustId;
    private $CustFirstName;
    private $CustLastName;
    private $CustHomePhone;
    private $CustBusPhone;
    private $CustEmail;
    private $CustAddress;
    private $CustCity;
    private $CustProvince;
    private $CustPostal;
    private $CustCountry;
    private $AgentId;
    private $CustPassword;

    public function  __construct($tempCustId, $tempCustFirstName, $tempCustLastName, $tempCustHomePhone,
                                $tempCustBusPhone, $tempCustEmail,$tempCustAddress,$tempCustCity,
                                $tempCustProvince,$tempCustPostal,$tempCustCountry,$tempAgentId,$tempCustPassword) {
        
        $this->$CustId = $tempCustId;
        $this->$CustFirstName = $tempCustFirstName;
        $this->$CustLastName = $tempCustLastName;
        $this->$CustHomePhone = $tempCustHomePhone;
        $this->$CustBusPhone = $tempBusPhone;
        $this->$CustEmail = $tempCustEmail;
        $this->$CustAddress = $tempCustAddress;
        $this->$CustCity = $tempCustCity;
        $this->$CustProvince = $tempCustProvince;
        $this->$CustPostal = $tempCustPostal;
        $this->$CustCountry = $tempCustCountry;
        $this->$AgentId = $tempAgentId;
        $this->$CustPassword = $tempCustPassword;
    }


    public function getCustId(){
        return $this->CustId;
    }

    public function setCustId($tempCustId){
        $this->CustId = $tempCustId;   
    }

    public function getCustFirstName(){
        return $this->CustFirstName;
    }

    public function setCustFirstName($tempCustFirstName){
        $this->CustFirstName = $tempCustFirstName;   
    }

    public function getCustLastName(){
        return $this->CustLastName;
    }

    public function setCustLastName($tempCustLastName){
        $this->CustLastName = $tempCustLastName;   
    }
    public function getCustHomePhone(){
        return $this->CustHomePhone;
    }

    public function setCustHomePhone($tempCustHomePhone){
        $this->CustHomePhone = $tempCustHomePhone;   
    }
    public function getCustBusPhone(){
        return $this->CustBusPhone;
    }

    public function setCustBusPhone($tempCustBusPhone){
        $this->CustBusPhone = $tempCustBusPhone;   
    }
    public function getCustEmail(){
        return $this->CustEmail;
    }

    public function setCustEmail($tempCustEmail){
        $this->CustEmail = $tempCustEmail;   
    }
    public function getCustAddress(){
        return $this->CustAddress;
    }

    public function setCustAddress($tempCustAddress){
        $this->CustAddress = $tempCustAddress;   
    }
    public function getCustCity(){
        return $this->CustCity;
    }

    public function setCustCity($tempCustCity){
        $this->CustCity = $tempCustCity;   
    }
    public function getCustProvince(){
        return $this->CustProvince;
    }

    public function setCustProvince($tempCustProvince){
        $this->CustProvince = $tempCustProvince;   
    }
    public function getCustProv(){
        return $this->CustProv;
    }

    public function setCustProv($tempCustProv){
        $this->CustProv = $tempCustProv;   
    }
    public function getCustCountry(){
        return $this->CustCountry;
    }

    public function setCustCountry($tempCustCountry){
        $this->CustCountry = $tempCustCountry;   
    }
    public function getAgentId(){
        return $this->AgentId;
    }

    public function setAgentId($tempAgentId){
        $this->AgentId = $tempAgentId;   
    }

    public function getCustPassword(){
        return $this->CustPassword;
    }

    public function setCustPassword($tempCustPassword){
        $this->CustPassword = $tempCustPassword;   
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
    private $BookingId;
    private $BookingDate;
    private $BookingNo;
    private $TravelerCount;
    private $CustomerId;
    private $TripTypeId;
    private $PackageId;


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
        return $this->getPackageId;
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
    private $BookingDetailId;
    private $ItineraryNo;
    private $TripStart;
    private $TripEnd;
    private $Description;
    private $Destination;
    private $BasePrice;
    private $AgencyCommission;
    private $BookingIdIndex;
    private $RegionIdIndex;
    private $ClassIdIndex;
    private $FeeIdIndex;
    private $ProductSupplier;

    public function __construct($tempBookingDetailId,$tempItineraryNo,$tempTripStart,$tempTripEnd,$tempDescription, 
                                $tempDestination, $tempBasePrice,$tempAgencyCommission,$tempBookingIdIndex, 
                                $tempRegionIdIndex,$tempClassIdIndex,$tempFeeIdIndex,$tempProductSupplier){
        
        $this->BookingDetailId = $tempBookingDetailId;
        $this->ItineraryNo = $tempItineraryNo;
        $this->TripStart = $tempTripStart;
        $this->TripEnd = $tempTripEnd;
        $this->Description = $tempDescription;
        $this->Destination = $tempDestination;
        $this->BasePrice = $tempBasePrice;
        $this->AgencyCommission = $tempAgencyCommission;
        $this->BookingIdIndex = $tempBookingIdIndex;
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
        return $this->getBasePrice;
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

    public function getBookingIdIndex(){
        return $this->BookingIdIndex;
    }

    public function setBookingIdIndex($tempBookingIdIndex){
        $this->BookingIdIndex = $tempBookingIdIndex;   
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

?>