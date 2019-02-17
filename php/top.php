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



// $urlCurrent = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
// $path_parts = pathinfo($urlCurrent);
// $strPage = $path_parts['basename'];
// $strRedirect = checkCredentials($strPage);
// if ($strRedirect!= "") {
//     header($strRedirect);
// }
?>