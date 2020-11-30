<?php
    //connect to db
    require("db.php");
    // include("auth_sessionNotActiveCheck.php");


    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Checking if the user exists in the database or not
        $query = "SELECT * FROM members WHERE email = '$email' and password = '".md5($password)."'";
        // $thisResult = mysqli_query($connection, $query) or die(mysql_error());
        // $num_rows= mysqli_num_rows($thisResult);
        // if ($num_rows > 0) {
        //     include("auth_sessionNotActiveCheck.php");
        //     $_SESSION['email'] = $email;
        //     header("Location: memberhome.php");
        // }

        // // $data =  mysqli_query($connection, $query);
        // // $rows = mysqli_num_rows($data);

        // if($num_rows == 1){
        //     $rows = mysqli_fetch_array($result);
        //     $id = $rows['email'];
        //     session_start();
        //     $_SESSION['email'] = $id;
        //     echo "success";
        // } else{
        //     echo "failed";


        // get results from DB 
        $result_array = array();
        $result = $connection->query($query);
        if ($result->num_rows > 0) {

            // // include("auth_sessionNotActiveCheck.php");
            session_start();
            $_SESSION['email'] = $email;
            // header("Location: memberhome.php");

            while($row = $result->fetch_assoc()) {
                array_push($result_array, $row);
            }
        }
        /* send a JSON encded array to client */
        echo json_encode($result_array);
        
        $connection->close();
    
        // if ($rows === 1) {
        //     $_SESSION['email'] = $email;
            
        //     // Redirect user to index.php
        //     header("Location: memberhome.php");

        // }
        // else {
        //     // error message display 
        //     // echo '<div class="error-page-background">';
        //     //     echo '<div class="message-container">';
        //     //         echo "<h1 class='center-content'>Oops!</h1>";
        //     //         echo "<div class='center-content'>";
        //     //             echo "<h3 class='message'>Email/password is incorrect, please try again.</h3>";
        //     //             echo "<a href='login.php' class='button'>LOG IN</a>";
        //     //             echo "<p class='signup-message'>Not registered yet? <a href='signup_form.php' class='signup-link'>Sign up here</a></p>";
        //     //         echo "</div>";
        //     //     echo '</div>';
        //     // echo '</div>';
        // }
    }
?>

