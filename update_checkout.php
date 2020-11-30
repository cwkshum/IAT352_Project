<?php
    //connect to db
    require("db.php");
    include("auth_sessionNotActiveCheck.php");

    // $productName = "";
    // $productSize = "";

    // if(isset($_POST['productName']) && isset($_POST['productSize'])) {
        
    //     $productName = $_POST["productName"];
    //     $productSize = $_POST["productSize"];

    //     //identify the customer id 
    //     $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
        
    //     $idResult = mysqli_query($connection, $idQuery); 
    //     $idNumber = mysqli_fetch_assoc($idResult);
    //     $cust_id = $idNumber["customer_id"];
        
    //     //Check if this item has already been added to favourites
    //     $removeCartQuery = "DELETE FROM cart WHERE product_name ='" . $productName. "' AND product_size =".$productSize." AND customer_id = " .$cust_id;
    //     $removeCartResult = mysqli_query($connection, $removeCartQuery) or die(mysql_error());

    //     // $num_results = mysqli_num_rows($removeFavResult); 
    //     // $rows = mysqli_fetch_assoc($removeFavResult);
        
    //     // $fetchResult = mysqli_query($connection, $fetchProductsQuery);
    //     // $num_results = mysqli_num_rows($fetchResult); 
    //     // $rows = mysqli_fetch_assoc($fetchResult);
    // }

    //identify the customer id 
    $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
    
    $idResult = mysqli_query($connection, $idQuery); 
    $idNumber = mysqli_fetch_assoc($idResult);
    $cust_id = $idNumber["customer_id"];

    $fetchProductsQuery = "SELECT COUNT(product_name) AS quantity, SUM(product_price) AS total FROM cart WHERE customer_id = " .$cust_id; 

    // get results from DB 
    $result_array = array();
    $result = $connection->query($fetchProductsQuery);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }
    /* send a JSON encded array to client */
    echo json_encode($result_array);

    $connection->close();
?>