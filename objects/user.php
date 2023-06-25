<?php

class User{

    // Database connection and table name
    private $con;
    private $table_name = "users";
    
    // object properties
    public $id;
    public $username;
    public $email;
    public $phone_no;
    public $address;
    public $password;
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

        // query to insert records
        $query = "INSERT INTO " . $this->table_name . " SET username=:username, email=:email, phone_no=:phone_no, address=:address, password=:password, isActive=:isActive";
        
        // prepare query, apiKey=:apiKey
        $stmt = $this->con->prepare($query);

        // sanitize
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email    = htmlspecialchars(strip_tags($this->email));
        $this->phone_no    = htmlspecialchars(strip_tags($this->phone_no));
        $this->address    = htmlspecialchars(strip_tags($this->address));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->isActive = htmlspecialchars(strip_tags($this->isActive));
        // $this->apiKey = htmlspecialchars(strip_tags($this->apiKey));

        // bind values
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phone_no", $this->phone_no);
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":isActive", $this->isActive);
        // $stmt->bindParam(":apiKey", $this->apiKey);
        
        if($stmt->execute()){
            $this->id = $this->con->lastInsertId();
            return true;
        }
        
        return false;

    }

    // login user
    function login(){

        // select all query
        $query = "SELECT id, username, email FROM " . $this->table_name . " WHERE email = '" . $this->email . "' AND password = '" . $this->password . "'";

        // prepare query statement
        $stmt = $this->con->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;

    }

    function isAlreadyExits(){
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = '" . $this->username . "'";
        
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