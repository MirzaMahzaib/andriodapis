<?php

    include_once('config/database.php');
    include_once('objects/smsApiController.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare user object 
    $smsApi = new smsApiController($db);
    
    // set user property values 
    $smsApi->boothName      = $_POST['boothName'];
    $smsApi->color          = $_POST['color'];
    $smsApi->voteCastStatus = $_POST['voteCastStatus'];
    $smsApi->message        = $_POST['message'];
    
    // create the new user
    if($smsApi->AddSMS()){
        $smsApi_arr = array(
            "status"    => true,
            "message"   => "New SMS Added Successfully"
        );
    }else{
        $smsApi_arr = array(
            "status"    => false,
            "message"   => "Something Went Wrong"
        );
    }

    print_r(json_encode($smsApi_arr));

?>