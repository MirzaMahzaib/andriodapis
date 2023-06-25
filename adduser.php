<?php

    include_once('config/database.php');
    include_once('objects/user.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare user object 
    $user = new User($db);
    
    // set user property values 
    $user->username = $_POST['username'];
    $user->email    = $_POST['email'];
    $user->phone_no = $_POST['phone_no'];
    $user->address  = $_POST['address'];
    $user->password = base64_encode($_POST['password']);
    $user->isActive  = $_POST['isActive'];
    // $user->apiKey   = $_POST['apiKey'];
    
    // create the new user
    if($user->signup()){
        $user_arr = array(
            "status"    => true,
            "message"   => "Successfully SignUp",
            "id"        => $user->id,
            "username"  => $user->username,
            "isActive"  => $user->isActive
        );
    }else{
        $user_arr = array(
            "status"    => false,
            "message"   => "User Already Exits"
        );
    }

    print_r(json_encode($user_arr));

?>