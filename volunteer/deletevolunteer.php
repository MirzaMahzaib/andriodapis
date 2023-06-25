<?php

    include_once('../config/database.php');
    include_once('../objects/volunteercontroller.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare Volunteer object 
    $volunteerC = new Volunteer_Controller($db);
    // print_r($_POST);
    // die();
    
    // set user property values 
    $volunteerC->id = $_POST['id'];
    
    // create the new user
    if($volunteerC->delete()){
        $volunteerC_arr = array(
            "status"    => true,
            "message"   => "Volunteer Successfully Deleted",
        );
    }else{
        $volunteerC_arr = array(
            "status"    => false,
            "message"   => "Somthing Went Wrong in delete volunteer"
        );
    }

    print_r(json_encode($volunteerC_arr));

?>