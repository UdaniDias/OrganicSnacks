<?php
//importing class_database.php since the Employee class extends the Database class
require_once("class_database.php");

class Employee extends Database{  
    //Own Properties
    public $id;
    public $name;
    public $email;
    public $username;
    public $mobileNumber;

    //inherited static properties from Parent Class
    static public $table_name = 'employees';

    static protected $db_columns = ['id','name','email','username', 'mobileNumber'];
}//End of Employee class
