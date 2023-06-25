<?php

    include_once('../config/database.php');
    include_once('../objects/boothController.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare booth object 
    $booth = new BoothController($db);
    
    // set booth property value
    $booth->boothName = $_POST['boothName'];
    
    // create new booth
    if($booth->AddBooth()){
        $booth_arr = array(
            "status"    => true,
            "message"   => "New Booth Added Successfully"
        );
    }else{
        $booth_arr = array(
            "status"    => false,
            "message"   => "Booth Already Exits"
        );
    }

    print_r(json_encode($booth_arr));

?>