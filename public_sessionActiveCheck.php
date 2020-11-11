<!-- check public pages to see if a session is active -->
<?php
  session_start();

  if(isset($_SESSION["email"])) {
    //set a session variable 
    // $_SESSION['in_progress'] = true; 
    include ('navigation/member_navigation.php'); 
  } else {
    include ('navigation/visitor_navigation.php'); 
  }

?>


