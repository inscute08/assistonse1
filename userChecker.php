<?php
    require "connect.php";
    include "login.php";

    if(!$con){
        die("Error in Connection: ".$mysqli_connect_error());
    }
    
    $response2 = array();
    
    $sql_query = "select seniorID  from seniors where UserID like '$email';";
    $result2 = mysqli_query($con,$sql_query);
    
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $currentUser = $row["seniorID"];
        }
    } else {
        echo "0 results";
     }
?>
