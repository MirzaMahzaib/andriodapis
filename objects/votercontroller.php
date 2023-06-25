<?php

class VoterController{

    // Database connection and table name
    private $con;
    private $table_name = "voters";
    
    // object properties
    public $id;
    public $acNo;
    public $boothId;
    public $sectinoNo;
    public $voterListId;
    public $voterHouseNo;
    public $voterHouseAddress;
    public $voterId;
    public $voterGender;
    public $voterAge;
    public $voterName;
    public $voterLastName;
    public $voterNameOL;
    public $voterLastNameOL;
    public $relation;
    public $relationName;
    public $relationOL;
    public $relationNameOL;
    public $sectionName;
    public $sectionNameOL;
    public $voterMobileNo;
    public $pollingStnAddress;
    public $pollingStnAddressOL;
    public $color;
    public $isVoteCasted;
    
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

    // user signup
    function signup(){
        
        // query to insert records
        $query = "INSERT INTO " . $this->table_name . " SET 
        AC_NO=:AC_NO,
        Booth_ID=:Booth_ID,
        SECTION_NO=:SECTION_NO,
        VoterList_ID=:VoterList_ID,
        Voter_House_No=:Voter_House_No,
        Voter_House_Address=:Voter_House_Address,
        Voter_Id=:Voter_Id,
        Voter_Gender=:Voter_Gender,
        Voter_Age=:Voter_Age,
        Voter_Name=:Voter_Name,
        Voter_Last_Name=:Voter_Last_Name,
        Voter_Name_OL=:Voter_Name_OL,
        Voter_Last_Name_OL=:Voter_Last_Name_OL,
        Relation=:Relation,
        Relation_Name=:Relation_Name,
        Relation_OL=:Relation_OL,
        Relation_Name_OL=:Relation_Name_OL,
        Section_Name=:Section_Name,
        Section_Name_OL=:Section_Name_OL,
        Voter_Mobile_No=:Voter_Mobile_No,
        Polling_Stn_Address=:Polling_Stn_Address,
        Polling_Stn_Address_OL=:Polling_Stn_Address_OL,
        color=:color,
        isVoteCasted=:isVoteCasted
        ";
        
        // print_r( 
        // prepare query, apiKey=:apiKey
        $stmt = $this->con->prepare($query);
        
        // sanitize
        $this->acNo = htmlspecialchars(strip_tags($this->acNo));
        $this->boothId = htmlspecialchars(strip_tags($this->boothId));
        $this->sectinoNo = htmlspecialchars(strip_tags($this->sectinoNo));
        $this->voterListId = htmlspecialchars(strip_tags($this->voterListId));
        $this->voterHouseNo = htmlspecialchars(strip_tags($this->voterHouseNo));
        $this->voterHouseAddress = htmlspecialchars(strip_tags($this->voterHouseAddress));
        $this->voterId = htmlspecialchars(strip_tags($this->voterId));
        $this->voterGender = htmlspecialchars(strip_tags($this->voterGender));
        $this->voterAge = htmlspecialchars(strip_tags($this->voterAge));
        $this->voterName    = htmlspecialchars(strip_tags($this->voterName));
        $this->voterLastName    = htmlspecialchars(strip_tags($this->voterLastName));
        $this->voterNameOL    = htmlspecialchars(strip_tags($this->voterNameOL));
        $this->voterLastNameOL    = htmlspecialchars(strip_tags($this->voterLastNameOL));
        $this->relation    = htmlspecialchars(strip_tags($this->relation));
        $this->relationName    = htmlspecialchars(strip_tags($this->relationName));
        $this->relationOL    = htmlspecialchars(strip_tags($this->relationOL));
        $this->relationNameOL    = htmlspecialchars(strip_tags($this->relationNameOL));
        $this->sectionName    = htmlspecialchars(strip_tags($this->sectionName));
        $this->sectionNameOL    = htmlspecialchars(strip_tags($this->sectionNameOL));
        $this->voterMobileNo    = htmlspecialchars(strip_tags($this->voterMobileNo));
        $this->pollingStnAddress    = htmlspecialchars(strip_tags($this->pollingStnAddress));
        $this->pollingStnAddressOL    = htmlspecialchars(strip_tags($this->pollingStnAddressOL));
        $this->color    = htmlspecialchars(strip_tags($this->color));
        $this->isVoteCasted    = htmlspecialchars(strip_tags($this->isVoteCasted));

        // bind values
        $stmt->bindParam(":AC_NO", $this->acNo);
        $stmt->bindParam(":Booth_ID", $this->boothId);
        $stmt->bindParam(":SECTION_NO", $this->sectinoNo);
        $stmt->bindParam(":VoterList_ID", $this->voterListId);
        $stmt->bindParam(":Voter_House_No", $this->voterHouseNo);
        $stmt->bindParam(":Voter_House_Address", $this->voterHouseAddress);
        $stmt->bindParam(":Voter_Id", $this->voterId);
        $stmt->bindParam(":Voter_Gender", $this->voterGender);
        $stmt->bindParam(":Voter_Age", $this->voterAge);
        $stmt->bindParam(":Voter_Name", $this->voterName);
        $stmt->bindParam(":Voter_Last_Name", $this->voterLastName);
        $stmt->bindParam(":Voter_Name_OL", $this->voterNameOL);
        $stmt->bindParam(":Voter_Last_Name_OL", $this->voterLastNameOL);
        $stmt->bindParam(":Relation", $this->relation);
        $stmt->bindParam(":Relation_Name", $this->relationName);
        $stmt->bindParam(":Relation_OL", $this->relationOL);
        $stmt->bindParam(":Relation_Name_OL", $this->relationNameOL);
        $stmt->bindParam(":Section_Name", $this->sectionName);
        $stmt->bindParam(":Section_Name_OL", $this->sectionNameOL);
        $stmt->bindParam(":Voter_Mobile_No", $this->voterMobileNo);
        $stmt->bindParam(":Polling_Stn_Address", $this->pollingStnAddress);
        $stmt->bindParam(":Polling_Stn_Address_OL", $this->pollingStnAddressOL);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":isVoteCasted", $this->isVoteCasted);
        // $stmt->bindParam(":apiKey", $this->apiKey);
        
