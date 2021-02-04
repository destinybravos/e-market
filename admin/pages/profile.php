<div class="container pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div id="image_con" class="" style="max-width:150px;">
                            <img src="" alt=" " id="photo" class="img-responsive rounded-circle">
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary" id="upload">Upload Image</button>
                            <button class="btn btn-success" id="save">Save Image</button>
                            <div class="d-none">
                                <input type="file" id="file_upload">
                            </div>
                        </div>

                        <div class="mt-2 mb-4 p-4">
                            <div class="mb-2">
                                <strong>Firstname: </strong><span id="fname"></span>
                            </div>
                            
                            <div class="mb-2">
                                <strong>Lastname: </strong><span id="lname"></span>
                            </div>
                            
                            <div class="mb-2">
                                <strong>Phone: </strong><span id="phone"></span>
                            </div>
                            
                            <div class="mb-2">
                                <strong>Email: </strong><span id="email"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6"></div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $.ajax({
            type: 'post',
            url: 'backend/user.php',
            dataType: 'json',
            success: function(response){
                if(response.status == 'success'){
                    // Assign the user details to their placeholders
                    $('#photo').attr('src', 'img/profile/' + response.user.photo);
                    $('#fname').text(response.user.firstname);
                    $('#lname').text(response.user.lastname);
                    $('#phone').text(response.user.phone);
                    $('#email').text(response.user.email);
                }
            }
        });
        

        $('#upload').on('click', function(){
            $('#file_upload').trigger('click');
        });

        $('#file_upload').on('change', function(e){
            $file = e.target.files[0];
            if ($file.type == 'image/png' || $file.type == 'image/jpg' || $file.type == 'image/jpeg') {
                let reader = new FileReader();
                reader.onload = function(ev){
                    $('#photo').fadeOut();
                    $('#photo').attr('src', ev.target.result);
                    $('#photo').fadeIn('slow');
                };
                reader.readAsDataURL($file);
            }else{
                alert('Invalid Image File')
            }
        });

        
        $('#save').on('click', function(){
            $file = $('#file_upload')[0].files[0];
            if ($file.type == 'image/png' || $file.type == 'image/jpg' || $file.type == 'image/jpeg') {
                let data = new FormData();
                data.append('image', $file)
                $.ajax({
                    type: 'post',
                    url: 'backend/upload.php',
                    data: data,
                    dataType: 'json',
                    processData:false,
                    contentType:false,
                    success: function(response){
                        if(response.status == 'success'){
                            $('#profile_pics').fadeOut();
                            $('#profile_pics').attr('src', 'img/profile/' + response.image);
                            $('#profile_pics').fadeIn();
                        }
                    },
                    error: function (xhr, status, msg) {
                        console.log(msg);
                    }
                });
            }else{
                alert('Invalid Image File')
            }
        });
    })
</script>