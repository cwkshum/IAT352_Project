<?php

    //connect to db
    require("db.php");
    include("auth_sessionNotActiveCheck.php");
    
    $setFavouritesQuery = '';
    $setCartQuery = '';

    if(isset($_POST["action"])) {

        //identify the customer id 
        $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
        $idResult = mysqli_query($connection, $idQuery); 
        $idNumber = mysqli_fetch_assoc($idResult);
        $cust_id = $idNumber["customer_id"];
    

        // toggle favourites in member home 
        if(isset($_POST["favourites"])){
            // set toggle favourites to true
            $setFavouritesQuery .= "UPDATE customization SET toggle_favourites = true WHERE customer_id = " .$cust_id; 
            $favouritesResult = mysqli_query($connection, $setFavouritesQuery); 

        } else{
            // set toggle favourites to false
            $setFavouritesQuery .= "UPDATE customization SET toggle_favourites = false WHERE customer_id = " .$cust_id;
            $favouritesResult = mysqli_query($connection, $setFavouritesQuery); 
        }

        // toggle cart in member home 
        if(isset($_POST["cart"])){      
            // set toggle cart to true      
            $setCartQuery .= "UPDATE customization SET toggle_cart = true WHERE customer_id = " .$cust_id; 
            $cartResult = mysqli_query($connection, $setCartQuery); 
        } else{
            // set toggle cart to false
            $setCartQuery .= "UPDATE customization SET toggle_cart = false WHERE customer_id = " .$cust_id;
            $cartResult = mysqli_query($connection, $setCartQuery); 
        }
    }

    // close connection to DB 
    $connection->close();
?>