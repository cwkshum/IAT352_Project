<?php
    //connect to db
    require("db.php");

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        //Checking if the user exists in the database or not
        $query = "SELECT * FROM members WHERE email = '$email' and password = '".md5($password)."'";

        // get results from DB 
        $result_array = array();
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            // Set the session variable using the user's email
            session_start();
            $_SESSION['email'] = $email;

            while($row = $result->fetch_assoc()) {
                array_push($result_array, $row);
            }
        }

        // send a JSON encoded array to client
        echo json_encode($result_array);
        
        // close the database connection
        $connection->close();
    }
?>

