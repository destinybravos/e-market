// Navigation Toggler
$('#toggler').on('click', function () {
    $('#sidebar').toggleClass('open-nav');
    $('#overlay').fadeToggle();
})

$('#overlay').on('click', function(){
    $('#toggler').trigger('click');
});