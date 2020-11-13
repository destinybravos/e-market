<div class="container-fluid bg-primary-blue text-light p-1">
    <div class="container">
        <div class="row">
        </div>
    </div>
</div>

<nav class="container-fluid bg-white shadow-sm sticky-top">
    <!-- Brand, Search, Quick Nav -->
    <div class="container">
        <div class="row">

            <div class="col-md-2 py-2">

                <div class="mr-2 d-inline-block d-md-none" data-toggle="collapse" data-target="#main_nav">
                    <i class="fa fa-bars" style="font-size:1.3rem;"></i>
                </div>

                <a href="index.php" style="text-decoration:none;">
                <img src="images/logo.png" alt="logo" style="max-height:40px; max-width:100%; vertical-align:middle;">
                </a>

                <div class="float-right d-block d-md-none" style="text-align:right;font-size:1.3rem;">
                    <button class="btn btn-sm">
                        <i class="far fa-user"></i>
                    </button>
                    <button class="btn btn-sm">
                        <i class="fa fa-shopping-cart"></i>
                    </button>
                    <button class="btn btn-sm" id="mb-search-btn">
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="col-md-5 py-2" id="top_search">
                <form name="navbar_search">
                    <div class="input-group">
                        <input class="form-control" placeholder="search for a product, brand and category" type="search" name="input_search" id="input_search">
                        <div class="input-group-append" role="button" id="search_btn">
                            <span class="input-group-text">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-5 py-2 d-none d-md-block" style="text-align:right;">
                <div class="dropdown inblock">
                    <button class="btn btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i>
                        Login
                    </button>
                    <div class="dropdown-menu">
                        <li class="dropdown-item">
                            cfdfdsfdf
                        </li>
                    </div>
                </div>
                <div class="dropdown inblock">
                    <button class="btn btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="far fa-question-circle"></i>
                        Help
                    </button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item"> Login Link</a>
                    </div>
                </div>
                <div class="inblock">
                    <button class="btn btn-sm">
                        <i class="fa fa-shopping-cart"></i>
                        Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Main Nav -->
<div class="container-fluid bg-white">
    <div class="container p-0">
        <nav class="navbar navbar-expand-md p-0">
            <div class="navbar-collapse collapse" id="main_nav">
                <ul class="navbar-nav" id="cat_menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Computers and Accessories</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Phones and Tablets</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Other Categories</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- Modal Div -->
<div class="modal fade" id="mymodal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                Header
            </div>
            <div class="modal-body">
                Hello to you all
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal">
                    Close Modal
                </button>
            </div>
        </div>
    </div>
</div>