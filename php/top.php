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

if (!isset($_SESSION["start_time"])) {
    $_SESSION["start_time"] = time();
}

include_once('php/functions.php');
include_once('php/variables.php');
?>