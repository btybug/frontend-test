$(function () {
    var AccordionSideWhite = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        var linksSideWhite = $('.sidebar-vertical-menu-white ul li div');

        linksSideWhite.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    };

    AccordionSideWhite.prototype.dropdown = function (e) {
        var $el = e.data.el;
        $this = $(this);
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $('.sidebar-vertical-menu-white ul li>ul').not($next).slideUp().parent().removeClass('open');
        }
    };

    var accordion = new AccordionSideWhite($('#accordion'), false);
});