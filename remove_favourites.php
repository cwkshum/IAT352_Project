<?php
    //connect to db
    require("db.php");
    include("auth_sessionNotActiveCheck.php");

    $productName = "";

    if(isset($_POST['productName'])) {
        
        $productName = $_POST["productName"];

        //identify the customer id 
        $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
        $idResult = mysqli_query($connection, $idQuery); 
        $idNumber = mysqli_fetch_assoc($idResult);
        $cust_id = $idNumber["customer_id"];
        
        // Delete item from favourites list
        $removeFavQuery = "DELETE FROM favourites WHERE product_name ='" . $productName. "' AND customer_id = " .$cust_id;
        $removeFavResult = mysqli_query($connection, $removeFavQuery) or die(mysql_error());
    }

    // Get the remaining items from favourites in the database 
    $fetchProductsQuery = "SELECT * FROM favourites WHERE customer_id = " .$cust_id; 

    // get results from DB 
    $result_array = array();
    $result = $connection->query($fetchProductsQuery);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($result_array, $row);
        }
    }
    // send a JSON encded array to client 
    echo json_encode($result_array);

    $connection->close();
?>