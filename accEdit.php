<?php 
    require "connect.php";

    $part = $_POST['part'];
    $user = $_POST['user'];
    $val = $_POST['val'];
    #$part = "4";
    #$user = "321321";
    #$val = "testingsss";
    $response = array();
    if($part == "1"){
        $sql_query = "update seniors set UserPassword = '$val' where UserId = '$user';";

        $result = mysqli_query($con,$sql_query);

        echo "success";
    }
    //mob num
    elseif($part == "2"){
        $sql_query = "update seniors set SenMobileNumber = '$val' where UserId = '$user';";

        $result = mysqli_query($con,$sql_query);

        echo "success";
    }
    //land line
    elseif($part == "3"){
        $sql_query = "update seniors set SenLandLineNumber = '$val' where UserId = '$user';";

        $result = mysqli_query($con,$sql_query);

        echo "success";
    }
    //civil status
    elseif($part == "4"){
        $sql_query = "update seniors set CivilStatus = '$val' where UserId = '$user';";

        $result = mysqli_query($con,$sql_query);

        echo "success";
    }
    //guardian name
    elseif($part == "5"){
        $sql_query = "update seniors set NameOfGuardian = '$val' where UserId = '$user';";

        $result = mysqli_query($con,$sql_query);

        echo "success";
    }
    //guardian mobile num
    elseif($part == "6"){
        $sql_query = "update seniors set GuardianMobileNumber = '$val' where UserId = '$user';";

        $result = mysqli_query($con,$sql_query);

        echo "success";
    }
    //guardian landline
    elseif($part == "7"){
        $sql_query = "update seniors set GuardianLandlineNumber = '$val' where UserId = '$user';";

        $result = mysqli_query($con,$sql_query);

        echo "success";
    }
    //seniord status
    elseif($part == "8"){
        $sql_query = "update seniors set senStatus = '$val' where UserId = '$user';";

        $result = mysqli_query($con,$sql_query);

        echo "success";
    }
?>