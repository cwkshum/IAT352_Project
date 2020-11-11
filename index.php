<?php
  $inFolder = false;
?> 

<!DOCTYPE html>
<html lang="en">
    
  <head>
    <title>Home</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- javascript file linked -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Import Bootstrap: https://www.w3schools.com/bootstrap/bootstrap_get_started.asp -->
    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- jQuery library -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <!-- Latest compiled JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="css/main.css"> 
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <!-- <script src="js/main.js"></script> -->

    <!-- chamira added -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!---->
  </head>

  <body>

    <!-- Navigation -->
    <?php 
      $inFolder = false;  
      include("public_sessionActiveCheck.php"); 
    ?>

    <!-- <h2>RECENTLY ADDED</h2> -->
    <div class="slideshow-container">

      <div class="mySlides fade">
        <img src="img/mainheader1.png" style="width:100%">
        <div class="product-info-container">
          <h2 class="product-name">Adidas Superstar</h2>
          <a href='AdidasSuperstar20.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <div class="mySlides fade">
        <img src="img/mainheader2.png" style="width:100%">
        <div class="product-info-container">
          <h2 class="product-name">Nike Air Force</h2>
          <a href='NikeAirForce1Low.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <div class="mySlides fade">
        <img src="img/mainheader3.png" style="width:100%">
      <div class="product-info-container">
          <h2 class="product-name">Jordan Retro 13</h2>
          <a href='JordanRetro13.php' class='shop-now'>Shop Item</a> 
        </div>
      </div>

      <!-- <div class="mySlides fade">4 / 3</div>
        <img src="img/mainheader4.png" style="width:100%">
        <div class="text">Caption Four</div>
      </div> -->

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div class="indicator-dots">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
      <!-- <span class="dot" onclick="currentSlide(4)"></span>  -->
    </div>
    
    <script src="js/main.js"></script>
  

  </body>
</html>


      <!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp
      <div id="myCarousel" class="carousel slide" data-ride="carousel"> -->
            <!-- Indicators -->
            <!-- <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol> -->

            <!-- Wrapper for slides -->
            <!-- <div class="carousel-inner">
                <div class="item active">
                    <a href="contentdetails.php" ><img src="img/carousel-image-1-edited.png" alt="Sneakers"></a>
                </div>
                
                <div class="item">
                    <a href="contentdetails.php" ><img src="img/carousel-image-2-edited.png" alt="Sneakers"></a>
                </div>

                <div class="item">
                    <a href="contentdetails.php" ><img src="img/carousel-image-3-edited.png" alt="Sneakers"> </a>
                </div>

                <div class="item">
                    <a href="contentdetails.php" ><img src="img/carousel-image-4-edited.png" alt="Sneakers"> </a>
                </div>

                <div class="item">
                    <a href="contentdetails.php" ><img src="img/carousel-image-5-edited.png" alt="Sneakers"> </a>
                </div>
            </div> -->
            <!-- "Shop this item" button -->
            <!-- <a href="contentdetails.php" class="shop-now">SHOP THIS ITEM</a>
        </div> -->