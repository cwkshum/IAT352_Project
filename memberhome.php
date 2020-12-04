<?php 
  // checks if user is logged in
  include("auth_sessionNotActiveCheck.php"); 
  $inFolder = false;

  //connect to db 
  require("db.php");
?>

<!DOCTYPE html>
<html lang="en">
    
  <head>
    <title>Home | Member</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Linked Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/main.css"> 
    <link rel="stylesheet" type="text/css" href="css/memberhome.css"> 

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php 
      if(isset($_SESSION["email"])) {
        include ('navigation/member_navigation.php'); 
      }
    ?>

    <!-- Carousel Display -->
    <div class="slideshow-container">

      <!-- First Carousel Image Slide -->
      <div class="mySlides fade">
        <!-- Image -->
        <img src="img/mainheader1.png" alt="Adidas Superstar" class="img-width">
        <!-- Product Name and Link -->
        <div class="product-info-container">
          <h2 class="carousel-product-name">Adidas Superstar</h2>
          <a href='products/AdidasSuperstar20.php' class='shop-now'>Shop Item</a> 
        </div>  
      </div>

      <!-- Second Carousel Image Slide -->
      <div class="mySlides fade">
        <!-- Image -->
        <img src="img/mainheader2.png" alt="Nike Air Force" class="img-width">
        <!-- Product Name and Link -->
        <div class="product-info-container">
          <h2 class="carousel-product-name">Nike Air Force</h2>
          <a href='products/NikeAirForce1Low.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <!-- Third Carousel Image Slide -->
      <div class="mySlides fade">
        <!-- Image -->
        <img src="img/mainheader3.png" alt="Jordan Retro 13" class="img-width">
        <!-- Product Name and Link -->
        <div class="product-info-container">
          <h2 class="carousel-product-name">Jordan Retro 13</h2>
          <a href='products/JordanRetro13.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <!-- Carousel Control Arrows -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <!-- Carousel Indicator Dots -->
    <div class="indicator-dots">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    
    <!-- Linked Javascript File for Carousel Display -->
    <script src="js/main.js"></script>

    <?php
      //identify the customer id 
      $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
      $idResult = mysqli_query($connection, $idQuery); 
      $idNumber = mysqli_fetch_assoc($idResult);
      $cust_id = $idNumber["customer_id"];
    
      $query = "SELECT toggle_favourites, toggle_cart from customization WHERE customer_id = $cust_id";
      $toggleResult = mysqli_query($connection, $query); 
      // $num_results = mysqli_num_rows($toggleResult); 
      $rows = mysqli_fetch_assoc($toggleResult);
      $toggleFavourites = $rows['toggle_favourites'];
      $toggleCart = $rows['toggle_cart'];

      //start of PHP if-statement on line 150
      if($toggleFavourites){
    ?>
          
      <!-- Favourites Display Section -->
      <div class="product-container">
        <div class="title-container">
          <!-- Section title -->
          <h2>MY FAVOURITES</h2>
          <!-- See More Link -->
          <a href="my_account.php" class="seemore" >See More</a>
        </div>
      
        <!-- Favourite Products Display -->
        <div class="grid four-column add-gutters">
          <?php
            //identify the customer id 
            $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
            $idResult = mysqli_query($connection, $idQuery); 
            $idNumber = mysqli_fetch_assoc($idResult);
            $cust_id = $idNumber["customer_id"];
            
            // Retrieve a max of 4 favourited products that the member has added from the database
            $query = "SELECT product_brand, product_name, product_price FROM favourites WHERE customer_id = " .$cust_id . " LIMIT 4";

            $result = mysqli_query($connection, $query);
            $numResults = mysqli_num_rows($result);
            for ($i = 0; $i < $numResults; $i++) {
              $rows = mysqli_fetch_assoc($result); 
              $productName = $rows['product_name'];
              $productBrand = $rows['product_brand'];
              $productPrice = $rows['product_price'];


              $stripped = str_replace(' ', '', $productName);
              
              // Display Products in Favourites
              echo '<div class="unit-container">';
                  echo '<figure>';
                      // Product Image
                      echo '<a href="products/'. $stripped .'.php"> <img class="product-image" src="img/'. $stripped .'.png"> </a>';
                      // Product information
                      echo '<figcaption class="content-unit-text"><span class="product-name">'.$productName . '</span> <br><span class="price">$'. $productPrice .'</span>';
                  echo '</figure>';
              echo '</div>';
            } 
          ?>
        </div>
      </div>
  <?php
    //end of PHP if-statement on line 102 
    } 
    
    //add a divider if both customizations on toggled on 
    if($toggleFavourites && $toggleCart){
      echo "<hr>";
    }

    //start of PHP if-statemon on line 203
    if($toggleCart){
  ?>
      <!-- Cart Display Section -->
      <div class="product-container">
        <div class="title-container">
          <!-- Section title -->
          <h2>MY CART</h2>
          <!-- See More Link -->
          <a class="seemore" href="cart.php" >See More</a>
        </div>

        <!-- place holder for cart -->
        <div class="grid four-column add-gutters">
          <?php
            //identify the customer id 
            $idQuery = "SELECT customer_id FROM members WHERE email = '" . $_SESSION['email'] . "'"; 
            $idResult = mysqli_query($connection, $idQuery); 
            $idNumber = mysqli_fetch_assoc($idResult);
            $cust_id = $idNumber["customer_id"];
            
            // Retrieve a max of 4 products that the member has added to their cart from the database
            $query = "SELECT product_brand, product_name, product_size, product_price FROM cart WHERE customer_id = " .$cust_id . " LIMIT 4";

            $result = mysqli_query($connection, $query);
            $numResults = mysqli_num_rows($result);
            for ($i = 0; $i < $numResults; $i++) {
              $rows = mysqli_fetch_assoc($result); 
              $productName = $rows['product_name'];
              $productPrice = $rows['product_price']; 
              $productBrand = $rows['product_brand'];
              $productSize = $rows['product_size'];

              $stripped = str_replace(' ', '', $productName);
              
              // Display Products in Cart
              echo '<div class="unit-container">';
                echo '<figure class="cart-container">';
                  // Product Image
                  echo '<a href="products/'. $stripped .'.php"> <img class="product-image" src="img/'. $stripped .'.png"> </a>';
                  // Product Information
                  echo '<figcaption class="content-unit-text"><span class="product-name">'.$productName . '</span> <br><span class="price">$'. $productPrice .'</span> <br> <span class="size">Size: '. $productSize . '</span></figcaption>';
                echo '</figure>';
              echo "</div>";
            }
          ?>
        </div>
      </div>
    <?php
      //end of PHP if-statement on line 157
      }

      // Release the returned data
      mysqli_free_result($toggleResult);

      // Close the database connection
      mysqli_close($connection); 
    ?>
  </body>
</html>
   