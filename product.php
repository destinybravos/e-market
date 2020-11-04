<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promarket V3</title>
    <!-- Icon/Shortcut -->
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- CSS Libraries and Styles -->
    <link rel="stylesheet" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="fa/css/all.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body class="bg-light">
    <?php
        include_once "utility/page_header.php";
        include_once "utility/banner.php";
    ?>

    <div class="col-lg-6 mb-4">
            <!-- List of Category card -->
            <div class="card">

                <div class="card-header">
                    <strong class="card-title">
                        <i class="fa fa-list"></i> List of Products
                    </strong>
                </div>

                <div class="card-body p-0" style="max-height:400px; overflow:auto;">
                    <ul class="list-group" id="complete_list">
                        
                    </ul>
                </div>
            </div>
        </div>

    <img src="images/products/" alt="">
    <!-- Scripts -->
    <script src="js/jquery.js"></script>
    <script src="bootstrap4/js/bootstrap.bundle.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>


<script>
    function fetchProduct(){
        $.ajax({
            type: 'post',
            url: 'admin/backend/product_mngr.php',
            data: {action: 'fetch_products'},
            dataType: 'json',
            success: function(response){
                if(response.status === 'success'){
                    $list = '';
                    response.product_list.forEach(function (list) {
                        $list += `<li class="list-group-item row">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="images/products/${list.image}" style="max-width:100%" />
                                        </div>
                                        <div class="col-4">
                                            <h3>${list.product}</h3>
                                        </div>
                                    </div>
                                </li>`;
                    });
                    $('#complete_list').html($list)
                }
            }
        })
    }
    fetchProduct();
</script>