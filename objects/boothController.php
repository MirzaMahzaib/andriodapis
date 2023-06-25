<?php

class BoothController{

    // Database connection and table name
    private $con;
    private $table_name = "boothapi";
    
    // object properties
    public $id;
    public $boothName;
    
    public function __construct($db)
    {
        $this->con = $db;
    }

    // get all voters
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

    // booth added
    function AddBooth(){
        
        if($this->isAlreadyExits() == true){
            return false;
        }
        // query to insert records
        $query = "INSERT INTO " . $this->table_name . " SET boothName=:boothName";
        
        // prepare query
        $stmt = $this->con->prepare($query);

        // sanitize
        $this->boothName = htmlspecialchars(strip_tags($this->boothName));

        // bind values
        $stmt->bindParam(":boothName", $this->boothName);
        
        $stmt->execute();
        return true;

    }

    function isAlreadyExits(){
        
        $query = "SELECT * FROM " . $this->table_name . " WHERE boothName = '" . $this->boothName . "'";
        // prepare query
        $stmt = $this->con->prepare($query);
        // execute query
        $stmt->execute();
        
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }

}

?>