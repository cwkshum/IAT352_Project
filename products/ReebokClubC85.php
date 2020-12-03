<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Reebok Club C 85</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="../css/main.css"> 
        <link rel="stylesheet" type="text/css" href="../css/products/content_details.css"> 
        
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

        <!-- Fetch product name, price, description, and color from db -->
        <?php
            // Query to retrieve product information for page
            $query = "SELECT products.name, products.price, products.description, products.colour, products.product_id, products.brand FROM products WHERE products.name = 'Reebok Club C 85'"; 
            $result = mysqli_query($connection, $query); 

            //identify which gender category this shoe is
            $genderQuery = "SELECT products.gender FROM products WHERE products.name = 'Reebok Club C 85'"; 
            $genderResult = mysqli_query($connection, $genderQuery);
        ?>

        <div class="grid two-column add-gutters">
            
            <!-- shoe image -->
            <section>
                <img src="../img/ReebokClubC85.png" class="scale-img box-shadow">
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
                <button type="button" class="white-button"></button>

                <!-- item size selection -->
                <h4 class="spacing bold">Size</h4>
               
                <?php
                    // Mens sizes
                    $sizeMenQuery = "SELECT products.size FROM products WHERE products.name = 'Reebok Club C 85' AND products.gender = 'Men'"; 
                    $sizeMenList = mysqli_query($connection, $sizeMenQuery); 
                    //iterate through how many sizes there are and display them as buttons/options for the customer 
                    $num_men_sizes = mysqli_num_rows($sizeMenList);

                    echo '<h4 class="lighter">Mens</h4>';
                    echo '<div class="grid add-size-gutters five-column">';
                        for ($i = 0; $i < $num_men_sizes; $i++) {
                            $row = mysqli_fetch_assoc($sizeMenList);
                            $size = $row["size"];
                            echo '<div ="uniform-styling">';
                                echo '<label class="container">'. $size;
                                echo '<input type="radio" id="'. $size . '" name="shoeSize" value ="'. $size . '" >';
                                echo '<span class="checkmark"></span>';
                                echo "</label>";
                            echo '</div>';
                        }
                    echo '</div>';

                    // Womens Sizes 
                    $sizeWomenQuery = "SELECT products.size FROM products WHERE products.name = 'Reebok Club C 85' AND products.gender = 'Women'"; 
                    $sizeWomenList = mysqli_query($connection, $sizeWomenQuery); 
                    //iterate through how many sizes there are and display them as buttons/options for the customer 
                    $num_women_sizes = mysqli_num_rows($sizeWomenList);

                    echo '<h4 class="lighter">Womens</h4>';
                    echo '<div class="grid add-size-gutters five-column">';
                        for ($i = 0; $i < $num_women_sizes; $i++) {
                            $row = mysqli_fetch_assoc($sizeWomenList);
                            $size = $row["size"];
                            echo '<div ="uniform-styling">';
                                echo '<label class="container">'. $size;
                                echo '<input type="radio" id="'. $size . '" name="shoeSize" value ="'. $size . '" >';
                                echo '<span class="checkmark"></span>';
                                echo "</label>";
                            echo '</div>';
                        }
                    echo '</div>';
                ?>
                
                <br>
                   
                <!-- Cart and Favourites Button -->
                <span id="button-message"></span>
                <div class="spacing">
                    <!-- <input class="cart-button" type="submit" name="cart" value="Add to Cart"> -->
                    <button class="cart-button" name ="Reebok Club C 85">Add to Cart</button>
                
                    <!-- <input class="favourites-button" type="submit" name="favourites" value="Add to Favourites"> -->
                    <button class="favourites-button" name ="Reebok Club C 85">Add to Favourites</button>
                </div>

            </section>
        </div>

        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="../js/content_action_msg.js"></script>  

        <?php
            // Release the returned data
            mysqli_free_result($result);

            // Close the database connection
			mysqli_close($connection);
        ?>
    </body>
</html>