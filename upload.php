<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */


 
// check for required fields
if (  isset($_POST['image'])   ) {
 
    $image = $_POST['image'];
 
  // include db connect class
    require_once __DIR__ . '/db_connect.php';
 // connecting to db
    $myConnection= new DB_CONNECT();
    $myConnection->connect();
 
  
     
    
     $sqlCommand = "INSERT INTO images (image) VALUES ('".$image."')";
     
     
    $result =mysqli_query($myConnection->myconn, "$sqlCommand");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>