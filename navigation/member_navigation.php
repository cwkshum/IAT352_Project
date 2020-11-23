<?php
    $exitFolder = ''; 
    if ($inFolder) {
        $exitFolder ="../";
    }
?> 



<nav class="main-nav">

        <?php
            echo '<div class="nav-logo">';   
                echo '<a href="' . $exitFolder . 'memberhome.php">shoe addiction</a>';
            echo '</div>';

            echo '<div class = "nav-link-section">';
                echo '<a href="' . $exitFolder . 'memberhome.php" class="nav-link">Home</a>';
                echo '<a href="' . $exitFolder . 'women_products.php" class="nav-link">Women</a>';
                echo '<a href="' . $exitFolder . 'men_products.php" class="nav-link">Men</a>';
                echo '<a href="' . $exitFolder . 'my_account.php" class="nav-link">My Account</a>';
                echo '<a href="' . $exitFolder . 'cart.php" class="nav-link">Cart</a>';
                echo '<a href="' . $exitFolder . 'logout.php" class="nav-link">Log Out</a>';

            echo '</div>';
        ?> 
</nav> 
