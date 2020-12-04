<!-- check public pages to see if a session is active -->
<?php
  session_start();

  if(isset($_SESSION["email"])) {
    // if the user is logged it then redirect them to the member's home page
    include ('navigation/member_navigation.php'); 
  } else {
    //if the user is not logged in, redirect them to the visitor's home page
    include ('navigation/visitor_navigation.php'); 
  }

?>


