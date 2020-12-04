<!DOCTYPE html>
<html lang="en">
    
  <head>
    <title>Home</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Linked Stylesheets -->
    <link rel="stylesheet" type="text/css" href="css/main.css"> 
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
  </head>

  <body>
    <!-- Navigation -->
    <?php 
      $inFolder = false;  
      include("public_sessionActiveCheck.php"); 
    ?>

    <!-- Carousel Display -->
    <div class="slideshow-container">

      <!-- First Carousel Image Slide -->
      <div class="mySlides fade">
        <!-- Image -->
        <img src="img/mainheader1.png" alt="Adidas Superstar" class="img-width">
        <!-- Product Name and Link -->
        <div class="product-info-container">
          <h2 class="product-name">Adidas Superstar</h2>
          <a href='products/AdidasSuperstar20.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <!-- Second Carousel Image Slide -->
      <div class="mySlides fade">
        <!-- Image -->
        <img src="img/mainheader2.png" alt="Nike Air Force" class="img-width">
        <!-- Product Name and Link -->
        <div class="product-info-container">
          <h2 class="product-name">Nike Air Force</h2>
          <a href='products/NikeAirForce1Low.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <!-- Third Carousel Image Slide -->
      <div class="mySlides fade">
        <!-- Image -->
        <img src="img/mainheader3.png" alt="Jordan Retro 13" sclass="img-width">
        <!-- Product Name and Link -->
        <div class="product-info-container">
          <h2 class="product-name">Jordan Retro 13</h2>
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
    
    <!-- Linked Javascript for Carousel -->
    <script src="js/main.js"></script>
  
  </body>
</html>