<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="icon" href="../images/favicon.png">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" href="../fa/css/all.css">
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
    
<?php
    include_once 'sidebar.php';
?>

<div id="main" class="bg-light">
<?php
    include_once 'navbar.php';
?>
<div class="site_content">
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <h4>Hello</h4>
            </div>
        </div>
    </div>
</div>
</div>


<script src="../js/jquery.js"></script>
<script src="../bootstrap4/js/bootstrap.bundle.js"></script>
<script src="js/admin_script.js"></script>
</body>
</html>