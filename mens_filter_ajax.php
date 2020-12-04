<?php

    //connect to db
    require("db.php");
    
    $whereBrandQuery = "";
    $whereColourQuery = "";
    $whereSizeQuery = "";
                    

    if(isset($_POST["action"])) {
        $query = "SELECT * FROM products";
        
        // brand filters
        if(isset($_POST["brand"])){
            $brand_filter = implode("','", $_POST["brand"]);
            $whereBrandQuery .= " WHERE brand IN('".$brand_filter."')";
            $query .= $whereBrandQuery;
        } 

        // colour filters
        if(isset($_POST["colour"])){
            $colour_filter = implode("','", $_POST["colour"]);
            if(!empty($whereBrandQuery)){
                $whereColourQuery .= " AND colour IN('".$colour_filter."')";
            } else{
                $whereColourQuery .= " WHERE colour IN('".$colour_filter."')";
            }
            $query .= $whereColourQuery; 
        } 

        // size filters
        if(isset($_POST["size"])){
            $size_filter = implode(",", $_POST["size"]);
            if(!empty($whereColourQuery) || !empty($whereBrandQuery)){
                $whereSizeQuery .= " AND size IN(".$size_filter.")";
            } else if (empty($whereColourQuery) && empty($whereBrandQuery)){
                $whereSizeQuery .= " WHERE size IN(".$size_filter.")";
            }
            $query .= $whereSizeQuery; 
        } 

        // if no filters have been selected, show all shoes available for men 
        if(empty($whereBrandQuery) && empty($whereColourQuery) && empty($whereSizeQuery)){
            $query .= " WHERE gender ='Men' GROUP BY name";
        } else {
            // show filtered products
            $query .= " AND gender ='Men' GROUP BY name";
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
    // send a JSON encoded array to client 
    echo json_encode($result_array);
       
    // close connection to DB 
    $connection->close();
?>

