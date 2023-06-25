<?php

    include_once('../config/database.php');
    include_once('../objects/votercontroller.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare user object 
    $voterInfo = new VoterController($db);
    
    // set user property values 
    $voterInfo->id                      = $_POST['id'];
    $voterInfo->acNo                    = $_POST['acNo'];
    $voterInfo->boothId                 = $_POST['boothId'];
    $voterInfo->sectinoNo               = $_POST['sectinoNo'];
    $voterInfo->voterListId             = $_POST['voterListId'];
    $voterInfo->voterHouseNo            = $_POST['voterHouseNo'];
    $voterInfo->voterHouseAddress       = $_POST['voterHouseAddress'];
    $voterInfo->voterId                 = $_POST['voterId'];
    $voterInfo->voterGender             = $_POST['voterGender'];
    $voterInfo->voterAge                = $_POST['voterAge'];
    $voterInfo->voterName               = $_POST['voterName'];
    $voterInfo->voterLastName           = $_POST['voterLastName'];
    $voterInfo->voterNameOL             = $_POST['voterNameOL'];
    $voterInfo->voterLastNameOL         = $_POST['voterLastNameOL'];
    $voterInfo->relation                = $_POST['relation'];
    $voterInfo->relationName            = $_POST['relationName'];
    $voterInfo->relationOL              = $_POST['relationOL'];
    $voterInfo->relationNameOL          = $_POST['relationNameOL'];
    $voterInfo->sectionName             = $_POST['sectionName'];
    $voterInfo->sectionNameOL           = $_POST['sectionNameOL'];
    $voterInfo->voterMobileNo           = $_POST['voterMobileNo'];
    $voterInfo->pollingStnAddress       = $_POST['pollingStnAddress'];
    $voterInfo->pollingStnAddressOL     = $_POST['pollingStnAddressOL'];
    
    // create the new user
    if($voterInfo->update()){
        $voterInfo_arr = array(
            "status"    => true,
            "message"   => "Voter Successfully Updated",
        );
    }else{
        $voterInfo_arr = array(
            "status"    => false,
            "message"   => "Somthing Went Wrong in update Voter"
        );
    }

    print_r(json_encode($voterInfo_arr));

?>