<?php
    //connect to db
    require("db.php");
    include("auth_sessionNotActiveCheck.php");

    // identify the customer id 
    $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
    
    $idResult = mysqli_query($connection, $idQuery); 
    $idNumber = mysqli_fetch_assoc($idResult);
    $cust_id = $idNumber["customer_id"];

    // Calculate the sum of the products in the cart
    $fetchProductsQuery = "SELECT COUNT(product_name) AS quantity, SUM(product_price) AS total FROM cart WHERE customer_id = " .$cust_id; 

    // get results from DB 
    $result_array = array();
    $result = $connection->query($fetchProductsQuery);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }
    
    // send a JSON encoded array to client
    echo json_encode($result_array);

    // Close the connection to the database
    $connection->close();
?>