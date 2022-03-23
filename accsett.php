<?php
    require "connect.php";

    $email = $_POST["login_name"];
    #$email = "test1";
    $sql_query = "select * from seniors where UserID like '$email';";
    $result = mysqli_query($con, $sql_query);
    if(mysqli_num_rows($result) > 0){
        $response['success'] = 1;
        $try = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($try, $row);
        }
        $response['try'] = $try;
    }
    else {
        $response['success'] = 0;
        $response['message'] = 'No data found';
    }
    ob_end_clean(); 
    echo json_encode($response);
    mysqli_close($con);
?>
