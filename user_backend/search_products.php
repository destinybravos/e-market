<?php

    // Include the server configuration
    include_once "server_config.php";

    $product_list = '';

    // Determine the SQL query based on available criterias
    if(isset($_POST['criteria']) and $_POST['criteria'] != ''){
        $criteria = $_POST['criteria'];
        // Search if criteria is a category
        $catid = checkCategory($criteria, $conn);


        $sql_statement = "SELECT * FROM tbl_products WHERE 
                    product LIKE '%" . $criteria . "%'
                    OR description LIKE '%" . $criteria . "%'
                    OR category_id = '$catid'";
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
    }else{
        $product_list .= '
                    <div class="col-md-12 mb-4">
                        <div class="card" style="height:100%;">
                            <div class="card-body text-left">
                                <h3 class="card-title"> No product found! </h3>
                            </div>
                        </div>
                    </div>';
    }


    echo $product_list;


    function checkCategory($search_criteria, $connObj){
        $cat_query = $connObj->query("SELECT * FROM tbl_category WHERE category LIKE '%$search_criteria%'");
        if($cat_query->num_rows > 0){
            $category = $cat_query->fetch_array();
            return $category['id'];
        }else{
            return 0;
        }
    }

?>