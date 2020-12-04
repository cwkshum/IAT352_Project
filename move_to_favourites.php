<?php
    //connect to db
    require("db.php");
    include("auth_sessionNotActiveCheck.php");

    $productName = "";
    $productSizeId = "";
    $productSizeIdExplode = "";
    $productSize = "";
    $productId = "";


    if(isset($_POST['productName']) && isset($_POST['productSizeId'])) {
        
        //explode the values sent in from button
        $productName = $_POST["productName"];
        $productSizeId = $_POST["productSizeId"];
        $productSizeIdExplode = explode(" ", $productSizeId);
        // set product size
        $productSize = $productSizeIdExplode[0];
        // set product id
        $productId = $productSizeIdExplode[1];

        //identify the customer id 
        $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
        $idResult = mysqli_query($connection, $idQuery); 
        $idNumber = mysqli_fetch_assoc($idResult);
        $cust_id = $idNumber["customer_id"];

        // Check if this item has already been added to favourites
        $favQuery = "SELECT product_name FROM favourites WHERE product_name ='" . $productName. "' AND customer_id = " . $cust_id ;
        $favResult = mysqli_query($connection, $favQuery) or die(mysql_error());
        $num_results = mysqli_num_rows($favResult); 
        $rows = mysqli_fetch_assoc($favResult);
       
        //if the item has not been added to favourites, retrieve its relevant information
        if($num_results == 0){
            $infoQuery = "SELECT brand, price FROM products WHERE name = '" . $productName. "' AND size =".$productSize . " AND product_id =" . $productId;
            $infoResult = mysqli_query($connection, $infoQuery);
            $rows = mysqli_fetch_assoc($infoResult);
            $productBrand = $rows["brand"];
            $productPrice = $rows["price"];
            
            // Move the cart item to favourites
            $moveToFavesQuery = "INSERT INTO favourites (product_id, product_name, product_brand, product_price, customer_id) VALUES ($productId, '$productName', '$productBrand', $productPrice, $cust_id)";
            $moveToFavesResult = mysqli_query($connection, $moveToFavesQuery) or die(mysql_error());

            //Delete the moved item from cart 
            $deleteFromCart = "DELETE FROM cart WHERE product_name = '" . $productName . "' AND product_size =" .$productSize. " AND customer_id =" . $cust_id." AND product_id =".$productId;
            $deleteFromCartResult = mysqli_query($connection, $deleteFromCart) or die(mysql_error());
        }
    }

    // Display the products left in cart
    $fetchProductsQuery = "SELECT * FROM cart WHERE customer_id = " .$cust_id; 

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

    $connection->close();
?>