<?php

    // Include the server configuration
    include_once "server_config.php";

    // Initialize an empty response array
    $response = [];

    $action = $_POST['action'];

    if($action === 'save'){
        // Image Processing
        $image = $_FILES['image']['name'];
        $temp_img = $_FILES['image']['tmp_name'];

        $image_name = pathinfo($image, PATHINFO_FILENAME);
        $image_ext = pathinfo($image, PATHINFO_EXTENSION);
        $name2store = $image_name . time() . '.' . $image_ext;

        $path2upload = '../../images/products/' . $name2store;

        if(move_uploaded_file($temp_img, $path2upload)){
            // Get other data
            $product = $_POST['product_name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $desc = $_POST['desc'];
            $cat_id = $_POST['category'];
            $insert_product = $conn->query("INSERT INTO tbl_products(product, category_id, price, discount, image, description) 
                VALUES('$product','$cat_id','$price','$discount','$name2store','$desc')");

            if($insert_product){
                $response = [
                    'status' => 'success',
                    'message' => 'Uploaded successfully!'
                ];
            }else{
                unlink($path2upload); //Delete the image that has been uploaded
                $response = [
                    'status' => 'error',
                    'message' => 'An error occured! ' . $conn->error
                ];
            }

        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! Unable to upload image.'
            ];
        }
        

    }elseif($action == 'fetch_products'){
        $fetch = $conn->query("SELECT * FROM tbl_products");
        $list = [];
        while ($products = $fetch->fetch_array()) {
            array_push($list, $products);
        }
        $response = [
            'status' => 'success',
            'product_list' => $list
        ];
    }

    


    // Return  the response array as json
    echo json_encode($response)


?>