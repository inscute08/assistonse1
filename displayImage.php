<?php
    require "connect.php";

    $sql = "select image_id from image;";
    $res = mysqli_query($con,$sql);
 
 
    $result = array();
    $url = "http://192.168.0.196/db/displayImage.php?id=";
    while($row = mysqli_fetch_array($res)){
        array_push($result,array('url'=>$url.$row['image_id']));
    }  
 
    echo json_encode(array("result"=>$result));
 
    mysqli_close($con);

?>