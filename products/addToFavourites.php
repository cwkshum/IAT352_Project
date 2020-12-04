<?php
    include("../db.php");
    // check if a session is in progress, otherwise visitors will be redirected to a sign-up page when they wish to add items to their cart 
    session_start();
    if (isset($_SESSION['email'])) {
        
        //identify the customer id 
        $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
        $idResult = mysqli_query($connection, $idQuery); 
        $idNumber = mysqli_fetch_assoc($idResult);
        $cust_id = $idNumber["customer_id"];
        $productName = $_POST["productName"];

        //retrieve all the product information to insert into the DB 
        $productQuery = "SELECT product_id, brand, price FROM products WHERE name='".$productName."'";
        $productResult = mysqli_query($connection, $productQuery); 
        $productInfo = mysqli_fetch_assoc($productResult);
        $product_id = $productInfo["product_id"];
        $productBrand = $productInfo["brand"];
        $productPrice = $productInfo["price"];

        //Check if this item has already been added to favourites
        $favQuery = "SELECT product_name FROM favourites WHERE product_name ='" . $productName. "' AND customer_id = '" . $cust_id . "'";
        $favResult = mysqli_query($connection, $favQuery) or die(mysql_error());
        
        $num_results = mysqli_num_rows($favResult); 
        $rows = mysqli_fetch_assoc($favResult);
        
        // if the item has not been added, proceed
        if($num_results == 0){
            //insert product information into favourites
            $addToFavouriteQuery = "INSERT into favourites (product_id, product_name, product_brand, product_price, customer_id) VALUES ($product_id, '$productName', '$productBrand', $productPrice, $cust_id)";
            
            $addResult = mysqli_query($connection, $addToFavouriteQuery);
            
            //when the item has been succesfully added to their favourites show them a message
            if($addResult) {
                echo json_encode("The item has been added to your favourites!");
            } 
        } else { 
            echo json_encode("Item is already in your favourites."); 
        }
    } else{
        echo json_encode("not logged in");
    }

?>