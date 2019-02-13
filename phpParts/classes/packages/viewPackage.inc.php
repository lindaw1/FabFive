<?php

    class ViewPackages extends Packages{

        public function showAllPackages(){

            $datasPulled = $this->getAllPackages();

            $replicaPackages = array();
            
            foreach ( $datasPulled as $index=>$packageData ){
                $replicaPackages[$index]=$packageData;
            }

            return $replicaPackages;
        }
    }
?>