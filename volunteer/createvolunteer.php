<?php

    include_once('../config/database.php');
    include_once('../objects/volunteercontroller.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare user object 
    $volunteerC = new Volunteer_Controller($db);
    
    // set user property values 
    $volunteerC->boothId = $_POST['boothId'];
    $volunteerC->boothName = $_POST['boothName'];
    $volunteerC->volunteerName = $_POST['volunteerName'];
    $volunteerC->phoneNo = $_POST['phoneNo'];
    $volunteerC->password = base64_encode($_POST['password']);
    $volunteerC->isActive = $_POST['isActive'];
    // $volunteerC->apiKey  = $_POST['apiKey'];
    // $volunteerC->apiKey   = $_POST['apiKey'];
    // print_r($_POST);
    // die();
    // create the new user
    if($volunteerC->signup()){
        $volunteerC_arr = array(
            "status"    => true,
            "message"   => "Successfully SignUp",
            "id"        => $volunteerC->id,
            "boothId"        => $volunteerC->boothId,
            "boothName"        => $volunteerC->boothName,
            "volunteerName"    => $volunteerC->volunteerName,
            "phoneNo"    => $volunteerC->phoneNo,
            "apiKey"   => $volunteerC->apiKey,
            "isActive"   => $volunteerC->isActive
        );
    }else{
        $volunteerC_arr = array(
            "status"    => false,
            "message"   => "Volunteer Already Exits"
        );
    }

    print_r(json_encode($volunteerC_arr));

?>