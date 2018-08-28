$(document).ready(function () {
    $('body').on('click', '.new_post >.action-bar', function (e) {
        e.preventDefault();
        if (!$(e.target).hasClass("action-bar") && e.target.closest('a')) {
            var sctionBarlink = e.target.closest('a');
            var datalink = $(sctionBarlink).data("barlink");
            if (document.getElementById(datalink)) {
                $('.new_post .open-page').removeClass('no_open');
                $('.new_post .open-page>div').removeClass('active');
                document.getElementById(datalink).classList.toggle('active');
            }
        } else {
            $('.new_post .open-page').addClass('no_open');
            $('.new_post .open-page>div').removeClass('active');
        }

    });

    $('body').on('click', '.new_post >.post .post-foot', function (e) {
        e.preventDefault();
        if (!$(e.target).hasClass("post-foot") && e.target.closest('a')) {
            var postFootLink = e.target.closest('a');
            var dataPostLink = $(postFootLink).data("viewPost");

            if (document.getElementById(dataPostLink)) {
                $('.new_post >.post .post-map>div').removeClass('active');
                document.getElementById(dataPostLink).classList.add('active');
                $(this).find('a').removeClass('active');
                $(postFootLink).addClass('active');


            }
        }

    });

    $('body').on('click','.new_post .aug img',function (e) {
        e.preventDefault();
        var data_id = $(this).data('id');
        var shoable = $('.head3.user-widget');
        $.each(shoable,function (key,val) {
            if ($(this).data('id') == data_id){
                $(this).toggleClass('no-show');
            }

        });

    });
    $('.post-foot-carousel').owlCarousel({
        nav: true,
        dots: false,
        responsiveClass: true,
        navText: ["<i class=\"fas fa-caret-left\"></i>", "<i class=\"fas fa-caret-right\"></i>"],
        responsive: {
            0: {
                items: 5
            },
            600: {
                items: 5
            },
            1000: {
                items: 5
            },
            1600: {
                items: 5
            }
        }
    });

});