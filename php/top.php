<?php
//***************************************************************************
// Authors:  Stuart Peters, Hoang (Eric) Truong, Linda Wallace
// Date:    February 15, 2019
// Purpose:  Starts the session ID. references Function and variables files.
//
// Requirements:
// 
//************************************************************************* */

session_start();
//if session tme not set, set session time
if (!isset($_SESSION["start_time"])) {
    $_SESSION["start_time"] = time();
}

//common php includes for all pages
include_once('php/classes.php');
include_once('php/functions.php');
include_once('php/variables.php');


$urlCurrent = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path_parts = pathinfo($urlCurrent);
$strPage = $path_parts['basename'];
checkCredentials($strPage);

?>