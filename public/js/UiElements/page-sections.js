$(function () {
    $('#page-section-layout-form').on('change', '#bb-select-inheritance', function () {
        var url = window.location.pathname + "?inherit=" + $(this).val();
        window.location = url;

    });

    $('#page-section-layout-form').on('change', '.bb-layout', function () {
        if ($(this).attr('name') == 'layout') {
            $('#page-section-layout-form').find('select[name=variations]').val(null);
        }
        $('#page-section-layout-form').submit();
    });

    $('#page-section-layout-form').on('click', '.change-button', function () {
        var components = $(".bb-layout");
        if(components.hasClass('hide')){
            components.removeClass('hide')
        }else{
            components.addClass('hide')
        }
    });

});
