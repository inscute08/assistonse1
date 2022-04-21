<?php
    require "connect.php";

    $type = $_POST['type'];
    $user = $_POST['user'];
    $msg = $_POST['msg'];
   

    $sql_query = "select * from seniors where UserID like '$user';";
    $result = mysqli_query($con, $sql_query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
                $hello = $row['SeniorID'];
           }
    }
    else {
        echo "Cant find user ID";
    }
    
    $sql_query = "INSERT INTO messages (to_id, from_id, user_type, message, status) values ('1006', '$hello', '$type', '$msg', '1');";
    mysqli_query($con,$sql_query);
    printf("result = %s", $row["status"]);
  
?>
