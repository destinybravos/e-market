<?php

    // Include the server configuration
    include_once "server_config.php";

    $product_list = '';

    $query = $conn->query("SELECT * FROM tbl_products");

    if($query and $query->num_rows > 0){
        while ($products = $query->fetch_array()) {
            $product_list .= '
                    <a href="details.php?product_id='. $products['id'] .'" class="col-md-6 col-lg-4 mb-4">
                        <div class="card">
                            <img src="images/products/'. $products['image'] .'" class="card-img-top img-responsive" />
                            <div class="card-body p-0 text-left">
                                <h3 class="card-title"> '. $products['product'] .' </h3>
                            </div>
                        </div>
                    </a>';
        }
    }


    echo $product_list

?>