<?php
session_start();

// Include the server configuration
include_once "server_config.php";

if(isset($_SESSION['active_user']) and $_SESSION['active_user'] != ''){
    $userid = $_SESSION['active_user'];
    $query = $conn->query("SELECT * FROM tbl_users WHERE email='$userid' OR phone='$userid'");
    if($query->num_rows > 0){
        // Recieve Image
        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $filename = pathinfo($image, PATHINFO_FILENAME);
        $name = $filename . time() . '.' . $ext;

        if(move_uploaded_file($temp, '../img/profile/' . $name)){
            $user = $query->fetch_array();
            $id = $user['id'];
            $update = $conn->query("UPDATE tbl_users SET photo='$name' WHERE id='$id'");
            if($update){
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Image has been uploaded and updated',
                    'image' => $name
                ]);
            }else{
                unlink('../img/profile/' . $name);
                echo json_encode([
                    'status' => 'error',
                    'message' => 'User info could not be updated'
                ]);
            }
        }else{
            echo json_encode([
                'status' => 'error',
                'message' => 'Image could not be uploaded'
            ]);
        }
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