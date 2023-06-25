<?php

    include_once('../config/database.php');
    include_once('../objects/volunteercontroller.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare user object 
    $volunteerC = new Volunteer_Controller($db);
    // print_r($_POST);
    // die();
    
    // set user property values 
    $volunteerC->id = $_POST['id'];
    $volunteerC->boothId = $_POST['boothId'];
    $volunteerC->boothName = $_POST['boothName'];
    $volunteerC->volunteerName = $_POST['volunteerName'];
    $volunteerC->phoneNo = $_POST['phoneNo'];
    $volunteerC->password = base64_encode($_POST['password']);
    $volunteerC->isActive = $_POST['isActive'];
    // $volunteerC->apiKey   = $_POST['apiKey'];
    
    // create the new user
    if($volunteerC->update()){
        $volunteerC_arr = array(
            "status"    => true,
            "message"   => "Volunteer Successfully Updated",
        );
    }else{
        $volunteerC_arr = array(
            "status"    => false,
            "message"   => "Somthing Went Wrong in update volunteer"
        );
    }

    print_r(json_encode($volunteerC_arr));

?>