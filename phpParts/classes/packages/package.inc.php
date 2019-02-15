<?php

class Packages extends ourDBH {

    protected function getAllPackages(){

        $sql = "SELECT * FROM packages";

        $result = $this->connect()->query($sql);

        $quantitiesFound = $result->num_rows;

        if ($quantitiesFound === 0) {
            echo "ERROR: "
            return $allPackages;
    
        }
    }
}

?>