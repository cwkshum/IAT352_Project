<?php 
    include("auth_sessionNotActiveCheck.php"); 
    $inFolder = false;
?>

<!DOCTYPE html>
<html lang="en">
    
  <head>
    <title>Home | Member</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- javascript file linked -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/main.css"> 
    <link rel="stylesheet" type="text/css" href="css/memberhome.css"> 

  </head>

  <body>

    <!-- Navigation -->
    <?php 
      if(isset($_SESSION["email"])) {
        include ('navigation/member_navigation.php'); 
      }
    ?>
    <div class="slideshow-container">

      <div class="mySlides fade">
        <img src="img/mainheader1.png" style="width:100%">
        <div class="product-info-container">
          <h2 class="carousel-product-name">Adidas Superstar</h2>
          <a href='products/AdidasSuperstar20.php' class='shop-now'>Shop Item</a> 
        </div>  
      </div>

      <div class="mySlides fade">
        <img src="img/mainheader2.png" style="width:100%">
        <div class="product-info-container">
          <h2 class="carousel-product-name">Nike Air Force</h2>
          <a href='products/NikeAirForce1Low.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <div class="mySlides fade">
        <img src="img/mainheader3.png" style="width:100%">
        <div class="product-info-container">
          <h2 class="carousel-product-name">Jordan Retro 13</h2>
          <a href='products/JordanRetro13.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>

  <div class="indicator-dots">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  </div>

  <script src="js/main.js"></script>
        

  <!-- "RECENTLY VIEWED" Carousel -->
  <!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
  
  <!-- placeholder for favourites -->
  <div class="product-container">
    <div class="title-container">
      <h2>YOUR CART</h2><a class="seemore" href="my_account.php" >See More</a>
    </div>

      <div class="grid three-column add-gutters">
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
      </div>
  </div>
  <hr>
  


  <!-- place holder for cart -->
  <div class="product-container">
    <div class="title-container">
    <h2>YOUR CART</h2><a class="seemore" href="cart.php" >See More</a>
    </div>

      <div class="grid three-column add-gutters">
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
      </div>
    </div>
    <hr>

    </body>
</html>
   