<?php 
    // checks to see if the user is logged in
    include("auth_sessionNotActiveCheck.php"); 
    $inFolder = false;
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Cart</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/cart.css"> 

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    </head>

    <?php
		//connect to db 
        require("db.php");
	?>
    
    <body>

        <!-- Navigation -->
        <?php 
            if(isset($_SESSION["email"])) {
                include ('navigation/member_navigation.php'); 
            }
        ?>

        <div> 
            <h1>My Cart</h1>
        </div> 
        
        <!-- Cart Item Display Section -->
        <div class="grid add-gutters four-column">
            <?php 
            
                if (isset($_SESSION['email'])) {

                    //identify the customer id 
                    $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
                    $idResult = mysqli_query($connection, $idQuery); 
                    $idNumber = mysqli_fetch_assoc($idResult);
                    $cust_id = $idNumber["customer_id"];
                    
                    // Retrieve the products that the member has added to their cart from the database
                    $query = "SELECT product_brand, product_name, product_size, product_price FROM cart WHERE customer_id = " .$cust_id;

                    $result = mysqli_query($connection, $query);
                    $numResults = mysqli_num_rows($result);
                    for ($i = 0; $i < $numResults; $i++) {
                        $rows = mysqli_fetch_assoc($result); 
                        $productName = $rows['product_name'];
                        $productPrice = $rows['product_price']; 
                        $productBrand = $rows['product_brand'];
                        $productSize = $rows['product_size'];

                        $stripped = str_replace(' ', '', $productName);

                        // display the products that the member has added to their cart
                        echo '<figure>';
                            echo '<a href="products/'. $stripped .'.php"> <img class="product-image" src="img/'. $stripped .'.png"> </a>';
                            echo '<figcaption class="content-unit-text">'. $productName .'<br>$'. $productPrice . '<br>Size: '. $productSize .'</figcaption>';
                        echo '</figure>';
                    }
                }
            ?> 
        </div>

    <?php
        // Release the returned data
        mysqli_free_result($result);

        // Close the database connection
        mysqli_close($connection);
    ?>
        
    </body>
</html>
