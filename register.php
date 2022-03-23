<?php  
 require "connect.php";  

 $seniorID = $_POST["seniorID"];
 $senLastName= $_POST["senLastName"];
 $senFirstName = $_POST["senFirstName"];
 $senMiddleName = $_POST["senMiddleName"];
 $senStatus = $_POST["senStatus"];
 $HomeAdd= $_POST["HomeAdd"];
 $Birthdate = $_POST["Birthdate"];
 $Gender = $_POST["Gender"];
 $CivilStatus = $_POST["CivilStatus"];
 $SenLandLineNumber = $_POST["SenLandLineNumber"];
 $SenMobileNumber = $_POST["SenMobileNumber"];
 $SenEmailAdd = $_POST["SenEmailAdd"];;  
 $userID = $_POST["userID"]; 
 $userPass = $_POST["userPass"];  
 $nameOfGuardian = $_POST["nameOfGuardian"]; 
 $GuardianMobileNumber = $_POST["GuardianMobileNumber"]; 
 $GuardianLandline = $_POST["GuardianLandline"]; 

 $sql_query = "Select * from seniors where SeniorID like '$seniorID';";
 $result = mysqli_query($con,$sql_query);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }
    else {
        $sql_query = "INSERT INTO seniors (SeniorID,SenLastName,SenFirstName,SenMiddleName,SenStatus, HomeAdd, Birthdate, Gender, CivilStatus, 
        SenLandLineNumber, SenMobileNumber, SenEmailAdd, UserId, UserPassword, QRcode, NameOfGuardian, GuardianMobileNumber, GuardianLandlineNumber, 
        Senior_Citizen, Status)  values ('$seniorID','$senLastName','$senFirstName','$senMiddleName','active','$HomeAdd','1999-06-02','$Gender','$CivilStatus',' 
        $SenLandLineNumber',' $SenMobileNumber','$SenEmailAdd','$userID','$userPass','qrcode','$nameOfGuardian','$GuardianMobileNumber','$GuardianLandline','1','1');";  

        mysqli_query($con,$sql_query);
        printf("result = %s", $row["status"]);
    }
 
 ?>  