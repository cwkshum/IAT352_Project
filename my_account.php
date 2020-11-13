<?php 
    include("auth_sessionNotActiveCheck.php"); 
    $inFolder = false;
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>My Account</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <div class="account-container"> 
            <h1>My Account</h1>
            <h2>Hello, <?php echo $firstName." ". $lastName ?>!</h2>
            
            <h3>Email Address</h3>
            <p><?php echo $email ?></p>
            
            <h3>Password</h3>
            <p>*******</p>
            
            <h3>Date of Birth</h3>
            <p><?php echo $dob ?></p>

            <div class="edit">
                <a class="button" href="edit_account.php">Edit</a>
            </div>

            
        </div> 

        <div class="favourites-container"> 
        <h2>My Favourites</h2>

        <!-- favourite place holders -->
        <div class="grid two-column add-gutters">

            <div class="unit-container">
                <figure>
                    <a href="products/NikeAirMax97.php"> <img class="product-image" src="img/NikeAirMax97.png"> </a>
                    <figcaption class="content-unit-text"><span class="product-name">Nike Air Max 97</span><br><span class="price">$170</span></figcaption>
                </figure>
            </div>

            <div class="unit-container">
                <figure>
                    <a href="products/JordanRetro13.php"> <img class="product-image" src="img/JordanRetro13.png"> </a>
                    <figcaption class="content-unit-text"><span class="product-name">Jordan Retro 13</span><br><span class="price">$190</span></figcaption>
                </figure>
            </div>

            <div class="unit-container">
                <figure>
                    <a href="products/PUMADefyMidBuckle.php"> <img class="product-image" src="img/PUMADefyMidBuckle.png"> </a>
                    <figcaption class="content-unit-text"><span class="product-name">PUMA Defy Mid Buckle</span><br><span class="price">$100</span></figcaption>
                </figure>
            </div>

            <div class="unit-container">
                <figure>
                    <a href="products/UGGClassicMini.php"> <img class="product-image" src="img/UGGClassicMini.png"> </a>
                    <figcaption class="content-unit-text"><span class="product-name">UGG Classic Mini</span><br><span class="price">$150</span></figcaption>
                </figure>
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