<?php
//***************************************************************************
// Authors: Stuart Peters, Hoang (Eric) Truong, Linda Wallace
// Date:    February 15, 2019
// Purpose: 
//
//
// Requirements:    
//************************************************************************* */


$hour = new DateTime("now", new DateTimeZone('America/Edmonton'));
$hour = $hour->format('H');

  if( $hour > 6 && $hour <= 11) {
    echo "Good Morning Sunshine";}
  else if($hour > 11 && $hour <= 16) {
    echo "Good Afternoon - You're beautiful!";
  } else if($hour > 16 && $hour <= 23) {
    echo "Good Evening Beautiful";
  } else {
    echo "Why aren't you asleep?  Are you still programming?";
  }
  
?>