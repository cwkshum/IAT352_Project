<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Log In</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Linked Stylesheets -->
        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/login.css"> 

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <?php 
            $inFolder = false;  
            include("public_sessionActiveCheck.php"); 
        ?>

        <div class="page-background">
            <!-- Log-in Form -->
            <div class="form-container">
                <h2> LOG-IN </h2>
            
                <div class="padding">
                    <!-- input for email address -->
                    <label for="email" class="lighter-text">Email Address:</label><br>
                    <input type="email" id="email" name="email" required><br>
                </div>

                <div class="padding">
                    <!-- input for password -->
                    <label for="password" class="lighter-text">Password:</label><br>
                    <input type="password" id="password" name="password" required><br>
                </div>

                <!-- Display Login Error Message -->
                <span id="login_msg"></span>

                <!-- Action Buttons -->
                <div class="alignment-container">
                    <!-- login button -->
                    <button class="button login_btn" value="LOG IN">LOG IN</button>
                    
                    <!-- Sign up Link -->
                    <h4 class="or-padding"> Don't have an account? <a href="signup_form.php">SIGN UP</a></h4>
                </div>
            </div>
        </div>

        <!-- Linked JavaScript Files -->
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="js/checklogin.js"></script>
    </body>
</html>
