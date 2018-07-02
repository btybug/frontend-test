(function($){
    $.fn.extend({
        doFilter: function(callback,timeout){
            timeout = timeout || 1e3;
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(this,el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                $el.is(':input') && $el.on('keyup keypress paste cut',function(e){

                    if (e.type=='keyup' && e.keyCode!=8) return;

                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){
                        doneTyping(el);
                    }, timeout);
                }).on('blur',function(){
                    doneTyping(el);
                });
            });
        }
    });
})(jQuery);

$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getPosts(page);
        }
    }
});
$(document).on('click', '.custom_pagination div ul li a', function (e) {
    e.preventDefault();
    getPosts($(this).attr('href').split('page=')[1]);
});
function getPosts(page) {
    var token = $('input[name=_token]').val();
    var arr = $('.arr').val();
    $.ajax({
        url : '?page=' + page,
        data:{ arr:arr, _token:token},
        method:'post',
        dataType: 'json',
    }).done(function (data) {
        $('.custom_html_for_filter').html(data);
        location.hash = page;
    }).fail(function () {
        alert('Something went wrong.');
    });
}

$( function() {
$(".date").datepicker({
    onClose:function(selectedDate){
        if(selectedDate){
            $('.custom_filter-tables :input').trigger('keypress');
        }
    }
});
} );