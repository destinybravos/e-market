<?php

    // Include the server configuration
    include_once "server_config.php";

    // Initialize an empty response array
    $response = [];

    $action = $_POST['action'];

    if($action == 'count'){
        $categories = $conn->query("SELECT * FROM tbl_category");
        if($categories){
            $response = [
                'status' => 'success',
                'no_categories' => $categories->num_rows
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! ' . $conn->error
            ];
        }
    }elseif($action == 'add'){
        $category = $_POST['category'];
        $add_query = $conn->query("INSERT INTO tbl_category(category) VALUES('$category')");
        if($add_query){
            $response = [
                'status' => 'success',
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! ' . $conn->error
            ];
        }
    }elseif($action == 'list'){
        $categories = $conn->query("SELECT category FROM tbl_category");
        if($categories){
            $list = [];
            while ($data = $categories->fetch_array()) {
                array_push($list, $data['category']);
            }
            $response = [
                'status' => 'success',
                'cat_list' => $list
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! ' . $conn->error
            ];
        }
    }



    // Return  the response array as json
    echo json_encode($response)


?>