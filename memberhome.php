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
          <h2 class="product-name">Adidas Superstar</h2>
          <a href='products/AdidasSuperstar20.php' class='shop-now'>Shop Item</a> 
        </div>  
      </div>

      <div class="mySlides fade">
        <img src="img/mainheader2.png" style="width:100%">
        <div class="product-info-container">
          <h2 class="product-name">Nike Air Force</h2>
          <a href='products/NikeAirForce1Low.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <div class="mySlides fade">
        <img src="img/mainheader3.png" style="width:100%">
        <div class="product-info-container">
          <h2 class="product-name">Jordan Retro 13</h2>
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
  <h2>YOUR FAVOURITES</h2>

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
  </div>

  <a class="seemore" href="https://www.footlocker.ca/en/" >See More</a>
  <hr>

  <h2>YOUR CART</h2>

<div class="card_group ">
<a href="about.html"><div class="homepage_card">
 <img  src="img/NikeAirMax97.png" alt="Building" class="subsection_heading" style="width:100%" height="380">
 <h3>NIKE AIR MAX 97</h3>
 <p class="pricesize"> $170 </p>
</div> </a>

<a href="product_page.html"><div class="homepage_card">
 <img src="img/JordanRetro13.png" alt="Ham and Swiss Omelet" class="subsection_heading" style="width:100%">
 <h3>JORDAN RETRO 13</h3>
 <p class="pricesize"> $190 </p>
</p>
</div></a>

<a href="about.html"><div class="homepage_card">
 <img src="img/PUMADefyMidBuckle.png" alt="Entrees" class="subsection_heading" style="width:100%">
 <h3>PUMA DEFY MID BUCKLE</h3>
 <p class="pricesize"> $100 </p>
</div></a>
</div>


    </body>
</html>
   