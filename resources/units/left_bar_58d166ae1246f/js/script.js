;(function() {
$(".aside-left ul.main-menu li a").click(function(){
    $(this).parent().toggleClass('active');
    $(this).next('ul.collapse').toggleClass('in');
});
}());