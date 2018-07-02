


$(function () {
    $('body').on('change','.double-select', function () {
        var prefix=$(this).attr('name')+'_';
        var panel = $(this).data('value');
        $('.'+prefix + panel).addClass('hide');
        var id = '#'+prefix+panel + '_' + $(this).val();
        $(id).removeClass('hide');
    });
});