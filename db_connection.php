<?php
    define("DB_HOST","us-cdbr-east-05.cleardb.net");
    define("DB_USER","b97ac2cc002c36");  
    define("DB_PASSWORD","19b6b88b");
    define("DB_DATABASE","heroku_d738d2345bbb9d5");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    if(mysqli_connect_errno()){
        die("Database connection failed " . "{" . mysqli_connect_error() . " - " . mysqli_connect_errno() . ")");
    }
    else{
        echo "success";
    }
?>
