<?php
    include("auth_sessionNotActiveCheck.php"); 
    $inFolder = false;
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Edit Account</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="css/main.css"> 
        <link rel="stylesheet" type="text/css" href="css/edit_account.css"> 
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    </head>

    <?php
		//connect to db 
        require("db.php");
	?>
    
    <body>
        <!-- Navigation -->
        <?php 
            if(isset($_SESSION["email"])) {
                include ('navigation/member_navigation.php'); 
            }
        ?>

        <?php
            if (isset($_SESSION['email'])) {
                $query = "SELECT email, first_name, last_name, dob, password FROM members WHERE email ='" . $_SESSION['email'] . "'"; 
                
                $result = mysqli_query($connection, $query);

                $numResults = mysqli_num_rows($result);
                for($i = 0; $i < $numResults; $i++) {
                    $row = mysqli_fetch_assoc($result); 
                    $firstName = $row['first_name'];
                    $lastName = $row['last_name']; 
                    $email = $row['email']; 
                    $dob = $row['dob'];
                    $password = $row['password'];
                }

            }
        ?>

        <!-- <div class="account-container">  -->
            <div>
            <h1>My Account</h1>
            <form action="edit_account.php" method="post">
                <div class="form-section">
                    <label for="first_name">First Name</label><br>
                    <input type="text" id="first_name" name="first_name" placeholder="<?php echo $firstName ?>">
                </div>

                <div class="form-section">
                    <label for="last_name">Last Name</label><br>
                    <input type="text" id="last_name" name="last_name" placeholder="<?php echo $lastName ?>">
                </div>

                <div class="form-section">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" placeholder="<?php echo $email ?>">
                </div>

                <div class="form-section">
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="******">
                </div>

                <input class="submit-button" type="submit" name="submit" value="Save">
            </form>

        </div> 

        <?php
            $updateQuery = ""; 
            $editQuery = "";
            $input_error = false; 
            
            if (isset($_POST["submit"])){
                
                if(!empty($_POST["first_name"])) {
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]+$/", $_POST["first_name"])) {
                        $nameError = "Only letters and white space allowed";
                        echo $nameError; 
                        $input_error = true; 
                    } else {
                        $firstName = $_POST["first_name"];
                        $updateQuery .= "first_name = '" .$firstName . "'";
                    }
                }

                if(!empty($_POST["last_name"])) {
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]+$/", $_POST["last_name"])) {
                        $nameError = "Only letters and white space allowed";
                        echo $nameError; 
                        $input_error = true; 
                    } else {
                        $lastName = $_POST["last_name"];
                        if(!empty($updateQuery)) {
                            $updateQuery .= ", last_name = '".$lastName. "'";
                        } else {
                            $updateQuery .= "last_name = '".$lastName. "'";
                        }
                    }
                }

                if(!empty($_POST["email"])) {

                    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        $email_error = "Invalid email format";
                        echo $email_error;
                        $input_error = true; 
                    } else {
                        $email = $_POST["email"];

                        if(!empty($updateQuery)) {
                            $updateQuery .= ", email = '".$email. "'";
                        } else {
                            $updateQuery .= "email = '".$email. "'";
                        }
                    }
                }

                if(!empty($_POST["password"])) {
                    $password = $_POST["password"];
                    
					if(!empty($updateQuery)) {
                        $updateQuery .= ", password = '".md5($password). "'";
                    } else {
                        $updateQuery .= "password = '".md5($password). "'";
                    }
                }


                if (isset($_SESSION['email'])) {
                    
                    // if ($editResult) {
                    // echo "Your account has been updated.";
                    // } else{
                    //     echo $editQuery;
                    //     echo "no";
                    // }
                }
                //check if the updated information is used in the database 
                $query = "SELECT * FROM members WHERE email = '$email'";
                $result = mysqli_query($connection, $query) or die(mysql_error());
                
                $rows = mysqli_num_rows($result);

                
                
                if(!$input_error && $rows == 0){
                    $editQuery = "UPDATE members SET ". $updateQuery . " WHERE email = '" .$_SESSION['email'] ."'"; 
                    $editResult = mysqli_query($connection, $editQuery);
                    $newEmail = $email; 
                    $_SESSION['email'] = $newEmail;
                    
                    header("Location: my_account.php");
                } else if ($rows == 1) {
                    echo "<h3>It appears this email has already been registered.</h3>";
                } 

            }
        ?> 

        <div class="favourites-container"> 
            <h1>My Favourites</h1>
            <?php 
                // echo $editQuery 
            ?>
        </div> 

        

    <?php
        // Release the returned data
        mysqli_free_result($result);

        // Close the database connection
        mysqli_close($connection);
    ?>
        
    </body>
</html>