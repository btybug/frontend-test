(function($){
    $('body').delegate('#addinput','click',function () {
        var count=$('div.custom_div_key').length;
        var inputDiv='<div style="border: 1px solid silver" class="custom_div_key form-group" data-key="'+ count +'">' +
            '<input type="text" name="images['+ count +'][path]" placeholder="Path" class="form-control">' +
            '<input type="button" value="Delete" class="btn btn-danger del" >' +
            '</div>';

        $('.add_custome_page').append(inputDiv);
    });
        $('body').delegate('.del','click',function () {
            $(this).parent().remove();
        });
})(jQuery);



