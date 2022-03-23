<?php
    require "connect.php";
    if(!$con){
        die("Error in Connection: ".$mysqli_connect_error());
    }
    $response = array();
    
    $sql_query = "select image_id,title,content from news";
    $result = mysqli_query($con,$sql_query);
    
    if(mysqli_num_rows($result) > 0){
        $response['success'] = 1;
        $news = array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($news, $row);
        }
        $response['news'] = $news;
    }
    else {
        $response['success'] = 0;
        $response['message'] = 'No data found';
    }
    echo json_encode($response);
    mysqli_close($con);
?>
