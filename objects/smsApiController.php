<?php

class smsApiController{

    // Database connection and table name
    private $con;
    private $table_name = "smsapi";
    
    // object properties
    public $id;
    public $boothName;
    public $color;
    public $voteCastStatus;
    public $message;
    
    public function __construct($db)
    {
        $this->con = $db;
    }

    // add sms data
    function AddSMS(){

        // query to insert records
        $query = "INSERT INTO " . $this->table_name . " SET boothName=:boothName, color=:color, voteCastStatus=:voteCastStatus, message=:message";
        
        // prepare query, apiKey=:apiKey
        $stmt = $this->con->prepare($query);

        // sanitize
        $this->boothName        = htmlspecialchars(strip_tags($this->boothName));
        $this->color            = htmlspecialchars(strip_tags($this->color));
        $this->voteCastStatus   = htmlspecialchars(strip_tags($this->voteCastStatus));
        $this->message          = htmlspecialchars(strip_tags($this->message));

        // bind values
        $stmt->bindParam(":boothName", $this->boothName);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":voteCastStatus", $this->voteCastStatus);
        $stmt->bindParam(":message", $this->message);
        
        $stmt->execute();
        return true;

    }

}

?>