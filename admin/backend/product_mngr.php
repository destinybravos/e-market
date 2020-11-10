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
    }elseif ($action === 'view') {
        $id = $_POST['id'];
        $getdata = $conn->query("SELECT * FROM tbl_products WHERE id='$id'");
        if($getdata->num_rows > 0){
            $product = $getdata->fetch_array();
            $response = [
                'status' => 'success',
                'product' => $product,
                'category' => getCategory($product['category_id'], $conn)
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! Product not found.'
            ];
        }
    }elseif ($action === 'delete') {
        $id = $_POST['id'];
        $getdata = $conn->query("SELECT * FROM tbl_products WHERE id='$id'");
        $product = $getdata->fetch_array();
        $delete = $conn->query("DELETE FROM tbl_products WHERE id='$id'");
        if($delete){
            if(unlink('../../images/products/' . $product['image'])){ //Delete the image from the folder
                $response = [
                    'status' => 'success'
                ];
            }else{
                $response = [
                    'status' => 'error',
                    'message' => 'An error occured! Unable to delete product image.'
                ];
            }
        }else{
            $response = [
                'status' => 'error',
                'message' => 'An error occured! Product could not be deleted.'
            ];
        }
    }elseif ($action === 'update') {

        $product_id = $_POST['id']; //get the product id from the request
        $current_image = '';
        
        // Fetch the image
        $data = $conn->query("SELECT image FROM tbl_products WHERE id='$product_id'");
        $image_data = $data->fetch_array();
        $current_image = $image_data['image'];

        // Check the presence of image
        if(isset($_FILES['image'])){
            // Image Processing
            $image = $_FILES['image']['name'];
            $temp_img = $_FILES['image']['tmp_name'];

            $image_name = pathinfo($image, PATHINFO_FILENAME);
            $image_ext = pathinfo($image, PATHINFO_EXTENSION);
            $name2store = $image_name . time() . '.' . $image_ext;

            $path2upload = '../../images/products/' . $name2store;

            // Upload the new Image
            if(move_uploaded_file($temp_img, $path2upload)){
                // delete the $current_image
                unlink('../../images/products/' . $current_image);
            }else{
                $path2upload = '';
            }
        }else{
            $path2upload = '';
        }

            // Get other data
            $product = $_POST['product_name'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $desc = $_POST['desc'];
            $cat_id = $_POST['category'];
            $name2store = $path2upload == '' ? $current_image : $name2store ;

            $update_product = $conn->query("UPDATE tbl_products SET product='$product', category_id='$cat_id', 
                price='$price', discount='$discount', image='$name2store', description='$desc' WHERE id='$product_id'");

            if($update_product){
                $response = [
                    'status' => 'success',
                    'message' => 'Updated successfully!'
                ];
            }else{
                unlink($path2upload); //Delete the image that has been uploaded
                $response = [
                    'status' => 'error',
                    'message' => 'An error occured! ' . $conn->error
                ];
            }
    }


    


    // Return  the response array as json
    echo json_encode($response);

    function getCategory($cat_id, $conObj)
    {
        $category = $conObj->query("SELECT category FROM tbl_category WHERE id='$cat_id'");
        $cat = $category->fetch_array();
        return $cat['category'];
    }


?>