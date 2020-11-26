<?php
    //connect to db
    require("db.php");

    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection,$_POST['password']);

    if ($email != "" && $password != ""){

        $query = "select count(*) from email where email='".$email."' and password='".$password."'";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_array($result);

        $count = $row['email'];

        if($count > 0){
            $_SESSION['email'] = $email;
            echo 1;
        }else{
            echo 0;
        }

    }
    $connection->close();
?> 