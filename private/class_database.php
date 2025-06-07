<?PHP
class Database{
    public $id;
    static protected $database; //all static properties
    static protected $table_name = ""; //table name
    static protected $db_columns; //table column name

    //setting the database connection using static setter method
    public static function set_database($db){
        self::$database = $db;
    }

    //Executing all sql queries
    //Finding all functions to get all records
    public static function find_all(){
        //fetching all the records from the specified table
        $sql = "Select * from " . static::$table_name;
        //returning data of the query using find_by_sql() function
        return self::find_by_sql($sql);
    }

    //function to execute all sql queries
    public static function find_by_sql($sql){
        // Execute the SQL query and fetch records from the database
        //Convert the records as objects and storing them in an array
        $records = self::$database->query($sql);
        $object_array = [];

        while ($vr = $records->fetch_assoc()) {
            // Fetches data row from the calling class as an associative array
                $v = new Employee();
            
            // Iterate for each key and value pair in the fetched record
            foreach ($vr as $key => $value) {
                // Set the object's property with the fetched record
                $v->$key = $value;
            }
            // Return the array containing the retrieved object instances of Employee
            $object_array[] = $v;
        }
        return $object_array;
    }

    //find_by_id to find a specific record
    public static function find_by_id($id){
        //query to fetch all records
        $sql = "Select*from " . static::$table_name . " where id = $id";
        //return data of the query using find_by_sql() function
        $r = self::find_by_sql($sql);
        return $r[0];
    }

    //add new records
    public function create(){
        $attr = $this->attributes();
        //query to add records
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(',', array_keys($attr));
        $sql .= ") VALUES ( '";
        $sql .= join("','", array_values($attr)) . "')";

        $r = self::$database->query($sql);

        if ($r) {
            //insert new record to ID
            $this->id = self::$database->insert_id;
        }
        return $r;
    }

    //update records
    public function update($id){
        //array for saving records as key and value pairs
        $attr = $this->attributes();
        $attr_pairs = [];

        foreach ($attr as $k => $v) {
            $attr_pairs[] = "{$k}='{$v}'";
        }
        //query to update records
        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(' , ', $attr_pairs);
        $sql .= " WHERE id='$id'";

        $results = self::$database->query($sql);
        return $results;
    }

    //delete records
    public function delete($id){
        //query to delete records
        $sql = "DELETE FROM " . static::$table_name . " WHERE id=" . $id . " LIMIT 1"; //LIMIT 1 ensures that only one record is deleted
        //return query results
        $results = self::$database->query($sql);
        return $results;
    }

    //$attributes properties that have the database columns excluding 'id'
    public function attributes(){
        //$attributes as an array
        $attributes = [];

        foreach (static::$db_columns as $col) {
            if ($col != 'id'){
                $attributes[$col] = $this->$col;
            }
        }
        return $attributes;
    } 

    //function to verify username and password for login
    public static function verify_user($ln, $pwd){
        //query to get username and password from admin table
        $sql = "SELECT * FROM " . static::$table_name . "
        WHERE loginname= '$ln' AND password= '$pwd' ";
         //return data of the query from find_by_sql() function	
        $result = static::find_by_Sql($sql);
        //return array_shift($result);
        return $result[0];
    }
}//end of the database class
