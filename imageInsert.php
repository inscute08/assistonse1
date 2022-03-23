<?php
    require "connect.php";

    global $conn;
    $upload_path = '';
    $server_ip = gethostbyname(gethostbyname());
    $upload_url = 'http://'.$server_ip.'/assistonse2/'.$upload_path;

    $response = array();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['caption'])){
            $caption = $_POST['caption'];
            $fileinfo = pathinfo($_FILES['image']['name']);
            $extension = $fileinfo['extension'];
            $file_url = $upload_url.getFileName().'.'.$extension;
            $file_path = $upload_path.getFileName().'.'.$extension;
            $img_name = getFileName().'.'.$extension;

            try{
                move_uploaded_file($_FILES['image']['tmp_name'],$file_path);

                $sql = "INSERT INTO news(titl)"
            }
        }
    }

?>