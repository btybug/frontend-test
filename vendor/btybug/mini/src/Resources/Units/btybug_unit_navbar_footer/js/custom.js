$(document).ready(function () {
    function hidefooterTabs() {
        $('.profiles-navbar .footerTabs').hide();
        $('.profile-footer .left .logo-name').removeClass('bg_dark');
    }
    function hidefavorite() {
        $('.profiles-navbar .profile-favorite').hide();
        $('.profile-footer .left .create .heart').removeClass('bg_dark');
    }
    $('body').on('click', '.profile-footer .right .icon', function () {
        if ($('.profile-footer .left').is(":hidden")) {
            $('.profile-footer .left').addClass('d-flex');
            $(this).find('i').toggleClass('fas fa-angle-right fas fa-angle-left');
        } else {
            $('.profile-footer .left').removeClass('d-flex');
            $(this).find('i').toggleClass('fas fa-angle-right fas fa-angle-left');
            hidefooterTabs();
            hidefavorite();
        }
    });
    $('#click-image').click(function () {
        if ($('.profile-footer .right .name-user').is(":hidden")) {
            $('.profile-footer .right .name-user').addClass('d-flex');
            $('.profile-footer .left .icons a.message').hide();
            $('.profile-footer .left .icons a.bell').hide();
            $('.profile-footer .right .icon').removeClass('d-flex');
            $('.profile-footer .right .icon').hide();
            $('.profile-footer .left').addClass('border-none');
        } else {
            $('.profile-footer .right .name-user').removeClass('d-flex');
            $('.profile-footer .left .icons a.message').show();
            $('.profile-footer .left .icons a.bell').show();
            $('.profile-footer .right .icon').addClass('d-flex');
            $('.profile-footer .right .icon').show();
            $('.profile-footer .left').removeClass('border-none');
        }
    });
    $('body').on('click', '.profile-footer .left .logo-name', function () {
        if ($('.profiles-navbar .footerTabs').is(":hidden")) {
            $('.profiles-navbar .footerTabs').show();
            $(this).find('i').toggleClass('fas fa-angle-up fas fa-angle-down');
            $(this).addClass('bg_dark');
            hidefavorite();
        } else {
            $('.profiles-navbar .footerTabs').hide();
            $(this).find('i').toggleClass('fas fa-angle-down fas fa-angle-up');
            $(this).removeClass('bg_dark');
        }
    });


    $('body').on('click', '.profile-footer .left .create .heart', function () {
        if ($('.profiles-navbar .profile-favorite').is(":hidden")) {
            $('.profiles-navbar .profile-favorite').show();
            hidefooterTabs();
            $(this).addClass('bg_dark');
        } else {
            $('.profiles-navbar .profile-favorite').hide();
            $(this).removeClass('bg_dark');
        }
    });
    var favoriteicon = $('.profiles-navbar .profile-favorite .tab-content .favorite-carousel .item .name .icon');
    $('body').on('click', '.profiles-navbar .profile-favorite .favorite-icon span', function () {

        if ($(favoriteicon).is(":hidden")) {

            $(favoriteicon).addClass('d-flex');
            $(this).find('i').toggleClass('fas fa-heartbeat fas fa-check');
        } else {
            $(favoriteicon).removeClass('d-flex');
            $(this).find('i').toggleClass('fas fa-check fas fa-heartbeat');
        }
    });
    $('.favorite-carousel').owlCarousel({

        margin:10,
        // loop:true,
        autoWidth:true,
        items:2,
        nav:true,
        dots: false,

    })
});
