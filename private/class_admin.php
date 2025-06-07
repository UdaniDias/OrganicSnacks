<?php
    //importing class_database.php since the Admin class extends the Database class
    require_once("class_database.php");
    class Admin extends Database{
        //own properties
        public $id;
        private $loginName;
        private $password; 

        //inherited static properties from Parent Class
        static public $table_name = "admin";
    }