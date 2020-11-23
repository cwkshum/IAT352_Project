<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Nike Air Max 97</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="../css/main.css"> 
        <link rel="stylesheet" type="text/css" href="../css/products/content_details.css"> 
        <link rel="stylesheet" type="text/css" href="../css/products/nike_air_max_97.css"> 
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    </head>

    <?php
		//connect to db 
        require("../db.php");
	?>


    <body>

        <!-- Navigation -->
        <?php 
            $inFolder = true;  
            include("../public_sessionActiveCheck.php"); 
        ?>

        <!-- headers must be called before echo statements - users need to be logged in to add to cart -->
        <?php
            if (!isset($_SESSION['email']) && isset($_POST["cart"])) { 
                //redirect visitors to login to add items to their cart 
                header("location: ../login.php");                        
            }        
        ?>

        <!-- Fetch product name, price, description, and color from db -->
        <?php
            // Query to retrieve product information for page
            $query = "SELECT products.name, products.price, products.description, products.colour, products.product_id, products.brand FROM products WHERE products.name = 'Nike Air Max 97'"; 
            $result = mysqli_query($connection, $query); 

            //identify which gender category this shoe is
            $genderQuery = "SELECT products.gender FROM products WHERE products.name = 'Nike Air Max 97'"; 
            $genderResult = mysqli_query($connection, $genderQuery);
        ?>

        <div class="grid two-column add-gutters">
            
            <!-- shoe image -->
            <section>
                <img src="../img/NikeAirMax97.png" class="scale-img box-shadow">
            </section>
            
            <!-- item details -->
            <section>

                <?php
                    //define whether the shoe is unisex/women/men
                    $men = false;
                    $women = false;

                    $num_gender = mysqli_num_rows($genderResult);
                    for($i = 0; $i < $num_gender; $i++){
                        $row = mysqli_fetch_assoc($genderResult);
                        $gender = $row["gender"];
                        if($gender == "Men"){
                            $men = true;
                        } else if ($gender == "Women"){
                            $women = true;
                        }
                    }

                    if($men && $women){
                        $displayGender = "Men/Women"; 
                    } else if($men){
                        $displayGender = "Men";
                    } else if($women){
                        $displayGender = "Women";
                    } 
                    
                    //Retrieve product information from database 
                    for ($i = 0; $i < 1; $i++) {
                        $row = mysqli_fetch_assoc($result);
                        // display product name
                        $productName = $row["name"]; 
                        echo "<h1>".$productName."</h1>";

                        //display gender 
                        $productGender = $displayGender; 
                        echo "<h2>".$displayGender."</h2>"; 

                        // display product price
                        $productPrice = $row["price"]; 
                        echo "<h3 class='price'>$".$productPrice."</h3>";
                        
                        // diplay product description
                        echo "<h4>Description</h4>";
                        echo "<p>".$row["description"]."</p>";

                        //product id 
                        $product_id = $row["product_id"];

                        $productBrand = $row["brand"];
                    }
                ?>

                <!-- item color selection -->
                <h4 class="spacing bold">Colour</h4> 
                <button type="button" class="colour-button"></button>

                <!-- item size selection -->
                <h4 class="spacing bold">Size</h4>
               
                <?php
                    //parse a new query to return all sizes that shoe is offered in 
                    $sizeQuery = "SELECT products.size FROM products WHERE products.name = 'Nike Air Max 97'"; 
                
                    $sizeList = mysqli_query($connection, $sizeQuery); 
                    echo '<form action="NikeAirMax97.php" method="post">';
                    //iterate through how many sizes there are and display them as buttons/options for the customer 
                    $num_sizes = mysqli_num_rows($sizeList);
                    for ($i = 0; $i < $num_sizes; $i++) {
                        $row = mysqli_fetch_assoc($sizeList);
                        $size = $row["size"];
                        echo '<label class="container">'. $size;
                        echo '<input type="radio" id="'. $size . '" name="shoeSize" value ="'. $size . '"'; 
                        // if(isset($_POST['shoeSize'])){
                        //     echo " checked";
                        // } 
                        echo ">";
                        echo '<span class="checkmark"></span>';
                        echo "</label>";
                    }
                ?>
                
                <br>

                <?php 
                    $sizeSelected = false; 
                    if (isset($_POST['shoeSize'])) { 
                        $sizeSelected = true; 
                        $productSize = $_POST['shoeSize']; 
                    }
                ?> 

                <?php 
                    // check if a session is in progress, otherwise visitors will be redirected to a sign-up page when they wish to add items to their cart 
                    if (isset($_SESSION['email'])) {
                       
                        //identify the customer id 
                        $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
                        $idResult = mysqli_query($connection, $idQuery); 
                        $idNumber = mysqli_fetch_assoc($idResult);
                        $cust_id = $idNumber["customer_id"];

                        if (isset($_POST["cart"]) && $sizeSelected){

                            //insert product information into the member cart 
                            $addToCartQuery = "INSERT into cart (product_id, product_name, product_brand, product_price, product_size, customer_id) VALUES ($product_id, '$productName', '$productBrand', $productPrice, $productSize, $cust_id)";
                            // echo $query;
                            $addResult = mysqli_query($connection, $addToCartQuery);
                            
                             //when the item has been succesfully added to their cart show them a message
                             if($addResult) {
                                echo "<p class='message'>The item has been added to your cart!</p>";
                            } else { 
                                echo "<p class='message'> Unable to add item to cart. <p>";
                            }
                        
                        } else if(isset($_POST["cart"]) && !$sizeSelected){
                            echo "<p class='message'>Please select a size. </p>";
                        }

                        if (isset($_POST["favourites"])){

                            //Check if this item has already been added to favourites
                            $favQuery = "SELECT product_name FROM favourites WHERE product_name ='" . $productName. "'";
                            $favResult = mysqli_query($connection, $favQuery) or die(mysql_error());
            
                            $num_results = mysqli_num_rows($favResult); 
                            $rows = mysqli_fetch_assoc($favResult);
                            
                            // if the item has not been added, proceed
                            if($num_results == 0){
                                //insert product information into favourites
                                $addToFavouriteQuery = "INSERT into favourites (product_id, product_name, product_brand, product_price, customer_id) VALUES ($product_id, '$productName', '$productBrand', $productPrice, $cust_id)";
    
                                // echo $query;
                                $addResult = mysqli_query($connection, $addToFavouriteQuery);
    
                                
                                //when the item has been succesfully added to their favourites show them a message
                                if($addResult) {
                                    echo "<p class='message'>The item has been added to your favourites!</p>";
                                } 
                            } else { 
                                echo "<p class='message'> Item is already in your favourites. <p>"; 
                            }
                        
                        }

                    }

                    

                ?> 

                <!-- Cart and Favourites Button -->
                <div class="spacing">
                        <input class="cart-button" type="submit" name="cart" value="Add to Cart">
                        <input class="favourites-button" type="submit" name="favourites" value="Add to Favourites">
                    </form>
                </div>

            </section>
        </div>
        <?php
            // Release the returned data
            mysqli_free_result($result);

            // Close the database connection
			mysqli_close($connection);
        ?>
    </body>
</html>