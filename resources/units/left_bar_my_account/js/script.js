jQuery(document).ready(function ($) {
    $(".bty-vertical-menu-2>ul li").hover(
        function () {
            $(this).find('ul').slideDown();
        },
        function () {
            $(this).find('ul').slideUp();
        });
});