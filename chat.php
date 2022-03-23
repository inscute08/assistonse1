<?php
    require "connect.php";
    require "login.php";
    $currentUser = $_POST["login_name"];
    if(!$con){
        die("Error in Connection: ".$mysqli_connect_error());
    }
    $response = array();
    $sql_query = "Select * from seniors where UserID like '$currentUser'";
    $result = mysqli_query($con,$sql_query);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['SeniorID'];
    }
    $sql_query = "Select * from messages where from_id like '$id' or to_id like '$id'";
    $result = mysqli_query($con,$sql_query);
    
    if(mysqli_num_rows($result) > 0){
        $response['success'] = 1;
        $response['current'] = $currentUser;
        $msg = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($msg, $row);
        }
        $response['msg'] = $msg;
    }
    else {
        $response['success'] = 0;
        $response['message'] = 'No data found';
    }
    ob_end_clean();
    echo json_encode($response);
    mysqli_close($con);

   
?>
