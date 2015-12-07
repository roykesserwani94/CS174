<?php session_start();

if(isset($_SESSION['email'])){
  session_unset($_SESSION['email']);     // unset $_SESSION variable for the run-time
  session_destroy();   // destroy session data in storage
header( 'Location: index.php' ) ; }
?>
