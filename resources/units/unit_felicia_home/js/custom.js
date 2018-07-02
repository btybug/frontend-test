$(document).ready(function () {
    "use strict";

    var $containerportfolio = $('.portfolio');
    $containerportfolio.isotope({
        filter: '*',
        visibleStyle: {
            opacity: 1,
            transform: 'translateY(0)'
        },
        hiddenStyle: {
            opacity: 0,
            transform: 'translateY(100px)'
        }
    });

    //Portfolio Nav Filter

    $('.portfolio-filter a').on('click', function () {
        $('.portfolio-filter .active').removeClass('active');
        $(this).closest('li').addClass('active');
        console.log(this);

        var selectorportfolio = $(this).attr('data-filter');
        $containerportfolio.isotope({
            filter: selectorportfolio,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
        return false;
    });

    // testimonials
    $("#testimonial-list").owlCarousel({
        rtl: false,
        autoplay: true,
        loop:true,
        margin:10,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});