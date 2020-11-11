<?php
    $exitFolder = ''; 
    if ($inFolder) {
        $exitFolder ="../";
    }
?> 

<nav class="main-nav">
    <?php  
        echo '<div class="nav-logo">';   
            echo '<a href="' . $exitFolder . 'index.php">shoe addiction</a>';
        echo '</div>';
     
        echo '<div class = "nav-link-section">';
            echo '<a href="' . $exitFolder . 'index.php" class="nav-link">Home</a>';
            echo '<a href="' . $exitFolder . 'women_products.php" class="nav-link">Women</a>';
            echo '<a href="' . $exitFolder . 'men_products.php" class="nav-link">Men</a>';
            echo '<a href="' . $exitFolder . 'login.php" class="nav-link">Log In</a>';
        echo '</div>';
    ?> 
 </nav> 