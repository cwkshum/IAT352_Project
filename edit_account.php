<?php
    // checks to see if the user is logged in
    include("auth_sessionNotActiveCheck.php"); 
    $inFolder = false;
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Edit Account</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/edit_account.css"> 

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
                // retrieve the member's current account information from the database
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

        <!-- Edit Account Information From -->
        <div class="account-container">  
            <h1>My Account</h1>
            <form action="edit_account.php" method="post">
                <!-- First Name -->
                <div class="form-section">
                    <label for="first_name">First Name</label><br>
                    <input type="text" id="first_name" name="first_name" placeholder="<?php echo $firstName ?>">
                </div>

                <!-- Last Name -->
                <div class="form-section">
                    <label for="last_name">Last Name</label><br>
                    <input type="text" id="last_name" name="last_name" placeholder="<?php echo $lastName ?>">
                </div>

                <!-- Email -->
                <div class="form-section">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="<?php echo $email ?>">
                </div>

                <!-- Password -->
                <div class="form-section">
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="******">
                </div>

                <!-- Submit the form -->
                <div class="save">
                    <input class="button" type="submit" name="submit" value="Save">
                </div>
            </form>

        

            <?php
                $updateQuery = ""; 
                $editQuery = "";
                $input_error = false; 
                
                if (isset($_POST["submit"])){
                    
                    // Form handling for first name input
                    if(!empty($_POST["first_name"])) {
                        // check if name only contains letters and whitespace
                        if (!preg_match("/^[a-zA-Z ]+$/", $_POST["first_name"])) {
                            $nameError = "Only letters and white space allowed";
                            echo $nameError; 
                            $input_error = true; 
                        } else {
                            $firstName = $_POST["first_name"];
                            $updateQuery .= "first_name = '" .$firstName . "'";
                        }
                    }
                    
                    // form handling for last name input
                    if(!empty($_POST["last_name"])) {
                        // check if name only contains letters and whitespace
                        if (!preg_match("/^[a-zA-Z ]+$/", $_POST["last_name"])) {
                            $nameError = "Only letters and white space allowed";
                            echo $nameError; 
                            $input_error = true; 
                        } else {
                            $lastName = $_POST["last_name"];
                            if(!empty($updateQuery)) {
                                $updateQuery .= ", last_name = '".$lastName. "'";
                            } else {
                                $updateQuery .= "last_name = '".$lastName. "'";
                            }
                        }
                    }

                    // form handling for the email input 
                    if(!empty($_POST["email"])) {
                        // checks if there are any errors in the email input
                        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                            $email_error = "Invalid email format";
                            echo $email_error;
                            $input_error = true; 
                        } else {
                            $email = $_POST["email"];

                            if(!empty($updateQuery)) {
                                $updateQuery .= ", email = '".$email. "'";
                            } else {
                                $updateQuery .= "email = '".$email. "'";
                            }
                        }
                    }

                    // form handling for the password
                    if(!empty($_POST["password"])) {
                        $password = $_POST["password"];
                        
                        if(!empty($updateQuery)) {
                            $updateQuery .= ", password = '".md5($password). "'";
                        } else {
                            $updateQuery .= "password = '".md5($password). "'";
                        }
                    }

                    //check if the updated information is used in the database 
                    $query = "SELECT * FROM members WHERE email = '$email'";
                    $result = mysqli_query($connection, $query) or die(mysql_error());
                    
                    $rows = mysqli_num_rows($result);

                    
                    //if an email hasn't been previously registered, or there aren't input errors, update the member information
                    if(!$input_error && $rows == 0){
                        $editQuery = "UPDATE members SET ". $updateQuery . " WHERE email = '" .$_SESSION['email'] ."'"; 
                        $editResult = mysqli_query($connection, $editQuery);
                        $newEmail = $email; 
                        $_SESSION['email'] = $newEmail;
                        
                        header("Location: my_account.php");
                    
                    //if the user is changing information but keeping their old email, do not get them an "this email has already been registered error" 
                    } else if ($rows == 1 && $_SESSION['email'] == $email) {
                        $editQuery = "UPDATE members SET ". $updateQuery . " WHERE email = '" .$_SESSION['email'] ."'"; 
                        $editResult = mysqli_query($connection, $editQuery);
                        header("Location: my_account.php");

            
                    //if their new updated email has already been registered, output an error 
                    } else if ($rows == 1 && $_SESSION['email'] != $email) {
                        echo "<h3>It appears this email has already been registered.</h3>";
                    }

                }
            ?> 

        </div> 
        
        <!-- Display Favourites Section -->
        <div class="favourites-container"> 
            <h2>My Favourites</h2>

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
                                // Product Image
                                echo '<figure>';
                                    echo '<a href="products/'. $stripped .'.php"> <img class="product-image" src="img/'. $stripped .'.png"> </a>';
                                    echo '<figcaption class="content-unit-text"><span class="product-name">'.$productName . '</span> <br><span class="price">$'. $productPrice .'</span> <br>
                                    <span class="price">Remove from Favourites</span></figcaption>';
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

    <?php
        // Release the returned data
        mysqli_free_result($result);

        // Close the database connection
        mysqli_close($connection);
    ?>
        
    </body>
</html>