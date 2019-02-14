<?php
    include __DIR__.'/../classes/dbh/dbh.inc.php';
    include __DIR__.'/../classes/packages/package.inc.php';
    include __DIR__.'/../classes/packages/viewPackage.inc.php';
    include __DIR__.'/../classes/discountPkgs/discountsPkg.inc.php';
    include __DIR__.'/../classes/discountPkgs/viewDiscounts.inc.php';

    function retrieveDiscounts(){
        $salePackages = new ViewDiscounts();
        $CoppiedDiscounts = $salePackages->showAllDiscounts();
        // Instantly destoy our class instance to prevent database leakages
        unset($salePackages);
        return $CoppiedDiscounts;
    }

    function retrievePackages(){
        $vacationPackages = new ViewPackages();
        $CoppiedArray = $vacationPackages->showAllPackages();
        // Instantly destoy our class instance to prevent database leakages
        unset($vacationPackages);
        return $CoppiedArray;
    }
?>