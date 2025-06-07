<?php
//importing class_database.php since the Product class extends the Database class
require_once("class_database.php");

class Product extends Database{
    //Own Properties
    public $id;
    public $name;
    public $description;
    public $price;

	//Static properies inherited from Parent Class
    static public $table_name = 'products';

    static protected $db_columns = ['id','name','description','price'];
}//End of Product class