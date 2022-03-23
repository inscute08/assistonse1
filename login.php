<?php
    require "connect.php";

    $email = $_POST["login_name"];
    $pssword = $_POST["login_pass"]; 
    #$email = "testtest";
    #$pssword = "test";
    $sql_query = "select * from seniors where UserID like '$email' and UserPassword like '$pssword';";

    $result = mysqli_query($con,$sql_query);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "success";
    }
    else {
        echo "fail";
    }

?>
