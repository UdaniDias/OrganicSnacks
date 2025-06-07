<?php
    //database function establishing a connection to the database
    function db_connect(){
        //function to connect to the MYSQL database using the credentials
        $dbo = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

        //Checking whether the connection is successful or not
        if($dbo-> connect_errno==0){
            echo "Connection to DB succees. <br>";
        }else {
            echo "Connection error. <br>";
        }
        //returns the object $database
        return $dbo;
    } 
?>