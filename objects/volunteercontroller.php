<?php

class Volunteer_Controller{

    // Database connection and table name
    private $con;
    private $table_name = "volunteer";
    
    // object properties
    public $id;
    public $boothId;
    public $boothName;
    public $volunteerName;
    public $phoneNo;
    public $password;
    public $apiKey;
    public $isActive;
    
    public function __construct($db)
    {
        $this->con = $db;
    }

    // user signup
    function signup(){
        if($this->isAlreadyExits() == true){
            // echo 'in check';
            return false;
        }
        function createRandomPassword() { 

            $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
            srand((double)microtime()*1000000); 
            $i = 0; 
            $pass = '' ; 
        
            while ($i <= 21) { 
                $num = rand() % 33; 
                $tmp = substr($chars, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
            } 
        
            return $pass; 
        
        }
        // print_r($_POST);
        // die();
        // query to insert records
        $query = "INSERT INTO " . $this->table_name . " SET boothId=:boothId, boothName=:boothName, volunteerName=:volunteerName, phoneNo=:phoneNo, password=:password, apiKey=:apiKey, isActive=:isActive";
        
        // prepare query, apiKey=:apiKey
        $stmt = $this->con->prepare($query);

        // sanitize
        $this->boothId = htmlspecialchars(strip_tags($this->boothId));
        $this->boothName = htmlspecialchars(strip_tags($this->boothName));
        $this->volunteerName = htmlspecialchars(strip_tags($this->volunteerName));
        $this->phoneNo    = htmlspecialchars(strip_tags($this->phoneNo));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->apiKey    = htmlspecialchars(strip_tags(createRandomPassword()));
        $this->isActive = htmlspecialchars(strip_tags($this->isActive));
        // $this->apiKey = htmlspecialchars(strip_tags($this->apiKey));

        // bind values
        $stmt->bindParam(":boothId", $this->boothId);
        $stmt->bindParam(":boothName", $this->boothName);
        $stmt->bindParam(":volunteerName", $this->volunteerName);
        $stmt->bindParam(":phoneNo", $this->phoneNo);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":apiKey", $this->apiKey);
        $stmt->bindParam(":isActive", $this->isActive);
        // $stmt->bindParam(":apiKey", $this->apiKey);
        
        if($stmt->execute()){
            $this->id = $this->con->lastInsertId();
            return true;
        }
        
        return false;

    }

    // login Volunteer
    function login(){
        
        if(!empty($_POST['volunteerName'])){
            // login credential query
            $query = "SELECT * FROM " . $this->table_name . " WHERE volunteerName = :volunteerName AND password = :password";

            // prepare query statement
            $stmt = $this->con->prepare($query);
    
            $this->volunteerName = htmlspecialchars(strip_tags($this->volunteerName));
            $stmt->bindParam(":volunteerName", $this->volunteerName);
            $this->password = htmlspecialchars(strip_tags($this->password));
            $stmt->bindParam(":password", $this->password);
        }else{
            // login credential query
            $query = "SELECT * FROM " . $this->table_name . " WHERE phoneNo = :phoneNo AND password = :password";

            // prepare query statement
            $stmt = $this->con->prepare($query);
    
            $this->phoneNo = htmlspecialchars(strip_tags($this->phoneNo));
            $stmt->bindParam(":phoneNo", $this->phoneNo);
            $this->password = htmlspecialchars(strip_tags($this->password));
            $stmt->bindParam(":password", $this->password);
        }
        // print_r($query);
        // die();


        // execute query
        $stmt->execute();
        return $stmt;

    }

    // getting all volunteers
    function getAllData(){

        // select all query
        $query = "SELECT * FROM " . $this->table_name . "";

        // prepare query statement
        $stmt = $this->con->prepare($query);

        // execute query
        $stmt->execute();
        return $stmt;

    }

    // Update volunteer
    function update(){

        // query to insert records
        $query = "UPDATE " . $this->table_name . " SET boothId = :boothId, boothName = :boothName, volunteerName = :volunteerName, phoneNo = :phoneNo, password = :password, isActive=:isActive WhERE id = :id";
        
        // prepare query, apiKey=:apiKey
        $stmt = $this->con->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->boothId = htmlspecialchars(strip_tags($this->boothId));
        $this->boothName = htmlspecialchars(strip_tags($this->boothName));
        $this->volunteerName = htmlspecialchars(strip_tags($this->volunteerName));
        $this->phoneNo    = htmlspecialchars(strip_tags($this->phoneNo));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->isActive = htmlspecialchars(strip_tags($this->isActive));
        // $this->apiKey = htmlspecialchars(strip_tags($this->apiKey));

        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":boothId", $this->boothId);
        $stmt->bindParam(":boothName", $this->boothName);
        $stmt->bindParam(":volunteerName", $this->volunteerName);
        $stmt->bindParam(":phoneNo", $this->phoneNo);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":isActive", $this->isActive);
        
        $stmt->execute();
        return $stmt;

    }

    // delete volunteer
    function delete(){
        
        // query to insert records
        $query = "DELETE FROM " . $this->table_name . " WhERE id = :id";

        // prepare query, apiKey=:apiKey
        $stmt = $this->con->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        // return $stmt;

    }

    function isAlreadyExits(){
        // print_r($_POST);
        // die();
        $query = "SELECT * FROM " . $this->table_name . " WHERE volunteername = '" . $this->volunteerName . "'";
        
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