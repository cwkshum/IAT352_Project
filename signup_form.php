<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Sign Up</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/signup_form.css"> 

        

    </head>

    <body>

        <!-- Navigation -->
        <?php 
            $inFolder = false;  
            include("public_sessionActiveCheck.php"); 
        ?>

        <div class="page-background">

            <!-- sign up form -->
            <div class="form-container">
                <h2>SIGN UP</h2> 
                <form action="welcome_post.php" method="post">
                    <div class="grid add-gutters two-column">
                        <div class="padding">
                            <!-- first name input -->
                            <label for="first_name" class="lighter-text">First Name*</label><br>
                            <input type="text" id="first_name" name="first_name" required>
                        </div>
                        <div class="box-margin padding">
                            <!-- last name input -->
                            <label for="last_name" class="lighter-text">Last Name*</label><br>
                            <input type="text" id="last_name" name="last_name" required>
                        </div>
                    </div>

                    <div class="padding"> 
                        <!-- email address input -->
                        <label for="email" class="lighter-text">Email Address*</label><br>
                        <input type="email" id="email" name="email" required><br>
                        <span style="color:red" id="msg" ></span>

                    </div>

                    <div class="padding"> 
                        <!-- password input -->
                        <label class="lighter-text">Password* 
                        <input name="password" id="password" type="password" onkeyup='passwordcheck();' required/>
                        </label>
                    </div>

                    <div class="padding"> 
                        <!-- confirm password input -->
                        <label class="lighter-text">Confirm Password*
                        <input type="password" name="confirm_password" id="confirm_password"  onkeyup='passwordcheck();' required/> 
                        <span id='message'></span>
                        </label>
                    </div>

                    <div class="padding"> 
                        <!-- date of birth input -->
                        <label for="month" class="lighter-text">Date of Birth (mm/dd/yyyy)*</label><br>
                        <div class="grid add-gutters three-column">
                            <!-- input for month of birth -->
                            <input type="number" id="month" name="month" min="1" max="12" required>
                            
                            <!-- input for date of birth -->
                            <input type="number" id="date" name="date" min="1" max="31" required>
                            
                            <!-- input for year of birth -->
                            <input type="number" id="year" name="year" min="1940" max="2020" required>
                        </div>
                    </div>

                    <div class="alignment-container">
                        <!-- submit button -->
                        <input class="button" type="submit" name="submit" value="SUBMIT">

                        <!-- "have an account?" text -->
                        <p class="account-padding lighter-text">Have an account?</p> 

                        <!-- login button -->
                        <a href="login.php" class="button">LOG IN</a> 
                    </div>
                </form>
            </div>
        </div>
       
        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="js/checkemail.js"></script>

        <script>
            var passwordcheck = function() {
                if (document.getElementById('password').value ==
                    document.getElementById('confirm_password').value) {
                    document.getElementById('message').style.color = 'green';
                    document.getElementById('message').innerHTML = 'Passwords Matching';
                } else {
                        document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Passwords Not Matching';
                }
            }
        </script>
        
    </body>
</html>