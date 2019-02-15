<?php
class Discounts extends ourDBH {

    protected function getRemainDis(){

        $sqlForDis = "SELECT * FROM discountpackages";

        $resultForDis = $this->connect()->query($sqlForDis);

        $quantitiesObtained = $resultForDis->num_rows;

        if ($quantitiesObtained === 0) {
            echo "ERROR: the SQL failed to execute. <br>";
            echo "SQL: $sqlForDis <br>";
            echo "Error #: ". $dbh->errno . "<br>";
            echo "Error msg: " . $dbh->error . " <br>";
        } else{
            while ( $discount = $resultForDis->fetch_assoc() ){
                $allDiscounts[] = $discount;
            }
            return $allDiscounts;
        }
    }
}

?>