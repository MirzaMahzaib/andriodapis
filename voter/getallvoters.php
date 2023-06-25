<?php

    include_once('../config/database.php');
    include_once('../objects/votercontroller.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare Volunteer object
    $volunteerC = new VoterController($db);

    $stmt = $volunteerC->getAllData();
    if($stmt){

        // make array of all data
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        
    }else{
        $volunteerC_arr = array(
            "status"    => false,
            "message"   => "something Went Wrong"
        );
    }


?>