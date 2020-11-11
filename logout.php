<?php
    session_start();

    //unset session variables 
    $_SESSION = array();

    // Destroying All Sessions
    if(session_destroy()){
        // Redirecting To Home Page
        header("Location: index.php");
    }
?>
