

$(function () {
    var client_id = $('#client_id').val();
    var url = {
        'onOff': '/api/console/app/products/on-off'
    }
    postSendAjax = function (url, data, success, error) {
        $.ajax({
            type: 'post',
            url: url,
            cache: false,
            datatype: "json",
            data: data,
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            },
            success: function (data) {
                if (success) {
                    success(data);
                }
                return data;
            },
            error: function (errorThrown) {
                if (error) {
                    error(errorThrown);
                }
                return errorThrown;
            }
        });
    };
    $('input[data-role=on_off]').on('change', function () {
        var data = {
            client_id: client_id,
            product_id: $(this).val()
        };
        postSendAjax(url.onOff, data, onOff);
    });
    var onOff = function onOff(data) {
        if (data.data.status) {
            $('body').find('a[data-settings=' + data.data.app_product_id + ']').removeClass('not-active');
        } else {
            $('body').find('a[data-settings=' + data.data.app_product_id + ']').addClass('not-active');
        }
    }
});