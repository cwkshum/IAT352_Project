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

        <!-- Import Bootstrap: https://www.w3schools.com/bootstrap/bootstrap_get_started.asp -->
        <!-- Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <!-- jQuery library -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <!-- Latest compiled JavaScript -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/memberhome.css"> 
        <script src="js/main.js"></script>

    </head>

    <body>

        <!-- Navigation -->
        <?php 
            if(isset($_SESSION["email"])) {
                include ('navigation/member_navigation.php'); 
            }
        ?>

        <h2>RECENTLY ADDED</h2>
    <div class="slideshow-container">
     <div class="slideshow-inner">
        
        <div class="mySlides fade cropped">
        <img  src='img/NikeAirForce1Low.png' style='width: 100%;' alt="sally lightfoot crab"/>
        </div>
    
        <div class="mySlides fade cropped">
        <img  src='img/NikeAirMax97.png' style='width: 100%;' alt="fighting nazca boobies"/>
        </div>
    
        <div class="mySlides fade cropped">
        <img  src='img/PUMADefyMidBuckle.png' style='width: 100%;' alt="otovalo waterfall"/>
        </div>
    
        <div class="mySlides fade cropped">       
        <img  src='img/ReebokQuestionMid.png' style='width: 100%;' alt="pelican"/>
        </div>

      </div>

      <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
      <a class="next" onclick='plusSlides(1)'>&#10095;</a>
    </div>
    
    <br/>

    <div style='text-align: center;'>
      <span class="dot" onclick='currentSlide(1)'></span>
      <span class="dot" onclick='currentSlide(2)'></span>
      <span class="dot" onclick='currentSlide(3)'></span>
      <span class="dot" onclick='currentSlide(4)'></span>
    
      <a href="contentdetails.php" class="shop-now">SHOP THIS ITEM</a>
    </div>



        <!-- "RECENTLY VIEWED" Carousel -->
         <!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
         <h2 class="recently-viewed-margin">RECENTLY VIEWED</h2>

        <!-- <div id="recently-viewed" class="carousel slide" data-ride="carousel"> -->
            <!-- Indicators -->
            <!-- <ol class="carousel-indicators">
                <li data-target="#recently-viewed" data-slide-to="0" class="active"></li>
                <li data-target="#recently-viewed" data-slide-to="1"></li>
                <li data-target="#recently-viewed" data-slide-to="2"></li>
                <li data-target="#recently-viewed" data-slide-to="3"></li>
                <li data-target="#recently-viewed" data-slide-to="4"></li>
            </ol> -->

            <!-- Wrapper for slides -->
            <div class="slideshow-container">
            <div class="slideshow-inner">
                
            <div class="mySlides fade cropped">
            <img  src='img/NikeAirForce1Low.png' style='width: 100%;' alt="sally lightfoot crab"/>
            </div>
    
            <div class="mySlides fade cropped">
            <img  src='img/NikeAirMax97.png' style='width: 100%;' alt="fighting nazca boobies"/>
            </div>
    
            <div class="mySlides fade cropped">
            <img  src='img/PUMADefyMidBuckle.png' style='width: 100%;' alt="otovalo waterfall"/>
            </div>
    
            <div class="mySlides fade cropped">
            <img  src='img/ReebokQuestionMid.png' style='width: 100%;' alt="pelican"/>
            </div>
      
         </div>
      
      <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
      <a class="next" onclick='plusSlides(1)'>&#10095;</a>
    </div>
  
    <br/>
  
    <div style='text-align: center;'>
      <span class="dot" onclick='currentSlide(1)'></span>
      <span class="dot" onclick='currentSlide(2)'></span>
      <span class="dot" onclick='currentSlide(3)'></span>
      <span class="dot" onclick='currentSlide(4)'></span>

      <a href="contentdetails.php" class="shop-now">SHOP THIS ITEM</a>
    </div>
    


            <!-- Left and right controls -->
            <!-- <a class="left carousel-control" href="#recently-viewed" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#recently-viewed" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a> -->


         <!--"YOUR FAVOURITES" Carousel-->
        <h2 class="favourites-margin">YOUR FAVOURITES</h2>
        <div class="slideshow-container">
    <div class="slideshow-inner">
     
    <div class="mySlides fade cropped">
    <img  src='img/NikeAirForce1Low.png' style='width: 100%;' alt="sally lightfoot crab"/>
    </div>
    
    <div class="mySlides fade cropped">
    <img  src='img/NikeAirMax97.png' style='width: 100%;' alt="fighting nazca boobies"/>
    </div>
    
    <div class="mySlides fade cropped">
    <img  src='img/PUMADefyMidBuckle.png' style='width: 100%;' alt="otovalo waterfall"/>
    </div>
    
    <div class="mySlides fade cropped">
    <img  src='img/ReebokQuestionMid.png' style='width: 100%;' alt="pelican"/>
    </div>
      
    </div>
    
    
      <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
      <a class="next" onclick='plusSlides(1)'>&#10095;</a>
    </div>
    <br/>
    
    
    <div style='text-align: center;'>
      <span class="dot" onclick='currentSlide(1)'></span>
      <span class="dot" onclick='currentSlide(2)'></span>
      <span class="dot" onclick='currentSlide(3)'></span>
      <span class="dot" onclick='currentSlide(4)'></span>
    </div>
    
    

    </body>
</html>
        <!-- <div id="favourites-carousel" class="carousel slide" data-ride="carousel"> -->
            <!-- Indicators -->
            <!-- <ol class="carousel-indicators">
                <li data-target="#favourites-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#favourites-carousel" data-slide-to="1"></li>
                <li data-target="#favourites-carousel" data-slide-to="2"></li>
                <li data-target="#favourites-carousel" data-slide-to="3"></li>
                <li data-target="#favourites-carousel" data-slide-to="4"></li>
            </ol> -->

            <!-- Wrapper for slides -->
            <!-- <div class="carousel-inner">
                <div class="item">
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

                <div class="item active">
                    <a href="contentdetails.php" ><img src="img/carousel-image-5-edited.png" alt="Sneakers"> </a>
                </div>
            </div> -->

            <!-- Left and right controls -->
            <!-- <a class="left carousel-control" href="#favourites-carousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#favourites-carousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div> -->

      
       <!-- "Shop this item" button -->
   
    
   


        <!-- "RECENTLY ADDED" Carousel -->
        <!-- https://www.w3schools.com/bootstrap/bootstrap_carousel.asp -->
        <!-- <div id="recently-added" class="carousel slide" data-ride="carousel"> -->
            <!-- Indicators -->
            <!-- <ol class="carousel-indicators">
                <li data-target="#recently-added" data-slide-to="0" class="active"></li>
                <li data-target="#recently-added" data-slide-to="1"></li>
                <li data-target="#recently-added" data-slide-to="2"></li>
                <li data-target="#recently-added" data-slide-to="3"></li>
                <li data-target="#recently-added" data-slide-to="4"></li>
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

            <!-- Left and right controls -->
            <!-- <a class="left carousel-control" href="#recently-added" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#recently-added" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a> -->