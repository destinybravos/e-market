$(document).ready(function(){
    $('#mb-search-btn').on('click', function () {
        // $('#top_search').toggleClass('d-none');
        $('#top_search').slideToggle('fast');
    });

    // Fetch Menu Categories
    function fetch_menu_cat_list() {
        $.ajax({
            type:'get',
            url: './user_backend/menu_cat_list_finder.php',
            dataType: 'html',
            success: function(response){
                $('#cat_menu').html(response);
            }
        })
    }
    fetch_menu_cat_list();

    // Fetch Products for Index Page
    function fetch_product_card_list() {
        $.ajax({
            type:'get',
            url: './user_backend/index_products_card.php',
            dataType: 'html',
            success: function(response){
                $('#products_card_list').html(response);
            }
        });
    }
    fetch_product_card_list();

    // Fetch Products for Index Page
    function fetch_all_products() {
        let url = new URL(window.location.href);
        let dataObj = {
            category_id : url.searchParams.get('catid') 
        }
        $.ajax({
            type:'post',
            url: './user_backend/all_products.php',
            data: dataObj,
            dataType: 'html',
            success: function(response){
                $('#all_products').html(response);
            }
        })
    }
    fetch_all_products();

    $('#search_btn').on('click', function () {
        $criteria = $('#input_search').val();
        $.ajax({
            type:'post',
            url: './user_backend/search_products.php',
            data: {criteria: $criteria},
            dataType: 'html',
            success: function(response){
                $('#all_products').html(response);
            }
        })
    })

});