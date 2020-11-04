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


<div class="" style="margin:3vh auto; text-align:center;">
    <img src="../images/favicon.png" alt="icon" style="max-height:50px; margin:30px auto;">
    <div id="form_container" class="p-4">
        <form class="form text-left text-light" id="frm_register">
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
                    <div class="input-group-append" style="cursor:pointer;" id="pass_toggler">
                        <span class="input-group-text">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">
                    <i class="fa fa-user-plus" id="sign_icon"></i>
                    Sign Up
                </button>
            </div>
        </form>
    </div>
    <div class="mt-3">
        Already have an account! <a href="login.php">Login your account.</a>
    </div>
</div>

<!-- Modal Div -->
<div class="modal fade" id="error_modal">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center" style="font-size:1.3rem;">
                
            </div>
        </div>
    </div>
</div>

<script src="js/admin_script.js"></script>
<script>

    $('#frm_register').on('submit', function(e){
        e.preventDefault();

        // Build the Data Object
        let data = {
            firstname: $('#fname').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            password: $('#pass').val()
        }

        $.ajax({
            type: 'post',
            url: 'backend/add_user.php',
            data: data,
            dataType: 'json',
            beforeSend: function(){
                $('#sign_icon').removeClass('fa-user-plus');
                $('#sign_icon').addClass('fa-spinner fa-pulse');
            },
            success: function(res){
                if(res.status == 'success'){
                    location.href = 'login.php';
                }else{
                    // Build the error message into a variable
                    let errorMsg = `<i class="fa fa-times-circle text-danger"></i>
                            ${res.msg}
                        `;
                    // Before the modal shows up, Insert the error message into the modal body
                    $('#error_modal').on('show.bs.modal', function(){
                        $('#error_modal .modal-body').html(errorMsg);
                    });
                    // Display the modal
                    $('#error_modal').modal('show')
                }
            },
            error: function(xhr, status, message){
                console.log(status, message);
            },
            complete: function(){
                $('#sign_icon').addClass('fa-user-plus');
                $('#sign_icon').removeClass('fa-spinner fa-pulse');
            }
        });
    })

    $('#pass_toggler').on('click', function () {
        $curtype = $('#pass').attr('type');
        if($curtype === 'password'){
            $('#pass').attr('type', 'text');
            $('#pass_toggler span').html('<i class="fa fa-eye-slash"></i>')
        }else{
            $('#pass').attr('type', 'password');
            $('#pass_toggler span').html('<i class="fa fa-eye"></i>') 
        }
        console.log($curtype);
    })


</script>
</body>
</html>