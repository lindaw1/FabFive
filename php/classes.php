<?php
// ***********************************************************************************************************************************
    // Create a class to store database connection data
    class ourDBH {
        private $serverName;
        private $userName;
        private $passWord;
        private $dbName;

        protected function connect(){
            $this -> $serverName = '127.0.0.1';
            $this -> $userName = 'admin';
            $this -> $passwordName = 'P@ssw0rd';
            $this -> $dbName = 'travelexperts';

            $link = new mysqli_connect($this -> $serverName,$this -> $userName,$this -> $passwordName,$this -> $dbName);
            if (!$link){
                print("There was an error connecting:". mysqli_errno($link) . " -- " . mysqli_error($link));
                exit;
            }
            return $link;
        }

    }

    class Packages extends ourDBH {
        //set properties
        // private $PackageId;
        // private $PkgName;
        // private $PkgStartDate;
        // private $PkgEndDate;
        // private $PkgDesc;
        // private $PkgBasePrice;
        // private $PkgAgencyCommission;

        protected function getAllPackages(){

            $sql = "SELECT * FROM packages";

            $result = $this->connect()->query($sql);

            $quantitiesFound = $result->num_rows;

            if ($quantitiesFound === 0) {
                echo "ERROR: the SQL failed to execute. <br>";
                echo "SQL: $sql <br>";
                echo "Error #: ". $dbh->errno . "<br>";
                echo "Error msg: " . $dbh->error . " <br>";
            } else{
                while ( $pkg = $result->fetch_assoc() ){
                    $allPackages[] = $pkg;
                }
                return $allPackages;
            }
        }


        // public function __construct($tempPackageId, $tempPkgName, $tempPkgStartDate, $tempPkgEndDate, $tempPkgDesc, $tempPkgBasePrice, $tempPkgAgencyCommission) {
            
        //     $this->PackageId = $tempPackageId;
        //     $this->PkgName = $tempPkgName;
        //     $this->PkgStartDate = $tempPkgStartDate;
        //     $this->PkgEndDate = $tempPkgEndDate;
        //     $this->PkgDesc = $tempPkgDesc;
        //     $this->PkgBasePrice = $tempPkgBasePrice;
		// 	$this->PkgAgencyCommission = $tempPkgAgencyCommission;
		// 	}


        // public function getPackageId(){
        //     return $this->PackageId;
        // }

        // public function setPackageId($tempPackageId){
        //     $this->PackageId = $tempPackageId;   
        // }

        // public function getPkgName(){
        //     return $this->PkgName;
        // }

        // public function setPkgName($tempPkgName){
        //     $this->PkgName = $tempPkgName;   
        // }

        // public function getPkgStartDate(){
        //     return $this->PkgStartDate;
        // }

        // public function setPkgStartDate($tempPkgStartDate){
        //     $this->MiddleInitial = $tempPkgStartDate;   
        // }

        // public function getPkgEndDate(){
        //     return $this->PkgEndDate;
        // }

        // public function setPkgEndDate($tempPkgEndDate){
        //     $this->PkgEndDate = $tempPkgEndDate;   
        // }

        // public function getPkgDesc(){
        //     return $this->PkgDesc;
        // }

        // public function setPkgDesc($tempPkgDesc){
        //     $this->PkgDesc = $tempPkgDesc;   
        // }

        // public function getPkgBasePrice(){
        //     return $this->PkgBasePrice;
        // }

        // public function setPkgBasePrice($tempPkgBasePrice){
        //     $this->PkgBasePrice = $tempPkgBasePrice;   
        // }

        // public function getPkgAgencyCommission(){
        //     return $this->getPkgAgencyCommission;
        // }

        // public function setPkgAgencyCommission($tempPkgAgencyCommission){
        //     $this->PkgAgencyCommission = $tempPkgAgencyCommission;   
        // }

        // public function getPropertyArray() {
        //     $tempArray = array();
        // foreach ($this as $key => $value) {
        //     $tempArray[$key] = $value;
        // }
        //     return $tempArray;
        // }
    }

    class ViewPackages extends Packages{

        protected function showAllPackages(){

            $datasPulled = $this -> getAllPackages();

            foreach ( $datasPulled as $packageData ){
                echo $packageData["PackageId"].'<br/>',
                echo $packageData["PkgName"].'<br/>',
                echo $packageData["PkgStartDate"].'<br/>',
                echo $packageData["PkgEndDate"].'<br/>',
                echo $packageData["PkgDesc"].'<br/>',
                echo $packageData["PkgBasePrice"].'<br/>',
                echo $packageData["PkgAgencyCommission"].'<br/>'
            }
        }
    }


// ***********************************************************************************************************************************
	class Agency {
        protected $id;
		protected $address;
        protected $city;
        protected $prov;
        protected $postal;
		protected $country;
        protected $phone;
        protected $fax;


		public function __construct($id, $address, $city, $prov, $postal, $country, $phone, $fax){
            $this->id = $id;
            $this->address = $address;
            $this->city = $city;
            $this->prov = $prov;
            $this->postal = $postal;
            $this->country = $country;
            $this->phone = $phone;
            $this->fax = $fax;
		}

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}

		public function getAddress() {
			return $this->address;
		}
		public function setAddress($address) {
			$this->address = $address;
		}
		
		public function getCity() {
			return $this->city;
		}
		public function setCity($city) {
			$this->city = $city;
        }
        
		public function getProv() {
            return $this->prov;
        }
		public function setProv($prov) {
			$this->province = $prov;
		}
        
		public function getPostal() {
            return $this->postal;
        }
		public function setPostal($postal) {
			$this->postal = $postal;
		}
        
		public function getCountry() {
            return $this->country;
        }
		public function setCountry($country) {
			$this->country = $country;
		}
        
		public function getPhone() {
            return $this->phone;
        }
		public function setPhone($phone) {
			$this->phone = $phone;
		}
        
		public function getFax() {
            return $this->fax;
        }
		public function setFax($fax) {
			$this->fax = $fax;
		}
	}
?>