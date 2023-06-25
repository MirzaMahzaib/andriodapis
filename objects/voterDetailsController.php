<?php

class voterDetailsController{

    // Database connection and table name
    private $con;
    private $table_name = "voterdetails";
    
    public function __construct($db)
    {
        $this->con = $db;
    }

    // get all voter details
    function getAllData(){
        // echo $this->name;
        // select all query
        $query = "SELECT * FROM " . $this->table_name . "";

        // prepare query statement
        $stmt = $this->con->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;

    }

}

?>