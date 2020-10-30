<?php
// Include the server configuration
include_once "backend/server_config.php";

    if(isset($_SESSION['active_user']) and $_SESSION['active_user'] != ''){
        $userid = $_SESSION['active_user'];
        
        // Get all the data of the user
        $check_user = $conn->query("SELECT * FROM tbl_users WHERE email='$userid' OR phone='$userid'");

        // Getin an array of the user's details
        $user_detail = $check_user->fetch_array();
        $firstname = $user_detail['firstname'];
        $lastname = $user_detail['lastname'];
        $phone = $user_detail['phone'];
        $email = $user_detail['email'];
        $dob = $user_detail['dob'];
        
    }else{
        header('location:login.php');
    }
?>


<div id="sidebar">
    <!-- Brand Logo -->
    <div class="py-2 text-center text-white shadow-sm bg-light">
        <img src="../images/logo.png" alt="Promarket Logo" style="max-height:40px;">
    </div>
    <!-- Admin Detail -->
    <div class="my-4 py-2 text-center text-light" id="admin_detail">
        <img src="img/default.png" alt=" " class="rounded-circle bg-light" style="max-width:110px">
        <span class="d-block my-2">
            <?php echo $firstname . ' ' . $lastname ?>
        </span>
        <div class="my-3">
            <a href="#" title="settings"><i class="fa fa-cog p-2"></i></a>
            <a href="#" title="Help"><i class="far fa-question-circle p-2"></i></a>
            <a href="logout.php" title="Logout"><i class="fa fa-sign-out-alt p-2"></i></a>
        </div>

        <div class="input-group mx-auto" id="ingroup">
            <input type="text" name="search" id="search" class="form-control text-light">
            <div class="input-group-append">
                <span class="input-group-text">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <div id="side_menu">
        <nav class="navbar p-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link active pl-4 pagenav" id="dashboard">
                        <i class="fa fa-tachometer-alt mr-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link pl-4" data-toggle="collapse" data-target="#submenu">
                        <i class="fa fa-store mr-2"></i>
                        Store
                    </a>
                    <ul class="collapse" id="submenu">
                        <li class="nav-item">
                            <a href="#" class="nav-link pagenav" id="category">
                                <i class="fa fa-store mr-2"></i>
                                Manage Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link pagenav" id="products">
                                <i class="fa fa-store mr-2"></i>
                                Manage Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link pagenav" id="customers">
                                <i class="fa fa-users mr-2"></i>
                                Manage Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link pagenav" id="orders">
                                <i class="fa fa-shopping-cart mr-2"></i>
                                Manage Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link pagenav" id="payment">
                                <i class="fa fa-money-bill-wave mr-2"></i>
                                Payments
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link pl-4 pagenav" id="profile">
                        <i class="fa fa-user mr-2"></i>
                        Profile
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div id="overlay"></div>
