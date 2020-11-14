<?php

    // Include the server configuration
    include_once "server_config.php";

    $product_list = '';

    // Determine the SQL query based on available criterias
    if(isset($_POST['category_id']) and $_POST['category_id'] != ''){
        $category = $_POST['category_id'];
        $sql_statement = "SELECT * FROM tbl_products WHERE category_id='$category'";
    }else{
        $sql_statement = "SELECT * FROM tbl_products";
    }

    $query = $conn->query($sql_statement);

    if($query and $query->num_rows > 0){
        while ($products = $query->fetch_array()) {
            $product_list .= '
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card" style="height:100%;">
                            <div class="card-img-top card-image">
                                <img src="images/products/'. $products['image'] .'" class="card-img-top img-responsive" />
                            </div>
                            <div class="card-body text-left">
                                <h3 class="card-title"> '. $products['product'] .' </h3>
                                <p> &#8358; '. number_format($products['price'], 2) .' </p>
                                <a  href="details.php?product_id='. $products['id'] .'" class="btn btn-sm btn-primary"> <i class="fa fa-eye"></i> View </a>
                                <button class="btn btn-sm btn-warning"> <i class="fas fa-shopping-cart"></i> Add to cart </button>
                            </div>
                        </div>
                    </div>';
        }
    }


    echo $product_list

?>