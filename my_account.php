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

            <a class="button" href="edit_account.php">Edit</a>

            
        </div> 

        <div class="favourites-container"> 
        <h2>My Favourites</h2>

<div class="card_group ">
<a href="about.html"><div class="homepage_card">
 <img  src="img/NikeAirMax97.png" alt="Building" class="subsection_heading" style="width:100%" height="380">
 <h3>NIKE AIR MAX 97</h3>
 <p class="pricesize"> $170 </p>

</div> </a>

<a href="product_page.html"><div class="homepage_card">
 <img src="img/JordanRetro13.png" alt="Ham and Swiss Omelet" class="subsection_heading" style="width:100%">
 <h3>JORDAN RETRO 13</h3>
 <p class="pricesize"> $190 </p></p>
</div></a>

<a href="about.html"><div class="homepage_card">
 <img src="img/PUMADefyMidBuckle.png" alt="Entrees" class="subsection_heading" style="width:100%">
 <h3>PUMA DEFY MID BUCKLE</h3>
 <p class="pricesize"> $100 </p>  
     </div></a>

<a href="about.html"><div class="homepage_card">
 <img src="img/UGGClassicMini.png" alt="Entrees" class="subsection_heading" style="width:100%">
 <h3>UGG Classic Mini</h3>
 <p class="pricesize"> $150 </p>  
     </div></a>
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