<?php
/**
 * A class file to connect to database
 */
class DB_CONNECT {

    var $myconn;

  
    /**
     * Function to connect with the database
     */
    function connect() {

    define('DB_USER', "b97ac2cc002c36"); // db user
    define('DB_PASSWORD', "19b6b88b"); // db password (mention your db password here)
    define('DB_DATABASE', "heroku_d738d2345bbb9d5"); // database name
    define('DB_SERVER', "us-cdbr-east-05.cleardb.net"); // db server

// import database connection variables
        //require_once __DIR__ . '/db_config.php';


        // Connecting to mysql database
        $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE) or die(mysqli_error($con));
        $this->myconn = $con;
        // returning connection cursor
        return $this->myconn;
    }
    /**
     * Function to close db connection
     */
    function close($myconn) {
        // closing db connection
        mysqli_close($myconn);
    }
}
?>
