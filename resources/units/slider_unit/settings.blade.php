<h3>Slider images</h3>
<div class="content bty-settings-panel">

    <div class="lang">
        @if(isset($settings['img_path']))
            @foreach($settings['img_path'] as $key => $value)
                <div class="form-group lets_each_img">
                    <input type="text" name="img_path[{{$key}}]" class="bty-input-text-4 txt" placeholder="Image path" value="{{$value}}" >
                    <button class="btn btn-danger remove_this_img"><i class="fa fa-minus"></i></button>
                </div>

            @endforeach
        @endif


    </div>
    <div class="col-md-12 prepend_template">
        <button class="btn btn-primary pull-right add-img"><i class="fa fa-plus"></i></button>
    </div>
</div>

<hr align="left" width="100%">

<script>
    window.onload = function(){
        var slider_img_index='{{isset($settings['img_path']) ? count($settings['img_path']) : 0}}';
        $("body").delegate(".add-img","click",function(){
            var slider_img_div='<div class="form-group lets_each_img">\n' +
                '    <input type="text" name="img_path['+slider_img_index+']" class="bty-input-text-4 txt-item" placeholder="Image path" >\n' +
                '\n' +
                '    <button class="btn btn-danger remove_this_img"><i class="fa fa-minus"></i></button>\n' +
                '</div> ';
            $('.lang').append(slider_img_div);
            slider_img_index++;
            return slider_img_index;
        });


        $("body").delegate(".remove_this_img","click",function(){
            $(this).parent().remove();
            if(slider_img_index != 0){
                slider_img_index -= 1;
            }

            $(".lets_each_img").each(function(index,item){
                $(item).find("input.txt-item").attr("name",'img_path['+index+']');
            });
            return slider_img_index;

        });


    }
</script>