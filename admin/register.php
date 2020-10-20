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


<div class="" style="margin:3vh auto; text-align:center;">
    <img src="../images/favicon.png" alt="icon" style="max-height:50px; margin:30px auto;">
    <div id="form_container" class="p-4">
        <form class="form text-left text-light">
            <div class="form-group">
                <label for="fname">
                    <i class="fa fa-user"></i> Firstname
                </label>
                <input type="text" id="fname" name="fname" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">
                    <i class="fa fa-envelope"></i> Email Address
                </label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">
                    <i class="fa fa-phone-alt"></i> Phone Number
                </label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pass">
                    <i class="fa fa-key"></i> Password
                </label>
                <div class="input-group">
                    <input type="password" id="pass" name="pass" class="form-control" required>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">
                    <i class="fa fa-user-plus"></i>
                    Sign Up
                </button>
            </div>
        </form>
    </div>
    <div class="mt-3">
        Already have an account! <a href="login.php">Login your account.</a>
    </div>
</div>


<script src="../js/jquery.js"></script>
<script src="../bootstrap4/js/bootstrap.bundle.js"></script>
<script src="js/admin_script.js"></script>
</body>
</html>