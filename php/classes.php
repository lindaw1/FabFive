<?php

	class ContactInfo {
        protected $id;
        protected $fname;
        protected $lname;
		protected $address;
        protected $city;
        protected $prov;
        protected $postal;
		protected $country;
        protected $email;
        protected $phone;
        protected $fax;


		public function __construct($id, $fname, $lname, $address, $city, $prov, $postal, $country, $email, $phone, $fax){
            $this->id = $id;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->address = $address;
            $this->city = $city;
            $this->prov = $prov;
            $this->postal = $postal;
            $this->country = $country;
            $this->email = $email;
            $this->phone = $phone;
            $this->fax = $fax;
		}

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}

		public function getFirstName() {
			return $this->fname;
		}
		public function setFirstName($fname) {
			$this->fname = $fname;
		}

		public function getLasttName() {
			return $this->lname;
		}
		public function setLastName($lname) {
			$this->lname = $lname;
		}

		public function getCity() {
			return $this->city;
		}
		public function setCity($city) {
			$this->city = $city;
        }
        
		public function getProv() {
            return $this->province;
        }
		public function setProv($province) {
			$this->province = $province;
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
        
		public function getEmail() {
            return $this->email;
        }
		public function setEmail($email) {
			$this->email = $email;
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

	class ContactInfo extends Agency {

        protected $id;
		protected $address;
        protected $city;
        protected $prov;
        protected $postal;
		protected $country;
        protected $email;
        protected $phone;
        protected $fax;


		public function __construct($id, $fname, $lname, $address, $city, $prov, $postal, $country, $email, $phone, $fax){
 
            parent::__construct($id, $address, $city, $prov, $postal, $country, $email, $phone, $fax);

            $this->id = $id;
            $this->address = $address;
            $this->city = $city;
            $this->prov = $prov;
            $this->postal = $postal;
            $this->country = $country;
            $this->email = $email;
            $this->phone = $phone;
            $this->fax = $fax;
		}

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}

		public function getFirstName() {
			return $this->fname;
		}
		public function setFirstName($fname) {
			$this->fname = $fname;
		}

		public function getLasttName() {
			return $this->lname;
		}
		public function setLastName($lname) {
			$this->lname = $lname;
		}

		public function getCity() {
			return $this->city;
		}
		public function setCity($city) {
			$this->city = $city;
        }
        
		public function getProv() {
            return $this->province;
        }
		public function setProv($province) {
			$this->province = $province;
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
        
		public function getEmail() {
            return $this->email;
        }
		public function setEmail($email) {
			$this->email = $email;
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

// Not sure what the following line does----Linda
		public function __toString() {
			return parent::getFullName();
		}
	}

class Package {
        //set properties
        private $PackageId;
        private $PkgName;
        private $PkgStartDate;
        private $PkgEndDate;
        private $PkgDesc;
        private $PkgBasePrice;
        private $PkgAgencyCommission;


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
            return $this->getPkgAgencyCommission;
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
?>