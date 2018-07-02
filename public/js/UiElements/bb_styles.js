$(document).ready(function () {

    var BBbutton;
    var types = {
        styles: '/modality/styles/options',
        templates: '/modality/templates/options',
        menus: '/admin/backend/menus/options',
        widgets: '/modality/widgets/options',
        units: '/modality/units/options',
        page_sections: '/modality/page-sections/options',
        placeholder_section: '/modality/placeholder_section/options',
        main_body_modality: '/modality/main_body_modality/options'
    };

    $('body').on('click', '.BBbuttons', function () {
        var action = $(this).attr('data-action');
        var key = $(this).attr('data-key');
        var place = $(this).attr('data-place');
        var type = $(this).attr('data-type');
        var sub = $(this).attr('data-sub');
        var item = $(this).attr('data-item');
        var module = $(this).attr('data-module');
        var except = $(this).attr('data-except');
        var mt = $(this).data('mt');
        var prefix = $(this).data('name-prefix');
        var group = $(this).attr('data-group');
        var multiple = $(this).attr('data-multiple');
        BBbutton = $(this);
        $('#magic-body').empty();
        $.ajax({
            type: "post",
            datatype: "json",
            url: '/modality/settings-live',
            data: {
                key: key,
                action: action,
                type: type,
                sub: sub,
                item: item,
                module: module,
                except: except,
                place: place,
                mt: mt,
                group: group,
                multiple: multiple
            },
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (!data.error) {

                    $('#magic-settings .modal-title').html("Select " + action);
                    var html=$(data.html);
                    var script=html.find('script').html();
                    $('body').find('.magic-modal-select-variations').html(script)
                    $('#magic-body').html(html);

                    $('#magic-settings').modal();

                }
            }
        });
    });
    $('body').on('click', '.BBcustomize', function () {
        var action = $(this).attr('data-action');
        var key = $(this).attr('data-key');
        var value = $(this).attr('data-value');
        var structure = $(this).attr('data-strcuture');
        var place = $(this).attr('data-place');
        var type = $(this).attr('data-type');
        var sub = $(this).attr('data-sub');
        var item = $(this).attr('data-item');
        var module = $(this).attr('data-module');
        var except = $(this).attr('data-except');
        var mt = $(this).data('mt');
        var prefix = $(this).data('name-prefix');
        var group = $(this).attr('data-group');
        var multiple = $(this).attr('data-multiple');
        BBcustomize = $(this);

        var url = '/modality/settings-customize';
        if(action == 'layouts') url = '/modality/settings-customize-layouts'
        $('#magic-body').empty();
        $.ajax({
            type: "post",
            datatype: "json",
            url: url,
            data: {
                key: key,
                value: value,
                action: action,
                type: type,
                sub: sub,
                item: item,
                module: module,
                except: except,
                place: place,
                mt: mt,
                group: group,
                multiple: multiple,
                structure: structure
            },
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (!data.error) {
                    console.log(2);
                    var html=$(data.html);
                    var script=html.find('script').html();
                    $('body').find('.magic-modal-select-variations').html(script)
                    $('#magic-settings .modal-title').html("Select " + action);
                    $('#magic-body').html(data.html);
                    $('#magic-settings').modal();
                }
            }
        });
    });

    $('body').on('click', '.styles', function () {
        $('body').find('.styles').addClass('btn-info');
        $('body').find('.styles').removeClass('btn-primary');
        $(this).removeClass('btn-info');
        $(this).addClass('btn-primary');
        var action = $(this).attr('data-action');
        var id = $(this).attr('data-id');
        var key = $(this).attr('data-key');
        $('#magic-settings').find('.modal-data-items').empty();

        var loader = $('<div/>', {
            class: 'loader'
        }).css({
            position: 'fixed',
            'z-index': 9999999999999,
            top: 0,
            left: 0,
            height: '100%',
            width: '100%',
            background: 'rgba( 255, 255, 255, .8 ) url("http://i.stack.imgur.com/FhHRx.gif") 50% 50%  no-repeat',
        });
        $('#magic-settings').find('.modal-data-items').append(loader);
        $.ajax({
            type: "post",
            datatype: "json",
            url: types[action],
            data: {
                id: id,
                key: key,
                action: action,
            },
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (!data.error) {
                    var html=$(data.html);
                    var script=html.find('script').html();
                    $('body').find('.magic-modal-select-variations').html(script)
                    $('#magic-settings').find('.modal-data-items').remove();
                    $('#magic-settings .modal-data').append(data.html);
                    var defaultV=$('body').find('.tpl-default-variation').val();
                    $('body').find('#select-unit-item-button').attr('data-value',defaultV);
                }
            }
        });
    });
    $('[data-toggle="popover"]').popover();
