var savesettingevent;
$(document).ready(function () {
    var data = $('#add_custome_page').serialize();
    var url = $('#add_custome_page').attr('action');

    $('form button').attr('type', 'button');
    var data = $('#hidden_data').val();

    if (data) {

        var json = JSON.parse(data);

        if (json) {

            $.each(json, function (k, v) {

                if ($('input[name=' + k + ']').attr('type') == 'checkbox') {
                    $('input[name=' + k + ']').attr('checked', true);
                } else if ($('input[name=' + k + ']').attr('type') == 'radio') {
                    $('input[name=' + k + '][value="' + v + '"]').attr('checked', true);
                } else {
                    $('input[name=' + k + ']').val(v);
                }
                $('select[name=' + k + ']').val(v);
            });
        }
    }

    savesettingevent = function () {
        setTimeout(function () {
            var $data = $('form').serialize();
            var url = $('#add_custome_page').attr('action');
            $.ajax({
                type: "post",
                datatype: "json",
                url: url,
                data: $data,
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                success: function (data) {
                    if (!data.error) {
                        $('#widget_container').html(data.html);

                        var linkElem = document.createElement('link');
                        document.getElementsByTagName('head')[0].appendChild(linkElem);
                        linkElem.rel = 'stylesheet';
                        linkElem.type = 'text/css';
                        linkElem.href = '/public-x/custom/css/' + data.slug + '.css';
                        $.getScript('/public-x/custom/js/' + data.slug + '.js');
                    }

                    window.parent.postMessage({
                        'TODO': 'POST_SETTINGS_CALLBACK',
                        'json': $('form').serializeArray()
                    }, "*");
                }
            });
        }, 50);
    }


    $('#right-settings-main-box-bty').on('click', '[data-setting-delete]', function () {
        savesettingevent();
    });

    $('#right-settings-main-box-bty').on('input', 'input', function () {
        savesettingevent();
    });
    $('#right-settings-main-box-bty').on('change', 'select', function () {
        savesettingevent();
    });


    $('#right-settings-main-box-bty').on('click', 'input[type="radio"]', function () {
        savesettingevent();
    });
    $('#right-settings-main-box-bty').on('click', 'input[type="checkbox"]', function () {
        savesettingevent();
    });
    $('#right-settings-main-box-bty').submit(function (e) {
        e.preventDefault();
        savesettingevent();
    });

    $('#right-settings-main-box-bty').on('click', '[data-uisetting]', function () {
        savesettingevent();

    });

    $('#right-settings-main-box-bty').on('keyup', 'input[type="text"]', function () {
        savesettingevent();
    });

    $('#right-settings-main-box-bty').on('keyup', 'textarea' ,function () {
        savesettingevent();
    });

    $('body').on('click', '.item', function () {
        var data = $('form').serialize();
        var url = $('#add_custome_page').attr('action');
        $.ajax({
            type: "post",
            datatype: "json",
            url: url,
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (!data.error) {
                    $('#widget_container').html(data.html);
                    $('span[aria-hidden=true]').click();
                }
            }
        });
    });

    $('#settings_savebtn').on('click', function () {
        var data = $('#add_custome_page').serialize();
        var url = $('#add_custome_page').attr('action');
        $.ajax({
            type: "post",
            datatype: "json",
            url: url + '/save',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (!data.error) {
                    if (data.url) {
                        top.window.location.assign(data.url);
                    } else {
                        $('#widget_container').html(data.html);
                        window.location.reload();
                    }
                }
            }
        });
    });

    /* Live edit */

    $('body')
        // Target click
        .on('click', '[data-bb-item]', function (e) {
            e.stopPropagation();

            var $this = $(this),
                key = $this.data("bb-item");

            // Mark as active
            $('[data-bb-item]').removeClass("active");
            $this.addClass("active");

            // Show relative key fields
            $('[data-bb-key]').addClass("hide");
            $('[data-bb-key="'+key+'"]').removeClass("hide");

            // Show options menu
            $('.coresetting').removeClass("hide");
            $('.corepreviewSetting').removeClass("activeprevew");
        })

        // Close settings panel
        .on('click', '.close-settings-panel', function (e){
            e.preventDefault();

            // Show options menu
            $('.coresetting').addClass("hide");
            $('.corepreviewSetting').addClass("activeprevew");

            // Show all fields
            $('[data-bb-key]').removeClass("hide");

            // In activate active targets
            $('[data-bb-item]').removeClass("active");
        });


    $('#placeholders-render-list-main-box-bty').on('click','.action-placeholder',  function(e){
        if (e.target !== this)
            return;

        $('.settings-bottom .content .left .pl-item').removeClass('hover-cl');
        $(this).closest('.pl-item').addClass('hover-cl');

        var key = $(this).data('key');
        var type = $(this).data('type');
        if(type != undefined){
            var data = $('body #add_custome_page').serialize();
            data += '&key=' + key + '&type=' + type + '&bb_slug=' + $("#unit_slug").val() + '&bb_variation=' + $("#unit_variation").val();
            $.ajax({
                type: "post",
                datatype: "json",
                url: "/admin/uploads/gears/settings/options",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $("#token").val()
                },
                success: function (data) {
                    if (!data.error) {
                        $('#right-settings-main-box-bty').html(data.html);
                        if(type == 'f'){
                            $('#right-settings-main-box-bty #main-box-title').html('Functions');
                        }else{
                            $('#right-settings-main-box-bty #main-box-title').html('Styles');
                        }
                        $('.fullheight').addClass('editplaceholders');
                        // tinymceeditor()
                    }
                }
            });
        }
    });

});
