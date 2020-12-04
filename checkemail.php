<?php
    require("db.php");

    $emailInput = $_POST["email"];

    // Check to see if email exists in the database
    $query = "SELECT email from members WHERE email = '$emailInput' ";
    $result = mysqli_query($connection, $query) or die(mysql_error());

    //return the number of rows
    $numResults = mysqli_num_rows($result); 

    // send a JSON encoded result to client 
    echo json_encode($numResults);

    // Release the returned data
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($connection);
?>