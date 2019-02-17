
<?php 
// print("phpParts/customerForm/customerClasses.php<br>");
?>
<!----------------------------------------------------------------------
//
//                      Customer Class
//
//-------------------------------------------------------------------->

<?php 
class Customer {
    
    public $CustId;
    public $CustFirstName;
    public $CustLastName;
    public $CustAddress;
    public $CustCity;
    public $CustProv;
    public $CustPostal;
    public $CustCountry;
    public $CustHomePhone;
    public $CustBusPhone;
    public $CustEmail;
    public $CustPassword;
    public $AgentId;

    public function __construct($tempCustId, $tempCustFirstName, $tempCustLastName, $tempCustAddress,$tempCustCity,
                                $tempCustProv,$tempCustPostal,$tempCustCountry,$tempCustHomePhone,
                                $tempCustBusPhone, $tempCustEmail,$tempCustPassword,$tempAgentId) 
        {
        $this->CustId = $tempCustId;
        $this->CustFirstName = $tempCustFirstName;
        $this->CustLastName = $tempCustLastName;
        $this->CustAddress = $tempCustAddress;
        $this->CustCity = $tempCustCity;
        $this->CustProv = $tempCustProv;
        $this->CustPostal = $tempCustPostal;
        $this->CustCountry = $tempCustCountry;
        $this->CustHomePhone = $tempCustHomePhone;
        $this->CustBusPhone = $tempCustBusPhone;
        $this->CustEmail = $tempCustEmail;
        $this->CustPassword = $tempCustPassword;
        $this->AgentId = $tempAgentId;
        
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
    public function getCustProv(){
        return $this->CustProv;
    }

    public function setCustProv($tempCustProv){
        $this->CustProv = $tempCustProv;   
    }
    public function getCustPostal(){
        return $this->CustPostal;
    }

    public function setCustPostal($tempCustPostal){
        $this->CustPostal = $tempCustPostal;   
    }
    public function getCustCountry(){
        return $this->CustCountry;
    }

    public function setCustCountry($tempCustCountry){
        $this->CustCountry = $tempCustCountry;   
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

    public function getCustPassword(){
        return $this->CustPassword;
    }

    public function setCustPassword($tempCustPassword){
        $this->CustPassword = $tempCustPassword;   
    }

    public function getAgentId(){
        return $this->AgentId;
    }

    public function setAgentId($tempAgentId){
        $this->AgentId = $tempAgentId;   
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