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
    <!-- Scripts -->
    <script src="../js/jquery.js"></script>
    <script src="../bootstrap4/js/bootstrap.bundle.js"></script>
</head>
<body>


<div class="" style="margin:10vh auto; text-align:center;">
    <img src="../images/favicon.png" alt="icon" style="max-height:50px; margin:30px auto;">
    <div id="form_container" class="p-4">
        <form class="form text-left text-light" id="frm_login">
            <div class="form-group">
                <label for="uid">
                    <i class="fa fa-user"></i> Email or Phone
                </label>
                <input type="text" id="uid" name="uid" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pass">
                    <i class="fa fa-key"></i> Password
                </label>
                <input type="password" id="pass" name="pass" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="checkbox" id="remember" >
                <label for="remember">Remember me</label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">
                    <i class="fa fa-sign-in-alt" id="sign_icon"></i>
                    Sign In
                </button>
            </div>
        </form>


    </div>
    <div class="mt-3">
        I don't have account! <a href="register.php">Create One.</a>
    </div>
</div>

<!-- Modal Div -->
<div class="modal fade" id="error_modal">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <span style="font-size:1.3rem;">
                    <i class="fa fa-times-circle text-danger"></i>
                    Invalid Login Details
                </span>
            </div>
        </div>
    </div>
</div>

<script src="js/admin_script.js"></script>

<script>
    $('#frm_login').on('submit', function(ev){
        ev.preventDefault();
        let data = {
            user_id: $('#uid').val(),
            password: $('#pass').val(),
            remember: $('#remember').prop('checked')
        }

        $.ajax({
            type: 'post',
            url: 'backend/login_user.php',
            data: data,
            dataType: 'json',
            beforeSend: function(){
                $('#sign_icon').removeClass('fa-sign-in-alt');
                $('#sign_icon').addClass('fa-spinner fa-pulse');
            },
            success: function(res){
                if(res.status == 'success'){
                    window.location.href = 'index.php';
                }else{
                    $('#error_modal').modal('show')
                }
            },
            error: function(xhr, status, message){
                console.log(status, message);
            },
            complete: function(){
                $('#sign_icon').addClass('fa-sign-in-alt');
                $('#sign_icon').removeClass('fa-spinner fa-pulse');
            }
        })
    })
</script>

</body>
</html>