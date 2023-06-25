<?php

    include_once('../config/database.php');
    include_once('../objects/votercontroller.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare user object 
    $voterInfo = new VoterController($db);
    
    // set user property values 
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
    $voterInfo->color                   = $_POST['color'];
    $voterInfo->isVoteCasted            = $_POST['isVoteCasted'];
    
    // print_r($_POST);
    // die();
    // create the new user
    if($voterInfo->signup()){
        $voterInfo_arr = array(
            "status"    => true,
            "message"   => "Voter Adde Successfully",
            // "id"        => $voterInfo->id,
            // "boothId"        => $voterInfo->boothId,
            // "boothName"        => $voterInfo->boothName,
            // "volunteerName"    => $voterInfo->volunteerName,
            // "phoneNo"    => $voterInfo->phoneNo,
            // "apiKey"   => $voterInfo->apiKey
        );
    }else{
        $voterInfo_arr = array(
            "status"    => false,
            "message"   => "Volunteer Already Exits"
        );
    }

    print_r(json_encode($voterInfo_arr));

?>