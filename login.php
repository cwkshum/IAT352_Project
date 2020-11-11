<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Log In</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- javascript file linked -->
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/login.css"> 

    </head>

    <body>

        <!-- Navigation -->
        <?php 
            $inFolder = false;  
            include("public_sessionActiveCheck.php"); 
        ?>

        <div class="form-container">
            <h2> LOG-IN </h2>
           
            <form action="login_post.php" method="post">
                <div class="padding">
                    <!-- input for email address -->
                    <label for="email">Email Address:</label><br>
                    <input type="email" id="email" name="email" required><br>
                </div>

                <div class="padding">
                    <!-- input for password -->
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required><br>
                </div>

                <!-- "Forgot password?" Text  -->
                <div class="forgot-password-padding">
                    <a href="">Forgot Password?</a><br>
                </div>
            
                <!-- login button -->
                <input class="log-in" name="submit" type="submit" value="LOG IN">

                <h4 class ="or"> OR </h4>

                <!-- "Create an Account" button -->
                <a href="signup_form.php" class="create-account">CREATE AN ACCOUNT</a>

            </form>
        </div>

    </body>
</html>
