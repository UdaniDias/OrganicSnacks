<?php
    require_once("credentials.php"); //getting the db credentials
    require_once("db_functions.php"); //getting the db functions
    require_once("class_product.php"); //getting all the necessary classes
    require_once("class_employee.php");
    require_once("class_admin.php");

    //calling the connection function to connect to the db
    $db = db_connect(); 
    //setting database for the parent class
    Database::set_database($db);
