$(document).ready(function () {
    // Global Variables
    var BBbutton = ""

    // Function for request in server
    function postData(url, elm, cb) {
        BBbutton = elm
        let obj = { ...elm.dataset }
        if (!obj.action) {
            return null;
        }
        let action = obj.action
        let token = document.getElementsByName("_token")[0].value
        $.ajax({
            type: "post",
            datatype: "json",
            url: url,
            data: obj,
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").val()
            },
            success: function (data) {
                if (!data.error) {
                    return cb(data, action)
                }
            }
        });
    }

    function getBBbuttonData(variation, data_action, dataKey) {
        let data = {}
        BBbutton = $('button[data-key=' + dataKey + ']');
        let copy = BBbutton.attr('copy');

        data = { 'variation_id': variation, 'data_action': data_action, 'copy': copy };
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
                    if (data.copy) {
                        $('input[data-name=' + dataKey + ']').val(data.slug);
                    }
                }
            }
        });
    }

    // CallBackes

    function settingsLiveCB(data, action) {
        console.log(data)
        $('#magic-settings .modal-title').html("Select " + action);
        var html = $(data.html);
        var script = html.find('script').html();
        $('body').find('.magic-modal-select-variations').html(script)
        $('#magic-body').html(html);

        $('#magic-settings').modal();
    }

    // Event Listners

    document.addEventListener("click", (e) => {
        let classList = e.target.classList.value;
        switch (classList) {
            case "BBbuttons":
                postData("/modality/settings-live", e.target, settingsLiveCB);
                break;
            default:
                break;

        }

    })


    $("body").on("click", ".item", function () {
        if (BBbutton) {
            let btn = $('[data-bbplace="' + BBbutton.getAttribute("data-key") + '"]')

            $("body")
                .find(".modal-data-items .btn-primary")
                .removeAttr("name")
                .removeAttr("value");
            $("body")
                .find(".modal-data-items .btn-primary")
                .removeClass("btn-primary")
                .removeClass("active")
                .addClass("btn-info");
            $(this).removeClass("btn-info");
            $(this)
                .addClass("btn-primary")
                .addClass("active");
            $("input[data-name='" + BBbutton.getAttribute("data-key") + "']")
                .val($(this).attr("data-value"))
                .trigger("input");
            $("#magic-settings span[aria-hidden=true]").click();

            btn.removeClass(
                    btn.attr(
                        "data-style-old"
                    )
                )
                .attr("data-style-old", $(this).attr("data-value"))
                .addClass($(this).attr("data-value"));

        }
    });

    $('body').on('click', '.BBbuttons', function () {
        var $button = $(this);
        $('body').on('input', "input[data-name=" + $button.data("key") + "]", function () {
            getBBbuttonData($(this).val(), $button.attr('data-action'), $button.data('key'));
        });
    });

    $('body').on('change', '.magic-modal-select-variations', function () {
        var id = $(this).val();
        var url = $('body').find('#iframe-url').val();
        $('#select-unit-item-button').attr('data-value', id);
        $('body').find('.magic-modal-iframe').attr('src', url + id);
    });

    $('body').on('click', '.clean-bb-button', function () {
        var slug = $(this).data('id');
        $('body').find('input[data-name=' + slug + ']').val('');
        $('body').find('input[data-id=' + slug + ']').val('Nothing Selected !!!');
        $('body').find('input[data-id=' + slug + ']').trigger('input');
    });

    $('[data-responsiveview]').click(function () {
        $('[data-responsiveview]').removeClass('active')
        $(this).addClass('active')
        var getsize = $(this).data('responsiveview')
        var getmode = $(this).data('mode')
        $('#iframepreview').width(getsize)
    })

    $('[data-openresponsiveview="modal"]').click(function () {
        var data = $('#page-sections-settings-area').find('form').serialize();
        $('#iframepreview').attr('src', '/admin/uploads/layouts/responsive/front_layout_with_3_9_col_2_row.default?' + data);
        $('#view-responsives-modal').modal('show')
    });

});

$('[data-toggle="popover"]').popover();