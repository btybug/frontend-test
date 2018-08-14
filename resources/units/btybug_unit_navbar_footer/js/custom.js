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

    $('body').on('click', '.profile-footer .left .logo-name', function () {
        if ($('.profiles-navbar .footerTabs').is(":hidden")) {
            $('.profiles-navbar .footerTabs').show();
            $(this).addClass('bg_dark');
            hidefavorite();
        } else {
            $('.profiles-navbar .footerTabs').hide();
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


    $('.footerTabs .nav-item a').on('click',function () {
        $('.footerTabs .nav-item a').each(function(i,elem) {
            if ($(this).hasClass("active")) {
                $(this).removeClass('active');
                return false;
            }
        });
    });

});
