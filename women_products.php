<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Womens Products</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/content.css"> 

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
            $inFolder = false;
            include("public_sessionActiveCheck.php"); 
        ?> 
        
        <!-- hero image -->
        <header>
            <div class="small-header">
                <img src="img/hero1.jpg" class="small-header-image">
            </div>
        </header>

        <!-- filters --> 
        <div class="filter-flexbox-container"> 
            <form action="women_products.php" method="post" class="filter-flex-item">
               
               <!-- Filter Selection for Brands -->
                <h4>BRAND</h4> 
                
                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Adidas" name="Adidas" value="Adidas" <?php if(isset($_POST['Adidas'])) echo "checked='checked'"; ?>>
                    <label for="Adidas">Adidas</label><br>
                </div>

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Nike" name="Nike" value="Nike" <?php if(isset($_POST['Nike'])) echo "checked='checked'"; ?>>
                    <label for="Nike">Nike</label><br>
                </div>

                <!-- <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Jordan" name="Jordan" value="Jordan" <//?php if(isset($_POST['Jordan'])) echo "checked='checked'"; ?>>
                    <label for="Jordan">Jordan</label><br>
                </div> -->

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="PUMA" name="PUMA" value="PUMA" <?php if(isset($_POST['PUMA'])) echo "checked='checked'"; ?>>
                    <label for="PUMA">PUMA</label><br>
                </div>

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Timberland" name="Timberland" value="Timberland" <?php if(isset($_POST['Timberland'])) echo "checked='checked'"; ?>>
                    <label for="Timberland">Timberland</label><br>
                </div>
                
                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="UGG" name="UGG" value="UGG" <?php if(isset($_POST['UGG'])) echo "checked='checked'"; ?>>
                    <label for="UGG">UGG</label><br>
                </div>

                <!-- Filter Selection for Colour -->
                <h4>COLOUR</h4> 
                <div class="color-container grid three-column add-gutters">

                    <label class="container">
                        <input type="checkbox" id="White" name="White" value ="White" <?php if(isset($_POST['White'])) echo "checked='checked'"; ?>>
                        <span class="checkmark white-button"></span>
                    </label>

                    <label class="container">
                        <input type="checkbox" id="Beige" name="Beige" value ="Beige" <?php if(isset($_POST['Beige'])) echo "checked='checked'"; ?>>
                        <span class="checkmark beige-button"></span>
                    </label>

                    <label class="container">
                        <input type="checkbox" id="Green" name="Green" value ="Green" <?php if(isset($_POST['Green'])) echo "checked='checked'"; ?>>
                        <span class="checkmark green-button"></span>
                    </label>

                    <label class="container">
                        <input type="checkbox" id="Black" name="Black" value ="Black" <?php if(isset($_POST['Black'])) echo "checked='checked'"; ?>>
                        <span class="checkmark black-button"></span>
                    </label>

                    <label class="container">
                        <input type="checkbox" id="Red" name="Red" value ="Red" <?php if(isset($_POST['Red'])) echo "checked='checked'"; ?>>
                        <span class="checkmark red-button"></span>
                    </label>
                </div>

                <!-- Filter Selection for Sizes -->
                <h4>SIZE</h4>
                <?php
                    echo '<ul class="grid three-column filter-add-gutters size-filter-spacing">';
                    for ($i = 5; $i < 19; $i++) { 
                        $shoeSize = $i;

                        echo '<div>';
                            echo '<input type="checkbox" id="shoeSize" name="'. $shoeSize .'"value=" '. $shoeSize .'" ';
                            if(isset($_POST[$shoeSize])){
                                echo 'checked="checked"';
                            } 
                            echo ">";
                            echo '<label for="shoeSize">'. ' ' .$shoeSize.'</label>'; 
                        echo '</div>';
                    }
                    echo "</ul>";
                ?> 
                <!-- Submit Filter Request Button -->
                <input type="submit" name="submit" value="Filter Products" class="button">
            </form>

        </div> 

        <?php
    
            $filterSelected = false;

            // checks to see if form has been submitted 
            if (isset($_POST["submit"])){
                $Adidas = "";
                $Nike = "";
               // $Jordan = "";
                $Timberland = "";
                $PUMA = "";
                $UGG = "";
                
                $white = "";
                $beige = "";
                $green = "";
                $black = "";
                $red = "";

                $shoeSize = "";
                
                $whereBrandQuery = "";
                $whereColourQuery = "";
                $whereSizeQuery = "";
                $whereQuery = "";
                                
                // Filter Handling for Brands
				if(!empty($_POST["Adidas"])) {
                    $Adidas = $_POST["Adidas"];
                    // adds where statement to the query 
                    $whereBrandQuery .= "products.brand = "."'". $Adidas. "'";
                }


                if(!empty($_POST["Nike"])) {
                    $Nike = $_POST["Nike"];
                    
                    // adds where statement to the query 
                    if(!empty($whereBrandQuery)) {
                        $whereBrandQuery .= " OR products.brand = "."'".$Nike. "'";
                    } else {
                        $whereBrandQuery .= "products.brand = "."'".$Nike. "'";
                    }
                }

                
                // if(!empty($_POST["Jordan"])) {
                    
				// 	$Jordan = $_POST["Jordan"];
				// 	if(!empty($whereBrandQuery)) {
                //         $whereBrandQuery .= " OR products.brand = "."'".$Jordan. "'";
                //     } else {
                //         $whereBrandQuery .= "products.brand = "."'".$Jordan. "'";
                //     }
                // }


                if(!empty($_POST["Timberland"])) {
                    $Timberland = $_POST["Timberland"];
                    
					// adds where statement to the query 
					if(!empty($whereBrandQuery)) {
                        $whereBrandQuery .= " OR products.brand = "."'".$Timberland. "'";
                    } else {
                        $whereBrandQuery .= "products.brand = "."'".$Timberland. "'";
                    }
                }


                if(!empty($_POST["PUMA"])) {
					$PUMA = $_POST["PUMA"];
                    
                    // adds where statement to the query 
                    if(!empty($whereBrandQuery)) {
                        $whereBrandQuery .= " OR products.brand = "."'".$PUMA. "'";
                    } else {
                        $whereBrandQuery .= "products.brand = "."'".$PUMA. "'";
                    }
                }
                

                if(!empty($_POST["UGG"])) {
					$UGG = $_POST["UGG"];
                   
                    // adds where statement to the query 
					if(!empty($whereBrandQuery)) {
                        $whereBrandQuery .= " OR products.brand = "."'".$UGG. "'";
                    } else {
                        $whereBrandQuery .= "products.brand = "."'".$UGG. "'";
                    }
                }

                if (!empty($whereBrandQuery)) {
                    $whereQuery .= " (" . $whereBrandQuery . ") ";
                } 

                // Filter Handling for Colours
                if(!empty($_POST["White"])) {
                    $white = $_POST["White"];

                    $whereColourQuery .= "products.colour = "."'".$white. "'";
                }
                

                if(!empty($_POST["Beige"])) {
                    $beige = $_POST["Beige"];

                    if(empty($whereColourQuery)) {
                        $whereColourQuery .= "products.colour = "."'".$beige. "'";
                    } else if(!empty($whereColourQuery)){
                        $whereColourQuery .= " OR products.colour = "."'".$beige. "'";
                    } 
                }
                
                
                if(!empty($_POST["Green"])) {
                    $green = $_POST["Green"];
                    
					if(empty($whereColourQuery)) {
                        $whereColourQuery .= "products.colour = "."'".$green. "'";
                    } else if(!empty($whereColourQuery)){
                        $whereColourQuery .= " OR products.colour = "."'".$green. "'";
                    } 
                }
                

                if(!empty($_POST["Black"])) {
                    $black = $_POST["Black"];
                    
                    if(empty($whereColourQuery)) {
                        $whereColourQuery .= "products.colour = "."'".$black. "'";
                    } else if(!empty($whereColourQuery)){
                        $whereColourQuery .= " OR products.colour = "."'".$black. "'";
                    } 
                }
                
                if(!empty($_POST["Red"])) {
                    $red = $_POST["Red"];
                    
					if(empty($whereColourQuery)) {
                        $whereColourQuery .= "products.colour = "."'".$red. "'";
                    } else if(!empty($whereColourQuery)){
                        $whereColourQuery .= " OR products.colour = "."'".$red. "'";
                    } 
                }
                
                //if there are multiple color filters selected, find either or both options depending on what is available 
                if (!empty($whereColourQuery) && !empty($whereQuery)) {
                    $whereQuery .= " AND (" . $whereColourQuery . ") ";
                } else if (!empty($whereColourQuery) && empty($whereQuery)) {
                    $whereQuery .= " (" . $whereColourQuery . ") ";
                }
                    

                // Filter Handling for Shoe Sizes
                //loop through the database to find all sizes the store offers
                for ($i = 5; $i < 19; $i++) { 
                    $shoeSize = $i;
                   
                    //if a filter for size has been selected, keep that information
                    if(!empty($_POST[$shoeSize])) {
                        $size = $_POST[$shoeSize];
                        
                        if(empty($whereSizeQuery)) {
                            $whereSizeQuery .= "products.size = "."'".$size. "'";
                        } else if(!empty($whereSizeQuery)){
                            $whereSizeQuery .= " OR products.size = "."'".$size. "'";
                        } 
                    }    
                }

                if (!empty($whereSizeQuery) && !empty($whereQuery)) {
                    $whereQuery .= " AND (" . $whereSizeQuery . ") ";
                } else if (!empty($whereSizeQuery) && empty($whereQuery)) {
                    $whereQuery .= " (" . $whereSizeQuery . ") ";
                }
                
                // Indicates that the user has filtered the products
                if (!empty($whereQuery)) {
                    $filterSelected = true;
                }
                
                // query based on the user's filtered request
                $filterQuery = "SELECT products.name, products.gender, products.price FROM products WHERE " . $whereQuery . " AND  products.gender = 'Women'"; 
            }
        
        ?>
        
        <!-- Products Display Section -->
        <div class="content-container"> 
       
            <h1>Womens Shoes</h1>
            <div class="grid units-add-gutters three-column">
            
                <?php
                    if ($filterSelected) {
                        // use the query for the filtered request
                        $contentQuery = $filterQuery. " GROUP BY products.name"; 
                    } else {
                        // display all womens products
                        $contentQuery = "SELECT p.name, p.price, p.gender FROM products p WHERE p.gender = 'Women' GROUP BY p.name"; 
                    }

                    $contentResults = mysqli_query($connection, $contentQuery);

                    // Retrieve products from the database
                    $numResults = mysqli_num_rows($contentResults); 
                    for ($i = 0; $i < $numResults; $i++) {
                        $row = mysqli_fetch_assoc($contentResults);
                        $productName = $row['name'];
                        $productPrice = $row['price']; 
                        $gender = $row['gender'];

                        $stripped = str_replace(' ', '', $productName);

                        // display the content units
                        echo '<div class="unit-container">';
                            echo '<figure>';
                                echo '<a href="products/'. $stripped .'.php"> <img class="product-image" src="img/'. $stripped .'.png"> </a>';
                                echo '<figcaption class="content-unit-text"> <span class="product-name">'. $productName .'</span><br>'. $gender .'<br> <span class="price">$'. $productPrice .'</span></figcaption>';
                            echo '</figure>';
                        echo '</div>';
                        
                    }

                    // display a message if there aren't any products matching the filters
                    if ($numResults == 0) {
                        echo "Uh oh! It appears we don't have any matching products.";
                    }
                ?>
                
            </div>
        </div>
        
        <?php
            // Release the returned data
            mysqli_free_result($contentResults);

            // Close the database connection
			mysqli_close($connection);
        ?>
        
    </body>
</html>