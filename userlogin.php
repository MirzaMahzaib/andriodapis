<?php

    include_once('config/database.php');
    include_once('objects/user.php');

    // get databse connection
    $database = new Database();
    $db = $database->getConnection();

    // prepare user object
    $user = new User($db);

    $user->email = isset($_POST['email']) ? $_POST['email'] : die();
    $user->password = base64_encode(isset($_POST['password']) ? $_POST['password'] : die());

    $stmt = $user->login();
    if($stmt->rowCount() > 0){
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        // create array
        $user_arr = array(
            "status"    => true,
            "message"   => "Successfully Login",
            "id"        => $row['id'],
            "username"  => $row['username'],
        );
    }else{
        $user_arr = array(
            "status"    => false,
            "message"   => "Invalid Username Or Password"
        );
    }

    // return response in json formate
    print_r(json_encode($user_arr));

?>