<?php
    require("db.php");

    $emailInput = $_POST["email"];

    $query = "SELECT email from members WHERE email = '$emailInput' ";
    $result = mysqli_query($connection, $query) or die(mysql_error());

    $numResults = mysqli_num_rows($result); 

    /* send a JSON encded array to client */
    echo json_encode($numResults);

    // Release the returned data
    mysqli_free_result($result);

    // Close the database connection
    mysqli_close($connection);
?>