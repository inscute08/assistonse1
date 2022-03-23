<?php
    require "connect.php";

    if(!$con){
        die("Error in Connection: ".$mysqli_connect_error());
    }
    $response = array();
    
    $sql_query = "select event_title from activities";
    $result = mysqli_query($con,$sql_query);
    
    if(mysqli_num_rows($result) > 0){
        $response['success'] = 1;
        $acts = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($acts, $row);
        }
        $response['acts'] = $acts;
    }
    else {
        $response['success'] = 0;
        $response['message'] = 'No data found';
    }
    echo json_encode($response);
    mysqli_close($con);
?>
