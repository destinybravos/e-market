<?php

    // Include the server configuration
    include_once "server_config.php";

    $cat_list = '';

    $query = $conn->query("SELECT * FROM tbl_category ORDER BY category ASC LIMIT 4");

    if($query and $query->num_rows > 0){
        while ($category = $query->fetch_array()) {
            $cat_list .= '<li class="nav-item">
                                <a href="products.php?catid=' . $category['id'] . '" class="nav-link">' . $category['category'] . '</a>
                            </li>';
        }
    }
    
    $cat_list .= '<li class="nav-item">
                    <a href="products.php" class="nav-link">All Products</a>
                </li>';

    // $cat_list .= '<li class="nav-item">
    //                 <a href="#" class="nav-link">Other Categories</a>
    //             </li>';

    echo $cat_list

?>