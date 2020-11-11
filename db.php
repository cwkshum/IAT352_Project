<?php
	//create a connection to the database 
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
    $dbname = "rowina_chan";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    // check the connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>