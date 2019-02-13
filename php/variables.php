<?php
//***************************************************************************
// Authors: Stuart Peters, Hoang (Eric) Truong, Linda Wallace
// Date:    February 15, 2019
// Purpose: 
//
//
// Requirements:    
//************************************************************************* */

/* `travelexperts`.`packages` */
$packages = array(
  array('PackageId' => '1',
  'PkgName' => 'Caribbean New Year',
  'PkgStartDate' => '2017-12-25 00:00:00',
  'PkgEndDate' => '2017-01-04 00:00:00',
  'PkgDesc' => 'Cruise the Caribbean & Celebrate the New Year.',
  'PkgBasePrice' => '4800.0000',
  'PkgAgencyCommission' => '400.0000'),

  array('PackageId' => '2',
  'PkgName' => 'Polynesian Paradise',
  'PkgStartDate' => '2016-12-12 00:00:00',
  'PkgEndDate' => '2016-12-20 00:00:00',
  'PkgDesc' => '8 Day All Inclusive Hawaiian Vacation',
  'PkgBasePrice' => '3000.0000',
  'PkgAgencyCommission' => '310.0000'),

  array('PackageId' => '3',
  'PkgName' => 'Asian Expedition',
  'PkgStartDate' => '2016-05-14 00:00:00',
  'PkgEndDate' => '2016-05-28 00:00:00',
  'PkgDesc' => 'Airfaire, Hotel and Eco Tour.',
  'PkgBasePrice' => '2800.0000',
  'PkgAgencyCommission' => '300.0000'),

  array('PackageId' => '4',
  'PkgName' => 'European Vacation',
  'PkgStartDate' => '2016-11-01 00:00:00',
  'PkgEndDate' => '2016-11-14 00:00:00',
  'PkgDesc' => 'Euro Tour with Rail Pass and Travel Insurance',
  'PkgBasePrice' => '3000.0000',
  'PkgAgencyCommission' => '280.0000'),

  array('PackageId' => '5',
  'PkgName' => 'European Vacation (test)',
  'PkgStartDate' => '2019-02-28 00:00:00',
  'PkgEndDate' => '2019-03-08 00:00:00',
  'PkgDesc' => 'test is a trest package',
  'PkgBasePrice' => '2100.0000',
  'PkgAgencyCommission' => '350.0000'),
  
  array('PackageId' => '6',
  'PkgName' => 'Japan vacation',
  'PkgStartDate' => '2019-02-01 00:00:00',
  'PkgEndDate' => '2019-03-08 00:00:00',
  'PkgDesc' => 'test is a second test',
  'PkgBasePrice' => '1900.0000',
  'PkgAgencyCommission' => '350.0000')
);

function getPagePermissions() {
 
  $arrayPagePermissions = array(
    "agencyAppend.php"=>"agent",
    "agencyList.php"=>"public",
    "agentAppend.php"=>"agent",
    "agentList.php"=>"public",
    "customerAppend.php"=>"customer",
    "customerList.php"=>"agent",
    "index.php"=>"public",
    "login.php"=>"public",
    "productAppend.php"=>"agent",
    "productList.php"=>"public",
    "order"=>"customer",
    "bookingAppend.php"=>"public",
    "bookingDetails.php"=>"public",
    "bookingView"=>"public");
    
    return $arrayPagePermissions;
  
}
?>

