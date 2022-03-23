<?php
 require 'connect.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
 
 $image = $_POST['image'];
 
 
 $path = "db/image/$image.png";
 
 $actualpath = "http://192.168.0.196/assistonse2/dashboard/images/news/$path";
 
 $sql = "UPDATE seniors SET idImage = '$image' WHERE seniors.SeniorID = '20118980';";
 
 if(mysqli_query($con,$sql)){
 file_put_contents($path,base64_decode($image));
 echo "Successfully Uploaded";
 
 mysqli_close($con);
 }else{
 echo "Error";
 }
}
 

?>