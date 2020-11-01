


<div class="container pt-4">

    <div class="alert alert-info">
        <strong>
            <span id="counter"></span> Category Found.
        </strong>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Add Category card -->
                <div class="card">

                    <div class="card-header">
                        <strong class="card-title">
                            <i class="fa fa-plus"></i> Add Category
                        </strong>
                    </div>

                    <div class="card-body">
                        <form id="frm_add_cat">
                            <div class="form-group">
                                <label for="cat">Category</label>
                                <input type="text" name="cat" id="cat" placeholder="Enter Category" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-save"></i> Save Category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- List of Category card -->
                <div class="card">

                    <div class="card-header">
                        <strong class="card-title">
                            <i class="fa fa-list"></i> List of Category
                        </strong>
                    </div>

                    <div class="card-body p-0" style="max-height:400px; overflow:auto;">
                        <ul class="list-group" id="complete_list">
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>    
    </div>

</div>



<script>
    //Send ajax request to retreive list of category
    function getCatList(){
        $.ajax({
            type: 'post',
            url: './backend/category_mngr.php',
            data: {action:'list'},
            dataType: 'json',
            success:function(res){
                if(res.status == 'success'){
                    $list = '';
                    res.cat_list.forEach(function(category){
                        $list += `<li class="list-group-item">
                                    ${category}
                                </li>`;
                    });
                    $('#complete_list').html($list);
                }else{
                    alert(res.message);
                }
            },
            error: function(xhr, status, msg){
                console.log(msg);
            }
        });
    }

    //Send ajax request to retreive category count
    function getCount(){
        $.ajax({
            type: 'post',
            url: './backend/category_mngr.php',
            data: {action:'count'},
            dataType: 'json',
            success:function(res){
                if(res.status == 'success'){
                    $('#counter').text(res.no_categories);
                    getCatList();
                }else{
                    alert(res.message);
                }
            },
            error: function(xhr, status, msg){
                console.log(msg);
            }
        });
    }
    getCount();


    $('#frm_add_cat').on('submit', function(e){
        e.preventDefault();
        $category = $('#cat').val();
        $.ajax({
            type: 'post',
            url: './backend/category_mngr.php',
            data: {action:'add', category: $category},
            dataType: 'json',
            success:function(res){
                if(res.status == 'success'){
                    $('#frm_add_cat').trigger('reset');
                    getCount();
                }else{
                    alert(res.message);
                }
            },
            error: function(xhr, status, msg){
                console.log(msg);
            }
        });
    })

</script>