$('body').on('click','.page-section-item',function () {
    var id=$(this).data('id');
    $('body').find('#select-unit-item-button').attr('data-value',id)
        .attr('data-key',$(this).attr('data-key'))
        .attr('data-action','layouts').addClass('customize-item');
    $('#iframepreview').attr('src','/modality/page-sections/modal/'+id);
});
    $('body').on('click', '.item', function () {
        console.log(123,BBbutton)
        if (BBbutton) {
            console.log(321)

            $('body').find('.modal-data-items .btn-primary')
                .removeAttr('name')
                .removeAttr('value');
            $('body').find('.modal-data-items .btn-primary')
                .removeClass('btn-primary')
                .removeClass('active')
                .addClass('btn-info');
            $(this).removeClass('btn-info')
            $(this).addClass('btn-primary').addClass('active');
            $("input[data-name='" + BBbutton.attr("data-key") + "']").val($(this).attr('data-value')).trigger('input');
            $('#magic-settings span[aria-hidden=true]').click();

            $('[data-bbplace="' + BBbutton.attr('data-key') + '"]')
                .removeClass($('[data-bbplace="' + BBbutton.attr('data-key') + '"]')
                    .attr('data-style-old'))
                .attr('data-style-old', $(this).attr('data-value'))
                .addClass($(this).attr('data-value'));
        }
    });

    $('body').on('click', '.customize-item', function () {
        if (BBcustomize) {
            console.log($(this));
            var key = $(this).data('key');
            var value = $(this).data('value');
            var action = $(this).data('action');

            var url = '/modality/settings-customize-save';
            if(action == 'layouts') url = '/modality/settings-customize-layouts-save'

            $.ajax({
                type: "post",
                datatype: "json",
                url: url,
                data: {
                    key: key,
                    value: value

                },
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                success: function (data) {
                    if(! data.error){
                        var customize_url = '/admin/uploads/gears/settings/'+value+'.'+key;
                        if(action == 'layouts') customize_url = '/admin/uploads/layouts/settings/'+value+'.'+key;

                        $('body').find('a[data-strcuture="'+key+'"]')
                            .attr('href',customize_url);

                        $('body').find('input[data-name="'+BBcustomize.data('key')+'"]').attr('value',value+'.'+key).trigger('change');
                        $('body').find('button[data-key="'+BBcustomize.data('key')+'"]').attr('data-value',value+'.'+key);

                        $('body').find('[data-id="'+BBcustomize.data('key')+'"]')
                            .attr('value',data.unit.title);

                        $('body').find('.modal-data-items .btn-primary')
                            .removeAttr('name')
                            .removeAttr('value');
                        $('body').find('.modal-data-items .btn-primary')
                            .removeClass('btn-primary')
                            .removeClass('active')
                            .addClass('btn-info');
                        $(this).removeClass('btn-info')
                        $(this).addClass('btn-primary').addClass('active');
                        $('#magic-settings span[aria-hidden=true]').click();
                    }
                }
            });


            // var input= $(this).find('input')
            // input.attr('name',input.attr('data-key')).val(input.attr('data-value'));
        }
    });

    $('body').on('click', '.item-multiple', function () {

    });

    /////////////////////////

    function reset(valuec) {
        var BBdropdown = $('body').find('.BBdropdown');

        $.each(BBdropdown, function (k, v) {
            var action = $(v).attr('data-action');
            var data = {id: $(v).attr('data-val')};
            var dropdown = $(v).attr('id');
            var url = types[action];
            $.ajax({
                type: "post",
                url: url,
                datatype: "json",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                success: function (data) {
                    if (data) {
                        $('select[data-dropdown=' + dropdown + ']').html(data);
                        $('select[data-dropdown=' + dropdown + ']').val(valuec);
                    }
                }
            });
        })
    }

    $('body').on('click', '.BBbuttons', function () {
        var $button = $(this);
        $('body').on('input', 'input[data-name=' + $button.data('key') + ']', function () {
            getBBbuttonData($(this).val(), $button.attr('data-action'), $button.data('key'));
        });
    });


    function getBBbuttonData(variation, data_action, dataKey) {
        var data;
        var BBbutton = $('button[data-key=' + dataKey + ']');
        var copy = BBbutton.attr('copy');
        if (!copy) {
            copy = 0
        }
        data = {'variation_id': variation, 'data_action': data_action,'copy':copy};
        $.ajax({
            type: "post",
            datatype: "json",
            url: '/admin/console/bburl/get-bb-button-data',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (!data.error) {
                    var input = $('input[data-id="' + dataKey + '"]');
                    $(input).val(data.value);
                    $(input).attr('data-content', data.content);
                    $('[data-toggle="popover"]').popover();
                    if(data.copy){
                        $('input[data-name='+dataKey+']').val(data.slug);
                    }
                }
            }
        });
    }
    $('body').on('change','.magic-modal-select-variations',function () {
       var id=$(this).val();
       var url=$('body').find('#iframe-url').val();
        $('#select-unit-item-button').attr('data-value',id);
       $('body').find('.magic-modal-iframe').attr('src',url+id);
    });
$('body').on('click','.clean-bb-button',function () {
   var slug= $(this).data('id');
   $('body').find('input[data-name='+slug+']').val('');
   $('body').find('input[data-id='+slug+']').val('Nothing Selected !!!');
    $('body').find('input[data-id='+slug+']').trigger('input');
});

    $('body').on('click', '.BBLive', function (e) {
        e.preventDefault();
        var LiveButton = $(this);
        var variation = LiveButton.data('variation');
        var type = LiveButton.data('type');
        $.ajax({
            type: "post",
            datatype: "json",
            url: '/modality/live-preview',
            data: {
                variation: variation,
                type:type
            },
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (!data.error) {
                    console.log(4);
                    $('#magic-settings .modal-title').html("Live Preview");
                    $('#magic-body').html(data.html);
                    $('#magic-settings').modal();
                }
            }
        });
    });


    $('[data-responsiveview]').click(function(){
        $('[data-responsiveview]').removeClass('active')
        $(this).addClass('active')
        var getsize = $(this).data('responsiveview')
        var getmode = $(this).data('mode')
        $('#iframepreview').width(getsize)
    })

    $('[data-openresponsiveview="modal"]').click(function(){
       var data=$('#page-sections-settings-area').find('form').serialize();
        $('#iframepreview').attr('src','/admin/uploads/layouts/responsive/front_layout_with_3_9_col_2_row.default?'+data);
        $('#view-responsives-modal').modal('show')
    });

});
