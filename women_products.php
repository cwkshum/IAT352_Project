<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Womens Products</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Linked Stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/content.css"> 

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    </head>
    
    <body>
    
        <!-- Navigation -->
        <?php 
            $inFolder = false;
            include("public_sessionActiveCheck.php"); 
        ?> 
        
        <!-- header image -->
        <header>
            <div class="small-header-women">
                <img src="img/hero1.jpg" class="small-header-image">
            </div>
        </header>

        <!-- Filters --> 
        <div class="filter-flexbox-container"> 
            <div class="filter-flex-item">
               
               <!-- Filter Selection for Brands -->
                <h4>BRAND</h4> 
                
                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Adidas" name="Adidas" value="Adidas" class="common_selector brand"<?php if(isset($_POST['Adidas'])) echo "checked='checked'"; ?>>
                    <label for="Adidas">Adidas</label><br>
                </div>

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Nike" name="Nike" value="Nike" class="common_selector brand"<?php if(isset($_POST['Nike'])) echo "checked='checked'"; ?>>
                    <label for="Nike">Nike</label><br>
                </div>

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="PUMA" name="PUMA" value="PUMA" class="common_selector brand"<?php if(isset($_POST['PUMA'])) echo "checked='checked'"; ?>>
                    <label for="PUMA">PUMA</label><br>
                </div>

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Timberland" name="Timberland" value="Timberland" class="common_selector brand"<?php if(isset($_POST['Timberland'])) echo "checked='checked'"; ?>>
                    <label for="Timberland">Timberland</label><br>
                </div>
                
                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="UGG" name="UGG" value="UGG" class="common_selector brand"<?php if(isset($_POST['UGG'])) echo "checked='checked'"; ?>>
                    <label for="UGG">UGG</label><br>
                </div>

                <!-- Filter Selection for Colour -->
                <h4>COLOUR</h4> 
                <div class="color-container grid three-column add-gutters">

                    <label class="container">
                        <input type="checkbox" id="White" name="White" value ="White" class="common_selector colour"<?php if(isset($_POST['White'])) echo "checked='checked'"; ?>>
                        <span class="checkmark white-button"></span>
                    </label>

                    <label class="container">
                        <input type="checkbox" id="Beige" name="Beige" value ="Beige" class="common_selector colour"<?php if(isset($_POST['Beige'])) echo "checked='checked'"; ?>>
                        <span class="checkmark beige-button"></span>
                    </label>

                    <label class="container">
                        <input type="checkbox" id="Black" name="Black" value ="Black" class="common_selector colour"<?php if(isset($_POST['Black'])) echo "checked='checked'"; ?>>
                        <span class="checkmark black-button"></span>
                    </label>

                    <label class="container">
                        <input type="checkbox" id="Red" name="Red" value ="Red" class="common_selector colour"<?php if(isset($_POST['Red'])) echo "checked='checked'"; ?>>
                        <span class="checkmark red-button"></span>
                    </label>
                </div>

                <!-- Filter Selection for Sizes -->
                <h4>SIZE</h4>
                <?php
                    echo '<ul class="grid three-column filter-add-gutters size-filter-spacing">';
                    for ($i = 5; $i < 14; $i++) { 
                        $shoeSize = $i;

                        echo '<div>';
                            echo '<input type="checkbox" id="shoeSize" class="common_selector size" name="'. $shoeSize .'"value=" '. $shoeSize .'" ';
                            if(isset($_POST[$shoeSize])){
                                echo 'checked="checked"';
                            } 
                            echo ">";
                            echo '<label for="shoeSize">'. ' ' .$shoeSize.'</label>'; 
                        echo '</div>';
                    }
                    echo "</ul>";
                ?> 
            </div>
        </div> 
        
        <!-- Products Display Section -->
        <div class="content-container"> 
       
            <h1>Womens Shoes</h1>
            <!-- Display products -->
            <div id="getFilter"></div>
        </div>

        <!-- Linked JavaScript Files -->
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="js/womens_filter.js"></script>   
        
    </body>
</html>