<?php
    require "connect.php";

    $event = $_POST['event'];
    $user = $_POST['user'];




    #$event = "event1";
    #$user = "20118980";

    $sql_query = "select * from seniors where SeniorID like '$user';";
    $result = mysqli_query($con, $sql_query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
                $lastName = $row['SenLastName'];
                $firstname = $row['SenFirstName'];
                
           }
    }
    else {
        echo "Cant find user ID";
    }
   
    $name = "$lastName, $firstname";
    echo $name;
    $sql_query = "INSERT INTO attendance (event,user,username) VALUES ('$event', '$user', '$name');";
    $result = mysqli_query($con,$sql_query);

?>