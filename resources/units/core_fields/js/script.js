
// Vertical Menu
jQuery(document).ready(function ($) {
    $(".bty-vertical-menu-2>ul li").hover(
        function () {
            $(this).find('ul').slideDown();
        },
        function () {
            $(this).find('ul').slideUp();
        });
});
jQuery(document).ready(function ($) {
    $(".bty-vertical-menu-1 li.dropdown").hover(function () {
        var id = $(this).attr("rel");
        $(this).toggleClass("active");
        $(".bty-vertical-menu-1 ul.dropdown-" + id).toggle("fade", 250);
    });
});
$(function () {
    var Accordion = function (el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        // var links = this.el.find('.link');
        var links = $('.bty-vertical-menu-3 ul li div');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    Accordion.prototype.dropdown = function (e) {
        var $el = e.data.el;
        $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $('.bty-vertical-menu-3 ul li>ul').not($next).slideUp().parent().removeClass('open');
        }
        ;
    }

    var accordion = new Accordion($('#accordion'), false);
});
//Creative menu 1
$(document).ready(function () {
    $('.bty-creative-menu-1>div').click(function () {
        var card = this;
        console.log(card);
        var child = $('.bty-creative-menu-1>div>div:last-child');

        child.toggleClass('unfold')
            .parents($(card).class)
            .siblings();
        child.removeClass('unfold');

        $(this).toggleClass('span')
            .siblings($(card).class)
            .removeClass('span');
    });
});
//Creative menu 3
$(document).ready(function () {

    $(".bty-creative-menu-3>ul li>a").click(function () {
        if ($(".bty-creative-menu-3>div>ul").is(":hidden")) {
            $(".bty-creative-menu-3>ul").hide();
            $(".bty-creative-menu-3>div>ul").show("slow");
            $(".bty-creative-menu-3>div div:first-child").show('inline-block');


        }
        else {

            $(".bty-dropdown").hide("slow");

        }
        return false;
    });
    $(".bty-creative-menu-3>div div:first-child").click(function () {
        if ($(".bty-creative-menu-3>ul").is(":hidden")) {
            $(".bty-creative-menu-3>ul").show("slow");
            $(".bty-creative-menu-3>div>ul").hide("slow");
            $(".bty-creative-menu-3>div div:first-child").hide("slow");


        }
        else {

            $(".bty-creative-menu-3>div>ul").hide("slow");

        }
        return false;
    });
});
// Input range
$(document).ready(function () {
    $( ".bty-input-range-6" ).bind('keyup mousemove',function() {
        var value = $( this ).val();
        var slideValue = value  + " %";

        $('.bty-input-range-6+p').text(slideValue);

    });
});
// Input file 1
$(document).ready(function () {
    var btyFileupload = {
        init: function() {
            this.cacheDom();
            this.events();
        },
        cacheDom: function() {
            this.$filePlaceholder = $('.bty-input-file-1');
            this.$filelabel = this.$filePlaceholder.find('label');
            this.$fileUpload = this.$filePlaceholder.find('input');
            this.$fileBrowseTxt = this.$filePlaceholder.find('div span:first-child');
        },
        events: function() {
            this.$fileUpload.on('change', this.getFileName.bind(this));
        },
        getFileName: function() {
            this.newVal = this.$fileUpload.val();
            if (this.newVal !== "") {
                this.$fileBrowseTxt.text(this.newVal).addClass('hasValue');
            } else {
                this.$fileBrowseTxt.text("Select a file...");
            }
        }
    };

    btyFileupload.init();

});
//Input file 2
$(document).ready(function () {
    $( '.bty-input-file-2' ).each( function()
    {
        var $input	 = $( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

        $input.on( 'change', function( e )
        {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.find( 'span' ).html( fileName );
            else
                $label.html( labelVal );
        });

    });
});
//Input file 3

$(document).ready(function () {
    $( '.bty-input-file-3' ).each( function()
    {
        var $input	 = $( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

        $input.on( 'change', function( e )
        {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.find( 'span' ).html( fileName );
            else
                $label.html( labelVal );
        });

    });
});
//Input file 4
$(document).ready(function () {
    $( '.bty-input-file-4' ).each( function()
    {
        var $input	 = $( this ),
            $label	 = $input.next( 'label' ),
            labelVal = $label.html();

        $input.on( 'change', function( e )
        {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.find( 'span' ).html( fileName );
            else
                $label.html( labelVal );
        });

    });
});
// Responsive Tab 1
$(document).ready(function(){

    var $nav = $(".bty-responsive-tab-1");
    var $btn = $(".bty-responsive-tab-1 button");
    var $vlinks = $(".bty-responsive-tab-1>ul:nth-of-type(1)");
    var $hlinks = $(".bty-responsive-tab-1>ul:nth-of-type(2)");

    var breaks = [];

    function updateNav() {
        var availableSpace = $btn.hasClass("hidden")
            ? $nav.width()
            : $nav.width() - $btn.width() - 30;

        // The visible list is overflowing the nav
        if ($vlinks.width() > availableSpace) {
            // Record the width of the list
            breaks.push($vlinks.width());

            // Move item to the hidden list
            $vlinks
                .children()
                .last()
                .prependTo($hlinks);

            // Show the dropdown btn
            if ($btn.hasClass("hidden")) {
                $btn.removeClass("hidden");
            }

            // The visible list is not overflowing
        } else {
            // There is space for another item in the nav
            if (availableSpace > breaks[breaks.length - 1]) {
                // Move the item to the visible list
                $hlinks
                    .children()
                    .first()
                    .appendTo($vlinks);
                breaks.pop();
            }

            // Hide the dropdown btn if hidden list is empty
            if (breaks.length < 1) {
                $btn.addClass("hidden");
                $hlinks.addClass("hidden");
            }
        }

        // Keep counter updated
        $btn.attr("count", breaks.length);

        // Recur if the visible list is still overflowing the nav
        if ($vlinks.width() > availableSpace) {
            // updateNav();
        }
    }

// Window listeners

    $(window).resize(function() {
        updateNav();
    });

    $btn.on("click", function() {
        $hlinks.toggleClass("hidden");
    });

    updateNav();
});

// Responsive Tab 2
$(document).ready(function () {

    /* Toggle menú de móviles  */
    $('.bty-responsive-tab-2>a').on('click', function (e) {
        e.preventDefault();
        $('.bty-responsive-tab-2>ul').slideToggle(500);
    }); // fin click

    /* Hacer visible el menú al agrandar */
    $(window).resize(function () {
        if (innerWidth >= 640) {
            if ($('.bty-responsive-tab-2>ul').css('display') == 'none') {
                $('.bty-responsive-tab-2>ul').removeAttr('style');
            }
        }
    }); // fin resize
});
// Responsive Tab 3
$(document).ready(function () {
    $('.bty-responsive-tab-4').on('click', 'li', function(){

        $('.bty-responsive-tab-4 li').removeClass('active');
        $('.bty-responsive-tab-4 ul').toggleClass('expanded');
        $(this).addClass('active');
    });

});
// Input
// bty-input-label-8
$(document).ready(function () {
    $(document).click(function (event) {
        if ($(event.target).closest(".bty-input-label-8 + label+label+p").length)
            return;
        $(".bty-input-label-8 + label+label+p").slideUp(100);
        event.stopPropagation();
    });
    $('.bty-input-label-8 + label+label').click(function () {
        $(this).siblings(".bty-input-label-8 + label+label+p").slideToggle(100);
        return false;
    });
});
// Input Select 2
$(document).ready(function () {
    /* ===== Logic for creating fake Select Boxes ===== */
    $('.bty-input-select-2').each(function () {
        $(this).children('select').css('display', 'none');

        var $current = $(this);

        $(this).find('option').each(function (i) {
            if (i == 0) {
                $current.prepend($('<div>', {
                    class: $current.attr('class').replace(/bty-input-select-2/g, 'sel__box')
                }));

                var placeholder = $(this).text();
                $current.prepend($('<span>', {
                    class: $current.attr('class').replace(/bty-input-select-2/g, 'sel__placeholder'),
                    text: placeholder,
                    'data-placeholder': placeholder
                }));

                return;
            }

            $current.children('div').append($('<span>', {
                class: $current.attr('class').replace(/bty-input-select-2/g, 'sel__box__options'),
                text: $(this).text()
            }));
        });
    });

// Toggling the `.active` state on the `.sel`.
    $('.bty-input-select-2').click(function () {
        $(this).toggleClass('active');
    });

// Toggling the `.selected` state on the options.
    $('.sel__box__options').click(function () {
        var txt = $(this).text();
        var index = $(this).index();

        $(this).siblings('.sel__box__options').removeClass('selected');
        $(this).addClass('selected');

        var $currentSel = $(this).closest('.bty-input-select-2');
        $currentSel.children('.sel__placeholder').text(txt);
        $currentSel.children('select').prop('selectedIndex', index + 1);
    });

});
// Input Select 4
$(document).ready(function () {
    $(".bty-input-select-4>select").each(function() {
        var $this = $(this),
            numberOfOptions = $(this).children("option").length;

        $this.addClass("select-hidden");
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next("div.select-styled");
        $styledSelect.text(
            $this
                .children("option")
                .eq(0)
                .text()
        );

        var $list = $("<ul />", {
            class: "select-options"
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $("<li />", {
                text: $this
                    .children("option")
                    .eq(i)
                    .text(),
                rel: $this
                    .children("option")
                    .eq(i)
                    .val()
            }).appendTo($list);
        }

        var $listItems = $list.children("li");

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $("div.select-styled.active")
                .not(this)
                .each(function() {
                    $(this)
                        .removeClass("active")
                        .next("ul.select-options")
                        .hide();
                });
            $(this)
                .toggleClass("active")
                .next("ul.select-options")
                .toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass("active");
            $this.val($(this).attr("rel"));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass("active");
            $list.hide();
        });
    });
});
//Creative menu 4
$(document).ready(function () {

    $(".bty-creative-menu-4-icon").click(function () {
        if ($(".bty-creative-menu-4").is(":hidden")) {
            $(".bty-creative-menu-4").show("slow");
            $(".bty-creative-menu-4>div:not(:first-child)").hide();
        }
        else {

            $(".bty-creative-menu-4").hide("slow");

        }
        return false;
    });
    $(".bty-creative-menu-4>ul li>a").click(function () {
        $(".bty-creative-menu-4>ul").hide();
        $(".bty-creative-menu-4>div").show("slow");
        $(".bty-creative-menu-4>div div:first-child").show();
    });
    $(".bty-creative-menu-4>div div:first-child").click(function () {
        $(".bty-creative-menu-4>div div:first-child").hide();
        $(".bty-creative-menu-4>div").hide("slow");
        $(".bty-creative-menu-4>ul").show();
    });
});
// Text Animation
// Text Animation 1
var paragraph = document.getElementsByClassName('bty-animation-1')[0];
    var text,
        chars,
        newText = '',
        char,
        i;
    if(paragraph != undefined){
        text = paragraph.innerHTML;
        chars = text.length;

        for (i = 0; i < chars; i += 1) {
            newText += '<i>' + text.charAt(i) + '</i>';
        }

        paragraph.innerHTML = newText;
    }




var wrappedChars = document.getElementsByTagName('i'),
    wrappedCharsLen = wrappedChars.length,
    j = 0;

function addFloat() {
    setTimeout(function () {
        wrappedChars[j].className = 'floaty';
        j += 1;
        if (j < wrappedCharsLen) {
            addFloat();
        }
    }, 100)
}

addFloat();
// Text Animation 10
var Emblem = {
    init: function (el, str) {
        // var element = document.querySelector(el);
        // var text = str ? str : element.innerHTML;
        // element.innerHTML = '';
        // for (var i = 0; i < text.length; i++) {
        //     var letter = text[i];
        //     var span = document.createElement('span');
        //     var node = document.createTextNode(letter);
        //     var r = (360 / text.length) * (i);
        //     var x = (Math.PI / text.length).toFixed(0) * (i);
        //     var y = (Math.PI / text.length).toFixed(0) * (i);
        //     span.appendChild(node);
        //     span.style.webkitTransform = 'rotateZ(' + r + 'deg) translate3d(' + x + 'px,' + y + 'px,0)';
        //     span.style.transform = 'rotateZ(' + r + 'deg) translate3d(' + x + 'px,' + y + 'px,0)';
        //     element.appendChild(span);
        // }
    }
};

Emblem.init('.bty-animation-10');
// Text Hover
$(document).ready(function () {

    function btyHover(e, tag) {
        $(e).each(function (index) {
            var char = $(this).text().split("");
            $this = $(this);
            $this.empty();
            $.each(char, function (i, el) {
                $this.append("<" + tag + ">" + el + "</" + tag + ">");
            });
        });
    }

    btyHover(".bty-hover-2", "b");
    btyHover(".bty-hover-3", "div");
    btyHover(".bty-hover-4", "span");
    btyHover(".bty-hover-5", "b");
});
// Text Hover 8
$(document).ready(function () {
    $(function () {
        $('.bty-hover-8').wrap('<span />').parent().addClass('bty-hover-8-span');

    });
});

