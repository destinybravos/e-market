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
        })
    }
    fetch_product_card_list();

});