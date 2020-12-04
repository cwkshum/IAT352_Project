<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Mens Products</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Linked Stylesheets -->
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
        
        <header>
            <!-- Header image -->
            <div class="small-header">
                <img src="img/hero1.jpg" class="small-header-image">
            </div>
        </header>

        <!-- Filters --> 
        <div class="filter-flexbox-container"> 
            <div class="filter-flex-item">

                <!-- Filter Selection for Brands -->
                <h4>BRAND</h4> 
                
                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Adidas" name="Adidas" value="Adidas"  class="common_selector brand"<?php if(isset($_POST['Adidas'])) echo "checked='checked'"; ?>>
                    <label for="Adidas">Adidas</label><br>
                </div>

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Nike" name="Nike" value="Nike"  class="common_selector brand"<?php if(isset($_POST['Nike'])) echo "checked='checked'"; ?>>
                    <label for="Nike">Nike</label><br>
                </div>

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Jordan" name="Jordan" value="Jordan"  class="common_selector brand"<?php if(isset($_POST['Jordan'])) echo "checked='checked'"; ?>>
                    <label for="Jordan">Jordan</label><br>
                </div>

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Reebok" name="Reebok" value="Reebok"  class="common_selector brand"<?php if(isset($_POST['Reebok'])) echo "checked='checked'"; ?>>
                    <label for="Reebok">Reebok</label><br>
                </div> 

                <div class="checkbox-line-spacing">
                    <input type="checkbox" id="Timberland" name="Timberland" value="Timberland"  class="common_selector brand"<?php if(isset($_POST['Timberland'])) echo "checked='checked'"; ?>>
                    <label for="Timberland">Timberland</label><br>
                </div>
                
                <!-- Filter Selection for Colours -->
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
                    <input type="checkbox" id="Green" name="Green" value ="Green" class="common_selector colour"<?php if(isset($_POST['Green'])) echo "checked='checked'"; ?>>
                    <span class="checkmark green-button"></span>
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

                <!-- Filter Selection for Size -->
                <h4>SIZE</h4>
                <?php
                    echo '<ul class="grid three-column filter-add-gutters size-filter-spacing">';
                    for ($i = 6; $i < 19; $i++) { 
                        $shoeSize = $i;

                        echo '<div>';
                            echo '<input type="checkbox" id="shoeSize"  class="common_selector size" name="'. $shoeSize .'" value="'. $shoeSize .'" ';
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
            <h1>Mens Shoes</h1>
            <!-- Display Products -->
            <div id="getFilter"></div>
        </div>
        
        <!-- Linked Stylesheets -->
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="js/mens_filter.js"></script>  
        
    </body>
</html>