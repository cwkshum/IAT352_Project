<?php

    //connect to db
    require("db.php");
    
    // $whereBrandQuery = "";
    // $whereColourQuery = "";
    // $whereSizeQuery = "";
                    

    if(isset($_POST["action"])) {

        $favourites = false; 
        $cart = false;
    
            
        // brand filters
        if(isset($_POST["favourites"])){
            // $brand_filter = implode("','", $_POST["brand"]);
            // $whereBrandQuery .= " WHERE brand IN('".$brand_filter."')";
            // $query .= $whereBrandQuery;
            $favourites = true;
        } 

        // colour filters
        if(isset($_POST["cart"])){
            // $colour_filter = implode("','", $_POST["colour"]);
            // if(!empty($whereBrandQuery)){
            //     $whereColourQuery .= " AND colour IN('".$colour_filter."')";
            // } else{
            //     $whereColourQuery .= " WHERE colour IN('".$colour_filter."')";
            // }
            // $query .= $whereColourQuery; 
            $cart = true;
            
        } 

        // if no filters have been selected, show all shoes available for women 
        // if(empty($whereBrandQuery) && empty($whereColourQuery) && empty($whereSizeQuery)){
        //     $query .= " WHERE gender ='Women' GROUP BY name";
        // } else {
        //     $query .= " AND gender ='Women' GROUP BY name";
        // }
    }
        
    if (isset($_SESSION['email'])) {

        //identify the customer id 
        $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
        $idResult = mysqli_query($connection, $idQuery); 
        $idNumber = mysqli_fetch_assoc($idResult);
        $cust_id = $idNumber["customer_id"];

        //update the DB to toggle customizations as on
        if ($favourites == true) {
            $query = "UPDATE customization SET favourites = true WHERE customer_id = '" .$cust_id ."'"; 

        } else if ($cart == true) { 
            $query = "UPDATE customization SET cart = true WHERE customer_id = '" .$cust_id ."'"; 

        } else if ($favourites == true && $cart == true) {
            $query = "UPDATE customization SET cart = true AND favourites = true WHERE customer_id = '" .$cust_id ."'"; 
        }

        //update the DB to toggle customizations as off 
        if ($favourites == false) {
            $query = "UPDATE customization SET favourites = false WHERE customer_id = '" .$cust_id ."'"; 

        } else if ($cart == false) { 
            $query = "UPDATE customization SET cart = false WHERE customer_id = '" .$cust_id ."'"; 

        } else if ($favourites == false && $cart == false) {
            $query = "UPDATE customization SET cart = true AND favourites = false WHERE customer_id = '" .$cust_id ."'"; 
        }
    


    }

    // get results from DB 
    $result_array = array();
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }
    /* send a JSON encded array to client */
    echo json_encode($result_array);
       
    // close connection to DB 
    $connection->close();
?>