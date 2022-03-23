<?php
    define("DB_HOST","localhost");
    define("DB_USER","root");  
    define("DB_PASSWORD","test");
    define("DB_DATABASE","brgy_system");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if(mysqli_connect_errno()){
        die("Database connection failed " . "{" . mysqli_connect_error() . " - " . mysqli_connect_errno() . ")");
    }
    else{
        echo "success";
    }
?>