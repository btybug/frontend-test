(function($){
        $('#home-slick').slick({
            autoplay: true,
            infinite: true,
            speed: 300,
            arrows: true,
        });
        $('body').delegate('.del','click',function () {
            $(this).parent().remove();
        });
})(jQuery);



