$(document).ready(function () {
    function hidefooterTabs() {
        $('.profiles-navbar .footerTabs').hide();
        $('.profile-footer.logged-in .left .logo-name').removeClass('bg_dark');
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

    $('body').on('click', '.profile-footer.logged-in .left .logo-name', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('active');
        if ($('.profiles-navbar .footerTabs').is(":hidden")) {
            $('.profiles-navbar .footerTabs').show();
            $(this).addClass('bg_dark');
            $('.notification-panel').removeClass('active');
            $('.profile-footer .left .icons a.message').removeClass('active');
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


    $('.footerTabs .nav-item a').on('click', function () {
        $('.footerTabs .nav-item a').each(function (i, elem) {
            if ($(this).hasClass("active")) {
                $(this).removeClass('active');
                return false;
            }
        });
    });


    $('body').on('click', '.profile-footer.logged-in .left .icons a.message', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('.notification-panel').toggleClass('active');
        $(this).toggleClass('active');
        $('.profiles-navbar .footerTabs').hide();
        $('.profile-footer.logged-in .left .logo-name').removeClass('active bg_dark');
    });

    $('body').on('click', '.profiles-navbar .profile-footer.logged-out .right .login-link', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $('.panel-login-reg').toggleClass('active');
        $(this).toggleClass('active');
    });

    $(document).click(function (e) {
        if ($('.profile-footer .left .icons a.message').hasClass('active') && e.target.closest('.notification-panel') != $('.notification-panel')[0]) {
            $('.notification-panel').removeClass('active');
            $('.profile-footer .left .icons a.message').removeClass('active');
        }


        if ($('.profile-footer.logged-in .left .logo-name').hasClass('active') && e.target.closest('.profiles-navbar .footerTabs') != $('.profiles-navbar .footerTabs')[0]) {

            $('.profiles-navbar .footerTabs').hide();
            $('.profile-footer.logged-in .left .logo-name').removeClass('active bg_dark');

        }

        if ($('.profiles-navbar .profile-footer.logged-out .right .login-link').hasClass('active') && e.target.closest('.panel-login-reg') != $('.panel-login-reg')[0]) {
            $('.panel-login-reg').removeClass('active');
            $('.profiles-navbar .profile-footer.logged-out .right .login-link').removeClass('active');
        }

    });

});
