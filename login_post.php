<?php 
    include("auth_sessionActiveCheck.php"); 
    $inFolder = false;
    //if a session has already started ignore it and continue on - do not display the notice
    error_reporting(E_ALL & ~E_NOTICE);

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Login Processing</title> 
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
            include("public_sessionActiveCheck.php"); 
        ?>

        <?php
        
            // default variables
            $email = "";
            $password = "";
            $message = "";
            $submission = false;
            $all_fields = false; 

            require('db.php'); //connection to db code
            
			if (isset($_POST["submit"])){

                // if email isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["email"])) {
                    $email = $_POST["email"];
                    $all_fields = true;

                    // removes backslashes
                    $email = stripslashes($_POST['email']);
                    //escapes special characters in a string
                    $email = mysqli_real_escape_string($connection, $email);
    
                } else {
                    $email = "Email is required. <br />";
                    echo $email;
                    $all_fields = false;
                }

                // if password isn't empty, post
                // if empty, say that its required 
                if (!empty($_POST["password"])) {
                    // $password = $_POST["password"];  
                    $password = stripslashes($_POST['password']);
                    $password = mysqli_real_escape_string($connection, $password);
                    $all_fields = true;
                } else {
                    $password = "Password is required.  <br />";
                    echo $password;
                    $all_fields = false;
                }

                //if all fields are filled in, we can move on and give the user a welcome message 
                if ($all_fields) {
                    $submission = true;
                }
            } 
        ?>

        <?php
            //Checking is user existing in the database or not
            $query = "SELECT * FROM members WHERE email = '$email' and password = '".md5($password)."'";
            $result = mysqli_query($connection, $query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            echo $query;
            if ($rows === 1) {
                // echo $rows; 
                // echo $email;
                $_SESSION['email'] = $email;
                $_SESSION['in_progress'] = true; 
                // Redirect user to index.php
                header("Location: memberhome.php");
            } else {
                echo $rows; 
                echo $email;
                echo $password;
                echo "<h3>Email/password is incorrect, please try again.</h3>
                <br/>Click here to <a href='login.php'>Login</a>";
                echo "<p>Not registered yet? <a href='signup_form.php'>Sign up here</a></p>";
            }
        ?>
        
    </body>
</html>