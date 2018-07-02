


$(function () {
    $('body').on('change','select[name=main_function]',function () {
        var val=$(this).val();
        if(val!='specificPost'){
            $('.posts_table').hide()
            $('.user_table').show()
        }else {
            $('.posts_table').show()
            $('.user_table').hide()
        }
    });
    $('body').on('change','.double-select', function () {
        var prefix=$(this).attr('name')+'_';
        var panel = $(this).data('value');
        $('.'+prefix + panel).addClass('hide');
        var id = '#'+prefix+panel + '_' + $(this).val();
        $(id).removeClass('hide');
    });
});