        if($stmt->execute()){
            $this->id = $this->con->lastInsertId();
            return true;
        }
        
        return false;

    }

    // Update volunteer
    function update(){

        // query to insert records
        $query = "UPDATE " . $this->table_name . " SET 
        AC_NO=:AC_NO,
        Booth_ID=:Booth_ID,
        SECTION_NO=:SECTION_NO,
        VoterList_ID=:VoterList_ID,
        Voter_House_No=:Voter_House_No,
        Voter_House_Address=:Voter_House_Address,
        Voter_Id=:Voter_Id,
        Voter_Gender=:Voter_Gender,
        Voter_Age=:Voter_Age,
        Voter_Name=:Voter_Name,
        Voter_Last_Name=:Voter_Last_Name,
        Voter_Name_OL=:Voter_Name_OL,
        Voter_Last_Name_OL=:Voter_Last_Name_OL,
        Relation=:Relation,
        Relation_Name=:Relation_Name,
        Relation_OL=:Relation_OL,
        Relation_Name_OL=:Relation_Name_OL,
        Section_Name=:Section_Name,
        Section_Name_OL=:Section_Name_OL,
        Voter_Mobile_No=:Voter_Mobile_No,
        Polling_Stn_Address=:Polling_Stn_Address,
        Polling_Stn_Address_OL=:Polling_Stn_Address_OL,
        color=:color,
        isVoteCasted=:isVoteCasted
        WhERE id = :id
        ";
        
        // prepare query, apiKey=:apiKey
        $stmt = $this->con->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->acNo = htmlspecialchars(strip_tags($this->acNo));
        $this->boothId = htmlspecialchars(strip_tags($this->boothId));
        $this->sectinoNo = htmlspecialchars(strip_tags($this->sectinoNo));
        $this->voterListId = htmlspecialchars(strip_tags($this->voterListId));
        $this->voterHouseNo = htmlspecialchars(strip_tags($this->voterHouseNo));
        $this->voterHouseAddress = htmlspecialchars(strip_tags($this->voterHouseAddress));
        $this->voterId = htmlspecialchars(strip_tags($this->voterId));
        $this->voterGender = htmlspecialchars(strip_tags($this->voterGender));
        $this->voterAge = htmlspecialchars(strip_tags($this->voterAge));
        $this->voterName    = htmlspecialchars(strip_tags($this->voterName));
        $this->voterLastName    = htmlspecialchars(strip_tags($this->voterLastName));
        $this->voterNameOL    = htmlspecialchars(strip_tags($this->voterNameOL));
        $this->voterLastNameOL    = htmlspecialchars(strip_tags($this->voterLastNameOL));
        $this->relation    = htmlspecialchars(strip_tags($this->relation));
        $this->relationName    = htmlspecialchars(strip_tags($this->relationName));
        $this->relationOL    = htmlspecialchars(strip_tags($this->relationOL));
        $this->relationNameOL    = htmlspecialchars(strip_tags($this->relationNameOL));
        $this->sectionName    = htmlspecialchars(strip_tags($this->sectionName));
        $this->sectionNameOL    = htmlspecialchars(strip_tags($this->sectionNameOL));
        $this->voterMobileNo    = htmlspecialchars(strip_tags($this->voterMobileNo));
        $this->pollingStnAddress    = htmlspecialchars(strip_tags($this->pollingStnAddress));
        $this->pollingStnAddressOL    = htmlspecialchars(strip_tags($this->pollingStnAddressOL));
        $this->color    = htmlspecialchars(strip_tags($this->color));
        $this->isVoteCasted    = htmlspecialchars(strip_tags($this->isVoteCasted));

        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":AC_NO", $this->acNo);
        $stmt->bindParam(":Booth_ID", $this->boothId);
        $stmt->bindParam(":SECTION_NO", $this->sectinoNo);
        $stmt->bindParam(":VoterList_ID", $this->voterListId);
        $stmt->bindParam(":Voter_House_No", $this->voterHouseNo);
        $stmt->bindParam(":Voter_House_Address", $this->voterHouseAddress);
        $stmt->bindParam(":Voter_Id", $this->voterId);
        $stmt->bindParam(":Voter_Gender", $this->voterGender);
        $stmt->bindParam(":Voter_Age", $this->voterAge);
        $stmt->bindParam(":Voter_Name", $this->voterName);
        $stmt->bindParam(":Voter_Last_Name", $this->voterLastName);
        $stmt->bindParam(":Voter_Name_OL", $this->voterNameOL);
        $stmt->bindParam(":Voter_Last_Name_OL", $this->voterLastNameOL);
        $stmt->bindParam(":Relation", $this->relation);
        $stmt->bindParam(":Relation_Name", $this->relationName);
        $stmt->bindParam(":Relation_OL", $this->relationOL);
        $stmt->bindParam(":Relation_Name_OL", $this->relationNameOL);
        $stmt->bindParam(":Section_Name", $this->sectionName);
        $stmt->bindParam(":Section_Name_OL", $this->sectionNameOL);
        $stmt->bindParam(":Voter_Mobile_No", $this->voterMobileNo);
        $stmt->bindParam(":Polling_Stn_Address", $this->pollingStnAddress);
        $stmt->bindParam(":Polling_Stn_Address_OL", $this->pollingStnAddressOL);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":isVoteCasted", $this->isVoteCasted);
        
        $stmt->execute();
        return $stmt;

    }

    // delete voter
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

    // login user
    function login(){
        // echo $this->name;
        // select all query
        $query = "SELECT * FROM " . $this->table_name . " WHERE name = '" . $this->name ."'";

        // prepare query statement
        $stmt = $this->con->prepare($query);
        // execute query
        $stmt->execute();
        // print_r($stmt);
        // die();
        return $stmt;

    }

}

?>