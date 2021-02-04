<?php
session_start();

// Include the server configuration
include_once "server_config.php";

    if(isset($_SESSION['active_user']) and $_SESSION['active_user'] != ''){
        $userid = $_SESSION['active_user'];
        $query = $conn->query("SELECT * FROM tbl_users WHERE email='$userid' OR phone='$userid'");
        if($query->num_rows > 0){
            $user = $query->fetch_array();
            echo json_encode([
                'status' => 'success',
                'user' => $user
            ]);
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'User cannot be found!'
            ]);
        }
    }else{
        echo json_encode([
            'status' => 'error',
            'message' => 'No User was found!'
        ]);
    }


?>
        