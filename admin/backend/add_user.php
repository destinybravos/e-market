<?php

// Include the server configuration
include_once "server_config.php";

// Initialize a response array
$response = [];

// Recieved Data
$fname = $_POST['firstname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$pass = md5($_POST['password']);

// Check if the user exists
$check_user = $conn->query("SELECT * FROM tbl_users WHERE email='$email' OR phone='$phone'");

// Check the number of rows/records
$num_records = $check_user->num_rows;
if($num_records > 0){
    $response = [
        'status' => 'error',
        'msg' => 'User with these credentials already exists!'
    ];

}else{
    // Insert the  record 
    $insert = $conn->query("INSERT INTO tbl_users(firstname, email, phone, password) 
                VALUES('$fname','$email','$phone','$pass')");
    
    if($insert){
        $response = [
            'status' => 'success',
            'msg' => 'User added successfully!'
        ];
    }else{
        $response = [
            'status' => 'error',
            'msg' => 'An error occurred! ' . $conn->error
        ];
    }
}

echo json_encode($response);

?>