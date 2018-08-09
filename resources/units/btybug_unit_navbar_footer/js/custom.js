$(document).ready(function () {
    $('body').on('click', '.profile-footer .right .icon', function () {
        if ($('.profile-footer .left').is(":hidden")) {
            $('.profile-footer .left').addClass('d-flex');
            $(this).find('i').toggleClass('fas fa-angle-right fas fa-angle-left');
        } else {
            $('.profile-footer .left').removeClass('d-flex');
            $(this).find('i').toggleClass('fas fa-angle-right fas fa-angle-left');
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
        } else {
            $('.profiles-navbar .footerTabs').hide();
            $(this).find('i').toggleClass('fas fa-angle-down fas fa-angle-up');
            $(this).removeClass('bg_dark');
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
