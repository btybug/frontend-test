$(document).ready(function () {
    $('body').on('click', '.new_post >.action-bar', function (e) {
        e.preventDefault();
        if (!$(e.target).hasClass("action-bar") && e.target.closest('a')) {
            var sctionBarlink = e.target.closest('a');
            var datalink = $(sctionBarlink).data("barlink");
            var openPage = $(this).closest('.new_post').find('.open-page');
            console.log($(openPage).closest('.new_post').parent());
            $(openPage).closest('.new_post').parent().addClass('col-lg-12');
            $(openPage).closest('.new_post').parent().next().find('.user-widget').addClass('no-show');
            $(openPage).removeClass('no_open');
            $(openPage).children().removeClass('active');
            $(openPage).find(`.${datalink}`).addClass('active');
        } else {
            $(this).closest('.new_post').find('.open-page').addClass('no_open');
            $(this).closest('.new_post').find('.open-page').children().removeClass('active');
            // console.log($(openPage).closest('.new_post').parent());
            $(this).closest('.new_post').parent().removeClass('col-lg-12');
        }

    });

    $('body').on('click', '.new_post >.post .post-foot', function (e) {
        e.preventDefault();
        if (!$(e.target).hasClass("post-foot") && e.target.closest('a')) {
            var postFootLink = $(e.target.closest('a'));
            postFootLink.closest(".owl-stage").find("a").removeClass("active")
            var dataPostLink = $(postFootLink).data("viewPost");
            console.log(dataPostLink )
            let posts = $(this).closest(".post").find(".post-map")
            posts.children().removeClass("active")
                // $('.new_post >.post .post-map>div').removeClass('active');
                // document.getElementById(dataPostLink).classList.add('active');
                // $(this).find('a').removeClass('active');
                posts.find(`.${dataPostLink}`).addClass('active');
                $(postFootLink).addClass('active');


        }

    });

    $('body').on('click','.new_post .aug img',function (e) {
        e.preventDefault();
        var data_id = $(this).data('id');
        var shoable = $('.head3.user-widget');
        $.each(shoable,function (key,val) {
            if ($(this).data('id') == data_id){
                $(this).parent().prev().find('.open-page').addClass('no_open');
                $(this).parent().prev().find('.open-page').children().removeClass('active');
                $(this).parent().prev().removeClass('col-lg-12');
                $(this).toggleClass('no-show');
            }

        });

    });
    $('.post-foot-carousel').owlCarousel({
        nav: true,
        dots: false,
        // autoWidth:true,
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