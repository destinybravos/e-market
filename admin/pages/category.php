


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
<!-- 
    <button class="btn btn-primary" data-toggle="modal" data-target="#cCatDel">
        Show Modal
    </button> -->

    <div class="modal fade" id="cCatDel">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    Confirm Delete?             
                </div>
                <div class="modal-body text-center">
                    <i class="fa fa-times-circle fa-2x text-danger"></i>
                    <h4>Are you sure you want to delete <span id="cat_span"></span> category?</h4>
                    <input type="hidden" id="category">
                </div>
                <div class="modal-footer py-1 px-2">
                    <button class="btn btn-primary btn-sm" data-dismiss="modal">
                        <i class="fa fa-times-circle"></i> Cancel
                    </button>
                    <button class="btn btn-danger btn-sm" id="catdel_btn">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alertModal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    
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
                                    <span class="float-right py-1 px-2 del_category" role="button" id="${category}">
                                        <i class="fas fa-trash text-danger"></i>
                                    </span>
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
    });

    $('#complete_list').on('click', '.del_category', function(){
        $category = $(this).attr('id');
        $('#cCatDel').on('show.bs.modal', function(){
            $('input[id=category]').val($category)
            $('#cat_span').text($category)
        })
        $('#cCatDel').modal('show')

            // Bootstrap Modal Events
        // show.bs.modal    //Before the modal show up
        // shown.bs.modal   //When the modal is completely visible
        // hide.bs.modal   //When the modal is about to hide (before hide)
        // hidden.bs.modal //When modal is completely hidden
    });

    $('#catdel_btn').on('click', function(){
        $category = $('input[id=category]').val()
        $.ajax({
            type: 'post',
            url: './backend/category_mngr.php',
            data: {action:'delete', category: $category},
            dataType: 'json',
            success:function(res){
                if(res.status == 'success'){
                    $('#alertModal').on('show.bs.modal', function(){
                        $('#alertModal .modal-body').html(`<i class="fa fa-check-circle fa-2x text-success"></i>
                    <h4>Deleted Successfully</h4>`)
                    })
                    $('#cCatDel').modal('hide');

                    $('#cCatDel').on('hidden.bs.modal', function(){
                        $('#alertModal').modal('show'); 
                        getCount();
                    });
                    
                }else{
                    $('#alertModal').on('show.bs.modal', function(){
                        $('#alertModal .modal-body').html(`<i class="fa fa-times-circle fa-2x text-danger"></i>
                    <h4>${res.message}</h4>`)
                    })
                    $('#cCatDel').modal('hide');

                    $('#cCatDel').on('hidden.bs.modal', function(){
                        $('#alertModal').modal('show'); 
                    });
                }
            },
            error: function(xhr, status, msg){
                console.log(msg);
            }
        });
    });

</script>