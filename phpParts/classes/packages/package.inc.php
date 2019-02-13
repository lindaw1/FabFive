<?php

class Packages extends ourDBH {

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
}

?>