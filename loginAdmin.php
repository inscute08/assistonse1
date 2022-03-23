<?php
    require "connect.php";

    #$email = $_POST["login_name"];
    #$pssword = $_POST["login_pass"]; 
    $email = "bsece@pup.com";
    $pssword = "12345";
    $sql_query = "SELECT uname, pword FROM admin WHERE uname = '$email'";
    
    $result = mysqli_query($con,$sql_query);

    if(mysqli_num_rows($result) > 0){
        $news = array();
        while($row = mysqli_fetch_assoc($result)){
            $hashed_pass = $row['pword'];
        }

        if (password_verify($pssword, $hashed_pass)) {
            echo "success";
        } else {
            echo 'Invalid password.';
        }
    }
    else {
        echo "fail";
    }
?>
