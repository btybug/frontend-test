$('document').ready(function () {
    $("body").on('change', '.select-table', function () {
        var val = $(this).val();
        $('.cols-box').removeClass('show');
        $('.columns').html('');
        if (val != '') {
            $.ajax({
                type: 'POST',
                url: "/admin/console/bburl/get-table-columns",
                datatype: 'json',
                data: {table: val},
                headers: {
                    'X-CSRF-TOKEN': $("input[name='_token']").val()
                },
                cache: false,
                success: function (data) {
                    $.each(data, function (k, v) {
                        $('.columns').append("<label> " + v + " </label> <input type='checkbox' name='columns[" + v + "]' value='1' />");
                    });

                    $('.cols-box').removeClass('hide');
                }
            });
        }
    })
});