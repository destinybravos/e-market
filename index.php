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
    
    <div class="container">
        <div class="row my-4">
            <div class="col-12 bg-dark text-light rounded-lg">
                <h4 class="py-1 px-3">
                    Recently Added Products
                </h4>
            </div>
        </div>

        <div class="row" id="products_card_list">
            
        </div>



    </div>


    <!-- Scripts -->
    <script src="js/jquery.js"></script>
    <script src="bootstrap4/js/bootstrap.bundle.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>