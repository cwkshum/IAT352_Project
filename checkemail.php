<?php
    require("db.php");

    $emailInput = $_POST["email"];

    $query = "SELECT email from members WHERE email = '$emailInput' ";
    $result = mysqli_query($connection, $query) or die(mysql_error());

    $numResults = mysqli_num_rows($result); 

    if($numResults == 1){
        echo 'This email is already in use';
    } 

    // Release the returned data
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($connection);
?>