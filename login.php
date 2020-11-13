<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Log In</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <div class="page-background">
            <!-- Log-in Form -->
            <div class="form-container">
                <h2> LOG-IN </h2>
            
                <form action="login_post.php" method="post">
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
                
                    <div class="alignment-container">
                        <!-- login button -->
                        <input class="button" name="submit" type="submit" value="LOG IN">

                        <h4 class="or-padding"> OR </h4>

                        <!-- "Create an Account" button -->
                        <a href="signup_form.php" class="button">CREATE AN ACCOUNT</a>
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>
