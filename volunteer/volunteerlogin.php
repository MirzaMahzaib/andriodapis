<?php

    include_once('../config/database.php');
    include_once('../objects/volunteercontroller.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare Volunteer object
    $volunteerC = new Volunteer_Controller($db);

    // $volunteerC->volunteerName = isset($_POST['volunteerName']) ? @$_POST['volunteerName'] : die();
    $volunteerC->volunteerName = @$_POST['volunteerName'];
    $volunteerC->phoneNo = @$_POST['phoneNo'];
    
    // $volunteerC->phoneNo = isset($_POST['phoneNo']) ? $_POST['phoneNo'] : die();
    
    // $volunteerC->password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die());
    $volunteerC->password = base64_encode($_POST['password']);

    $stmt = $volunteerC->login();
    if($stmt->rowCount() > 0){
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // create array
        $volunteerC_arr = array(
            "status"            => true,
            "message"           => "Successfully Login",
            "id"                => $row['id'],
            "boothId"           => $row['boothId'],
            "boothName"         => $row['boothName'],
            "volunteerName"     => $row['volunteerName'],
            "phoneNo"           => $row['phoneNo'],
            "apiKey"            => $row['apiKey'],
        );
    }else{
        $volunteerC_arr = array(
            "status"    => false,
            "message"   => "Invalid VolunteerName Or Password"
        );
    }

    // return response in json formate
    print_r(json_encode($volunteerC_arr));

?>