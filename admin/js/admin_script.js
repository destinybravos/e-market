// Navigation Toggler
$('#toggler').on('click', function () {
    $('#sidebar').toggleClass('open-nav');
    $('#overlay').fadeToggle();
})

$('#overlay').on('click', function(){
    $('#toggler').trigger('click');
});

// Paging
$(document).ready(function(){
    // Get the page url when the document is ready(loaded fully)
    var page2load = '';
    var current_page = window.location.hash
    if(current_page == null || current_page == ''){
        page2load = 'dashboard';
    }else{
        for (i = 1; i < current_page.length ; i++) {
            page2load += current_page[i];        
        }
    }

    

    

    // Create a function that loads the page dynamically
    function loadPage(page) {
        $.ajax({
            type: 'get',
            // url: 'pages/' + page + '.php',
            url: `pages/${page}.php`,
            dataType: 'html',
            success: function (page_details) {
                $('#site_content').html(page_details);
                window.location.hash = `#${page}`;
            },
            error: function(xhr, status, message){
                alert('Page was not found or !')
            }
        });
    }
    loadPage(page2load);

    

    // Page Navigation onclick of pagenav
    $('.pagenav').on('click', function(){
        let clickedPage = $(this).attr('id');
        loadPage(clickedPage);
    });


});