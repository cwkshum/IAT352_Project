<?php

// check if there is an active session
session_start();

if(isset($_SESSION["email"])){
  //set a session variable 
  $_SESSION['in_progress'] = true; 

  // if session variable 'email'is set - redirect to members page
  header("Location: memberhome.php");
  exit(); 
}

?>
