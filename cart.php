<?php 
    // checks to see if the user is logged in
    include("auth_sessionNotActiveCheck.php"); 
    $inFolder = false;
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>My Cart</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Linked Stylesheets -->
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

        <!-- Header -->
        <header> 
            <h1>My Cart</h1>
        </header> 
        
        <!-- Cart Item Display Section -->
        <div class="grid add-gutters two-column">
            <div id="carts_display">
            <?php 
                if (isset($_SESSION['email'])) {

                    //identify the customer id 
                    $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
                    $idResult = mysqli_query($connection, $idQuery); 
                    $idNumber = mysqli_fetch_assoc($idResult);
                    $cust_id = $idNumber["customer_id"];
                    
                    // Retrieve the products that the member has added to their cart from the database
                    $query = "SELECT product_brand, product_name, product_size, product_price, product_id FROM cart WHERE customer_id = " .$cust_id;

                    $result = mysqli_query($connection, $query);
                    $numResults = mysqli_num_rows($result);
                    for ($i = 0; $i < $numResults; $i++) {
                        $rows = mysqli_fetch_assoc($result); 
                        $productName = $rows['product_name'];
                        $productPrice = $rows['product_price']; 
                        $productBrand = $rows['product_brand'];
                        $productSize = $rows['product_size'];
                        $productId = $rows['product_id'];


                        $stripped = str_replace(' ', '', $productName);
                        
                        // Display Products in Cart
                        echo '<div class="item-container">';
                            // Product Image
                            echo '<div class="product-image-container">';
                                echo '<a href="products/'. $stripped .'.php"> <img class="product-image" src="img/'. $stripped .'.png"> </a>';
                            echo '</div>';
                            // Product Information
                            echo '<div class="info-container">';
                                echo '<span class="product-name">'.$productName .'</span> <br><span class="price">$'. $productPrice .'</span> <br> <span class="size">Size: '. $productSize . '</span>';
                            echo '</div>';
                            // Cart Options
                            echo '<div class="cart-options">';
                                echo '<button value="' .$productName.'" name="'.$productSize. ' '.$productId.'" class="cart-options-links move-to">Move to Favourites</button> <p class="line-spacing">|</p> <button value="' .$productName. '" name="'.$productSize.'" class="cart-options-links remove-cart">Remove</button>';
                            echo '</div>';
                        echo "</div>";
                    }

                    // display a message if the user has nothing in their cart
                    if ($numResults == 0) {
                        echo '<div class="item-container">';
                            echo "<p>You currently have nothing in your cart.</p>";
                        echo "</div>";
                    }
                }
            ?> 
            </div>
            
            <!-- Cart Checkout information -->
            <div id="checkout_display">
                <div class="checkout-info">
                    <?php 
                        // display the number of items in their cart 
                        echo '<h3>Items: ' . $numResults . '</h3>';
                    
                        // query for retreiving the total price for products
                        $totalQuery = "SELECT SUM(product_price) FROM cart WHERE customer_id = " .$cust_id;

                        $priceResult= mysqli_query($connection, $totalQuery);
                        $fetchTotal = mysqli_fetch_assoc($priceResult);
                        $total = $fetchTotal["SUM(product_price)"];

                        // if there are no items in the cart and total is null, display $0.00
                        if($total == ''){
                            echo '<h3>Total: $0.00</h3>';
                        } else{
                            // display the total
                            echo '<h3>Total: $' . $total . '</h3>';
                        }
                    ?> 
                    <!-- Favourites Link -->
                    <a href="my_account.php">View Favourites</a>
                    <!-- Checkout Button -->
                    <div class="checkout">
                        <a href="" class="checkout-button">Check&nbsp;Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Linked JavaScript Files -->
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="js/remove_cart.js"></script>  
    <script src="js/move_to_favourites.js"></script>  

    <?php
        // Release the returned data
        mysqli_free_result($result);

        // Close the database connection
        mysqli_close($connection);
    ?>
        
    </body>
</html>
