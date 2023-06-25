<?php

    include_once('../config/database.php');
    include_once('../objects/boothController.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare Volunteer object
    $boothInfo = new BoothController($db);

    $stmt = $boothInfo->getAllData();
    if($stmt){

        // make array of all data
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($row);
        
    }else{
        $boothInfo_arr = array(
            "status"    => false,
            "message"   => "something Went Wrong"
        );
    }


?>