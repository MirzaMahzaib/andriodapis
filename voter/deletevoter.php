<?php

    include_once('../config/database.php');
    include_once('../objects/votercontroller.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare Voter object 
    $voterInfo = new VoterController($db);
    // print_r($_POST);
    // die();
    
    // set user property values 
    $voterInfo->id = $_POST['id'];
    
    // create the new user
    if($voterInfo->delete()){
        $voterInfo_arr = array(
            "status"    => true,
            "message"   => "Voter Successfully Deleted",
        );
    }else{
        $voterInfo_arr = array(
            "status"    => false,
            "message"   => "Somthing Went Wrong in delete Voter"
        );
    }

    print_r(json_encode($voterInfo_arr));

?>