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
            $setFavouritesQuery .= "UPDATE customization SET toggle_favourites = true WHERE customer_id = " .$cust_id; 
            $favouritesResult = mysqli_query($connection, $setFavouritesQuery); 

        } else{
            $setFavouritesQuery .= "UPDATE customization SET toggle_favourites = false WHERE customer_id = " .$cust_id;
            $favouritesResult = mysqli_query($connection, $setFavouritesQuery); 
        }

        // toggle cart in member home 
        if(isset($_POST["cart"])){            
            $setCartQuery .= "UPDATE customization SET toggle_cart = true WHERE customer_id = " .$cust_id; 
            $cartResult = mysqli_query($connection, $setCartQuery); 
        } else{
            $setCartQuery .= "UPDATE customization SET toggle_cart = false WHERE customer_id = " .$cust_id;
            $cartResult = mysqli_query($connection, $setCartQuery); 
        }
    
    }

    // // get results from DB 
    // $result_array = array();
    // $result = $connection->query($setFavouritesQuery);
    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         array_push($result_array, $row);
    //     }
    // }

    /* send a JSON encded array to client */
    // echo json_encode($setFavouritesQuery);

    
    // close connection to DB 
    $connection->close();
?>