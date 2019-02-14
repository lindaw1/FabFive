<?php

    class ViewDiscounts extends Discounts{

        public function showAllDiscounts(){

            $discountsPulled = $this->getAllDiscounts();

            $replicaDiscounts = array();
            
            foreach ( $discountsPulled as $num => $discountData ){
                $replicaDiscounts[$num] = $discountData;
            }

            return $replicaDiscounts;
        }
    }
?>