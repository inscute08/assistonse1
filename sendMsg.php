<?php
    require "connect.php";

    #$type = $_POST['type'];
    #$user = $_POST['user'];
    #$msg = $_POST['msg'];
    #$date = date('y-m-d h:i:s');


    $type = "LOGBOOK";
    $user = "test1";
    $msg = "testingsss";
    
    $sql_query = "INSERT INTO messages (to_id, from_id, user_type, message, status) values ('20118989', '20118980', '$type', '$msg', '1');";
    mysqli_query($con,$sql_query);
    printf("result = %s", $row["status"]);
  
?>
