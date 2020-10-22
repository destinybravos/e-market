<?php
    session_start();

    // Include the server configuration
    include_once "server_config.php";

    // Recieved Data
    $userid = $_POST['user_id'];
    $pass = md5($_POST['password']);
    $rem = $_POST['remember'];

    // Initialize a response array
    $response = [];

    // Check if the user exists
    $check_user = $conn->query("SELECT * FROM tbl_users WHERE (email='$userid' OR phone='$userid') AND password='$pass'");

    // Check the number of rows/records
    $num_records = $check_user->num_rows;

    if($num_records > 0){
        $_SESSION['active_user'] = $userid;
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