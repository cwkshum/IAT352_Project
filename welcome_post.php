<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Sign up</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/welcome_post.css"> 


    </head>

    <body>

        <!-- navigation -->
        <?php 
            $inFolder = false;  
            include("public_sessionActiveCheck.php"); 
        ?>

        <?php

            require('db.php'); 
        
            // default variables 
            $first_name = ""; 
            $last_name = ""; 
            $email = "";
            $password = "";
            $cpassword = ""; 
            $birth_year = "";
            $birth_day = "";
            $birth_month = ""; 
            $message = "";
            $submission = false;
            $all_fields = false; 
            $input_error = false; 
            $password_error = false;

            // Form handling
			if (isset($_POST["submit"])){

                // if name isn't empty, post
                // if empty, say that its required 
				if (!empty($_POST["first_name"])) {

                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]+$/", $_POST["first_name"])) {
                        $nameError = "Only letters and white space allowed";
                        $input_error = true; 
                    } else { 
                        $first_name = $_POST["first_name"];
                        $all_fields = true;
                    }
				} else {
                    $first_name = "First name is required. <br />";
                    echo $fname;
                    $all_fields = false;
                }

             
                // if last name isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["last_name"])) {
                    
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]+$/", $_POST["last_name"])) {
                        $nameError = "Only letters and white space allowed";
                        $input_error = true; 
                    } else {
                        $last_name = $_POST["last_name"];
                        $all_fields = true; 
                    }
				} else {
                    $last_name = "Last name is required. <br />";
                    echo $last_name;
                    $all_fields = false;
                }

                // if email isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["email"])) {
                    // check if e-mail address syntax is valid
                    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $email_error = "Invalid email format";
                        $input_error = true; 
                    } else { 
                        $all_fields = true;
                        //removes backslashes
                        $email = stripslashes($_POST['email']);
                        //escapes special characters in a string
                        $email = mysqli_real_escape_string($connection, $email);
                    }
                } else {
                    $email = "Email is required. <br />";
                    echo $email;
                    $all_fields = false;
                }

    
                // if birth year isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["year"])) {
                    $birth_year = $_POST["year"];  
                    $all_fields = true;
                } else {
                    $birth_year = "Birth year is required. <br />";
                    echo $birth_year;
                    $all_fields = false;
                }

                // if birth month isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["month"])) {
                    $birth_month = $_POST["month"];  
                    $all_fields = true;
                } else {
                    $birth_month = "Birth month is required. <br />";
                    echo $birth_month;
                    $all_fields = false;
                }
                
                // if birth date isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["date"])) {
                    $birth_day = $_POST["date"];  
                    $all_fields = true;
                } else {
                    $birth_day = "Birth day is required. <br />";
                    echo $birth_day;
                    $all_fields = false;
                }

                //format all birthday values 
                $birthday = date_create($birth_year."-".$birth_month."-".$birth_day);
                $dob = date_format($birthday, "M, d, Y");  
                $dob = str_replace(', ', '-', $dob);

                
                // if password isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["password"])) {
                    $password = $_POST["password"];
                    $all_fields = true;
                } else {
                    $password = "Password is required.  <br />";
                    echo $password;
                    $all_fields = false;
                }

                // if confirmed password isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["confirm_password"])) {
                    $cpassword = $_POST["confirm_password"]; 
                    $all_fields = true;
                    // check if passwords match
                    if ($cpassword != $password) {
                        $cpassword = "Passwords do not match. <br />";  
                        $password_error = true;
                        $input_error = true;
                        $all_fields = false;
                    } else {
                        $password = stripslashes($_POST['password']);
                        $password = mysqli_real_escape_string($connection, $password);
                    }  
                } else {
                    $cpassword = "Please confirm your password. <br />";
                    echo $cpassword;
                    $all_fields = false;
                }

                //if all fields are filled in, we can move on and give the user a welcome message 
                if ($all_fields) {
                    $submission = true;
                }
            } 
        ?>



        <div class="page-background">
            <!-- Display Information -->
            <div class='message-container'>
                <?php
                    //Check existing user ids 
                    $id_query = "SELECT customer_id FROM members ORDER BY customer_id DESC LIMIT 1";
                    $id_result = mysqli_query($connection, $id_query) or die(mysql_error());
                    //if no users have been registered, start from a 0000 id, else taking the largest user id and increment it by 1 to create a new user id 
                    $num_results = mysqli_num_rows($id_result); 
                    $rows = mysqli_fetch_assoc($id_result);

                    // Assign customer id
                    if ($num_results == 0) {
                        $id = 00001;
                    } else {
                        $id = $rows['customer_id'];
                        $id += 1; 
                    }

                    //Checking is user existing in the database or not
                    $query = "SELECT * FROM members WHERE email = '$email' and password = '".md5($password)."'";
                    $result = mysqli_query($connection, $query) or die(mysql_error());
                        
                    $rows = mysqli_num_rows($result);

                    if ($rows == 1) {
                        // Display Error Message
                        echo "<h1>Oops!</h1>";
                        echo "<h2 class='message'>It appears this email has already been registered.</h2>";
                        
                        // Sign up and Log in links
                        echo "<div class='center-content'>";
                            echo "<a href='signup_form.php' class='button'>SIGN UP</a>";
                            echo "<h4 class='container-item'>OR</h4>";
                            echo "<a href='login.php' class='button'>LOG IN</a>";
                        echo "</div>";
                    } else {
                        if (!$input_error) {
                            // Input user's account information into the database
                            $query = "INSERT into members (email, password, first_name, last_name, dob, customer_id) VALUES ('$email', '".md5($password)."', '$first_name', '$last_name', '$dob', $id)";
                            $result = mysqli_query($connection, $query);
                            
                            if($result) {
                                // Show success message
                                echo "<h1 class='center-content success-message'>Welcome, " . $first_name . "!</h1>";
                                echo "<div class='center-content'>";
                                    echo "<h2 class='message'>Thank you for registering.</h2>";
                                    // Log in link
                                    echo "<a href='login.php' class='button'>LOG IN</a>";
                                echo "</div>";
                            }
                        } else if($password_error){
                            // Display Error Message
                            echo "<h1>Oops!</h1>";
                            echo "<h2 class='message'>Passwords entered did not match.</h2>";
                        
                            // Sign up and Log in links
                            echo "<div class='center-content'>";
                                echo "<a href='signup_form.php' class='button'>SIGN UP</a>";
                                echo "<h4 class='container-item'>OR</h4>";
                                echo "<a href='login.php' class='button'>LOG IN</a>";
                            echo "</div>";
                        }else{
                            // Display Error Message
                            echo "<h1>Oops!</h1>";
                            echo "<h2 class='message'>Please valid characters when signing up.</h2>";
                        
                            // Sign up and Log in links
                            echo "<div class='center-content'>";
                                echo "<a href='signup_form.php' class='button'>SIGN UP</a>";
                                echo "<h4 class='container-item'>OR</h4>";
                                echo "<a href='login.php' class='button'>LOG IN</a>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
        </div>
        
    </body>
</html>