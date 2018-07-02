// jQuery(document).ready(function ($) {
//     $('.profile-menu .sublink').click(function(e) {
//         e.preventDefault();
//
//         var $this = $(this);
//
//         if ($this.next().hasClass('show')) {
//             $this.removeClass('active');
//             $this.next().removeClass('show');
//             $this.next().slideUp(0);
//         }
//         else {
//             $('.profile-menu .sublink').removeClass('active');
//             $this.addClass('active');
//             $this.parent().parent().find('li .cute').removeClass('show');
//             $this.parent().parent().find('li .cute').slideUp(0);
//             $this.next().toggleClass('show');
//             $this.next().slideToggle(0);
//
//         }
//     });
// });

jQuery(document).ready(function ($) {
    $('.profile-menu .sublink').click(function(e) {
        e.preventDefault();

        var $this = $(this);

        if ($this.closest('.profile-item').next().hasClass('show')) {
            $this.parent().removeClass('active');
            $this.removeClass('active');
            $this.closest('.profile-item').next().removeClass('show');
            $this.closest('.profile-item').next().slideUp(0);
        }
        else {
            $('.profile-menu .sublink').removeClass('active');
            $('.profile-menu .profile-item').removeClass('active');
            $this.parent().addClass('active');
            $this.addClass('active');
            $this.parent().parent().parent().find('li .cute').removeClass('show');
            $this.parent().parent().parent().find('li .cute').slideUp(0);
            $this.closest('.profile-item').next().toggleClass('show');
            $this.closest('.profile-item').next().slideToggle(0);

        }
    });
});