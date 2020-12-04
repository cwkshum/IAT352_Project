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
        
        $productName = '';
        $productSize = '';

        if(isset($_POST["size"])){
            $productName = $_POST["productName"];
            $productSize = $_POST["size"];

            //if the user has selected to size to add the item into the cart, retrieve all the product information to insert into the DB 
            $productQuery = "SELECT product_id, brand, price FROM products WHERE name='".$productName."' AND size =".$productSize;
            $productResult = mysqli_query($connection, $productQuery);
            $productInfo = mysqli_fetch_assoc($productResult);
            $product_id = $productInfo["product_id"];
            $productBrand = $productInfo["brand"];
            $productPrice = $productInfo["price"];

            //insert product information into the member cart 
            $addToCartQuery = "INSERT into cart (product_id, product_name, product_brand, product_price, product_size, customer_id) VALUES ($product_id, '$productName', '$productBrand', $productPrice, $productSize, $cust_id)";
            $addResult = mysqli_query($connection, $addToCartQuery);
            
            // when the item has been succesfully added to their cart show them a message
            if($addResult) {
                echo json_encode("The item has been added to your cart!");
            } else { 
                echo json_encode("Unable to add item to cart.");
            }
        } else{
            echo json_encode("Please select a size.");
        } 
        
    } else { 
        echo json_encode("not logged in");
    }
?>