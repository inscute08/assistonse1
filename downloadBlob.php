<?php





 if($_SERVER['REQUEST_METHOD']=='GET'){

 // include db connect class
    require_once __DIR__ . '/db_connect.php';
 // connecting to db
    $myConnection= new DB_CONNECT();
    $myConnection->connect();
 
  $id = $_GET['id'];
 $sql = "select * from images where id = '$id'";
     
    
     
    $r =mysqli_query($myConnection->myconn, $sql);
    
    
 
 $result = mysqli_fetch_array($r);
 
  header('content-type: image/jpeg');
 
 echo base64_decode($result['image']);
    
    
 


mysqli_close($myConnection->myconn);


 }else{
 echo "Error";
 }
 


?>