jQuery(document).ready(function ($) {
    $(".sidebar-vertical-menu-black>ul li").hover(
        function () {
            $(this).find('ul').slideDown();
        },
        function () {
            $(this).find('ul').slideUp();
        });
});