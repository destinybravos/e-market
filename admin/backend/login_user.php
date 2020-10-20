<?php
    session_start();
    // Dummy Data
    $dummyid = 'db4bravos@yahoo.com';
    $dummypass = '12345';


    // Recieved Data
    $userid = $_POST['user_id'];
    $pass = $_POST['password'];
    $rem = $_POST['remember'];

    // Initialize a response array
    $response = [];

    if($userid === $dummyid and $pass === $dummypass){
        $_SESSION['active_user'] = $dummyid;
        $response = [
            'status' => 'success',
            'message' => 'Login Successfull'
        ];
    }else{
        $response = [
            'status' => 'error',
            'message' => 'Invalid Username or Password'
        ];
    }


    echo json_encode($response)

?>