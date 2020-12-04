<?php 
    // checks to see if the user is logged in 
    include("auth_sessionNotActiveCheck.php"); 
    $inFolder = false;
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>My Account</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Linked Stylesheets -->
        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/my_account.css"> 

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

        <?php
            if (isset($_SESSION['email'])) {
                // Retrieve the member's account information from the database
                $query = "SELECT email, first_name, last_name, dob, password FROM members WHERE email ='" . $_SESSION['email'] . "'"; 
                
                $result = mysqli_query($connection, $query);

                $numResults = mysqli_num_rows($result);
                for($i = 0; $i < $numResults; $i++) {
                    $row = mysqli_fetch_assoc($result); 
                    $firstName = $row['first_name'];
                    $lastName = $row['last_name']; 
                    $email = $row['email']; 
                    $dob = $row['dob'];
                    $password = $row['password'];
                }

            }
        ?>

        <!-- Display the member's account information -->
        <div class="account-container"> 
            <h1>My Account</h1>
            <!-- name display -->
            <h2>Hello, <?php echo $firstName." ". $lastName ?>!</h2>
            
            <!-- email display -->
            <h3>Email Address</h3>
            <p class="account-info"><?php echo $email ?></p>
            
            <!-- hidden password display -->
            <h3>Password</h3>
            <p class="account-info">*******</p>
            
            <!-- date of birth display -->
            <h3>Date of Birth</h3>
            <p class="account-info"><?php echo $dob ?></p>

            <!-- edit account information -->
            <div class="edit">
                <a class="button" href="edit_account.php">Edit</a>
            </div>

            <br>
            <hr> 

            <div>
                <?php
                    //identify the customer id 
                    $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
                    $idResult = mysqli_query($connection, $idQuery); 
                    $idNumber = mysqli_fetch_assoc($idResult);
                    $cust_id = $idNumber["customer_id"];

                    //retrieve the customer customization from the DB 
                    $query = "SELECT toggle_favourites, toggle_cart FROM customization WHERE customer_id = " . $cust_id; 
                    $result = mysqli_query($connection, $query);
                    $rows = mysqli_fetch_assoc($result);
                    $toggleFavourites = $rows["toggle_favourites"]; 
                    $toggleCart = $rows["toggle_cart"];
                ?>
                <!-- Setting Home Page Display Preference -->
                <h3 class="home-preferences">Home Page Preferences</h3>

                <!-- Toggle Favourites Display Checkbox -->
                <input type="checkbox" id="toggle_favourites" name="toggle_favourites" value="false" class="favourites common_selector" 
                <?php if($toggleFavourites) echo "checked='checked'";?>>
                <label for="toggle_favourites">Show Favourites</label><br>

                <!-- Toggle Cart Display Checkbox -->
                <input type="checkbox" id="toggle_cart" name="toggle_cart" value="false" class="cart common_selector" 
                <?php if($toggleCart) echo "checked='checked'";?>>
                <label for="toggle_cart">Show Cart</label><br>
            </div> 

        </div> 

        <!-- Display Favourites Section -->
        <div class="favourites-container"> 
            <h2>My Favourites</h2>
          
            <div id="favourites_display">
                <div class="grid two-column add-gutters">
                <?php
                    if (isset($_SESSION['email'])) {

                        //identify the customer id 
                        $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
                        $idResult = mysqli_query($connection, $idQuery); 
                        $idNumber = mysqli_fetch_assoc($idResult);
                        $cust_id = $idNumber["customer_id"];
                        
                        // Retrieve the products that the member has added to their cart from the database
                        $query = "SELECT product_brand, product_name, product_price FROM favourites WHERE customer_id = " .$cust_id;

                        $result = mysqli_query($connection, $query);
                        $numResults = mysqli_num_rows($result);
                        for ($i = 0; $i < $numResults; $i++) {
                            $rows = mysqli_fetch_assoc($result); 
                            $productName = $rows['product_name'];
                            $productBrand = $rows['product_brand'];
                            $productPrice = $rows['product_price'];


                            $stripped = str_replace(' ', '', $productName);
                            
                            // Display Products in Cart
                            echo '<div class="unit-container">';
                                echo '<figure>';
                                    // Product Image
                                    echo '<a href="products/'. $stripped .'.php"> <img class="product-image" src="img/'. $stripped .'.png"> </a>';
                                    // Product Information
                                    echo '<figcaption class="content-unit-text"><span class="product-name">'.$productName . '</span> <br><span class="price">$'. $productPrice .'</span> <br>
                                    <button value="' .$productName. '" class="remove-favourites">Remove from Favourites</button></figcaption>';
                                echo '</figure>';
                            echo '</div>';
                        } 

                        if ($numResults == 0) {
                            echo "<p>You currently have nothing in your favourites.</p>";
                        }
                    }
                ?>
                </div>
            </div>
        </div>
        
        <!-- Linked Javascript -->
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="js/customization.js"></script>  
        <script src="js/remove_favourites.js"></script>  

        <?php
            // Release the returned data
            mysqli_free_result($result);

            // Close the database connection
            mysqli_close($connection);
        ?>
        
    </body>
</html>