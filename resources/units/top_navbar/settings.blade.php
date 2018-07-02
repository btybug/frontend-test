<h3>Top navbar</h3>

<div class="form-group ">
    <div class="checkbox checbox-switch switch-success">
        <label>
            <input type="checkbox" name="top_nb_ch" {{isset($settings['top_nb_ch'])&&$settings['top_nb_ch']=='on'?'checked':''}} class="pull-right">
            <span></span>
            On/off
        </label>
    </div>
</div>

<label for="phone_number">Phone
    <input type="text" name="phone_number" class="bty-input-text-4" placeholder="Phone" >
</label>

<label for="email">Email
    <input type="text" name="email" class="bty-input-text-4" placeholder="Email" >
</label>

<hr align="left" width="100%">

<h3>Language</h3>
    <div class="content bty-settings-panel">

      <div class="lang">
          @if(isset($settings['language']))
              @foreach($settings['language'] as $key => $value)
                  <div class="form-group lets_each">
                        <input type="text" name="language[{{$key}}]" class="bty-input-text-4 txt" placeholder="Language" value="{{$value}}" >
                        <button class="btn btn-danger remove_this"><i class="fa fa-minus"></i></button>
                  </div>

              @endforeach
          @endif


      </div>
        <div class="col-md-12 prepend_template">
            <button class="btn btn-primary pull-right add-lang"><i class="fa fa-plus"></i></button>
        </div>
    </div>

<hr align="left" width="100%">

<h3>Currency</h3>


<div class="content bty-settings-panel">

    <div class="cur">
        @if(isset($settings['currency']))
            @foreach($settings['currency'] as $key => $value)
                <div class="form-group lets_each">
                    <input type="text" name="currency[{{$key}}]" class="bty-input-text-4 txt" placeholder="Currency" value="{{$value}}" >
                    <button class="btn btn-danger remove_this"><i class="fa fa-minus"></i></button>
                </div>

            @endforeach
        @endif


    </div>
    <div class="col-md-12 prepend_template">
        <button class="btn btn-primary pull-right  add-currency"><i class="fa fa-plus"></i></button>
    </div>
</div>


<script>
    window.onload = function(){
        var lang_index='{{isset($settings['language']) ? count($settings['language']) : 0}}';
        $("body").delegate(".add-lang","click",function(){
            var lang_div='<div class="form-group lets_each">\n' +
                '    <input type="text" name="language['+lang_index+']" class="bty-input-text-4 txt" placeholder="Language" >\n' +
                '\n' +
                '    <button class="btn btn-danger remove_this-lang"><i class="fa fa-minus"></i></button>\n' +
                '</div> ';
            $('.lang').append(lang_div);
            lang_index++;
            return lang_index;
        });


        $("body").delegate(".remove_this-lang","click",function(){
            $(this).parent().remove();
            if(lang_index != 0){
                lang_index -= 1;
            }

            $(".lets_each").each(function(index,item){
                $(item).find("input.txt").attr("name",'language['+index+']');
            });
            return lang_index;

        });


        var cur_index='{{isset($settings['currency']) ? count($settings['currency']) : 0}}';
        $("body").delegate(".add-currency","click",function(){
            var cur_div='<div class="form-group let_each">\n' +
                '    <input type="text" name="currency['+cur_index+']" class="bty-input-text-4 txt" placeholder="Currency" >\n' +
                '\n' +
                '    <button class="btn btn-danger remove_this"><i class="fa fa-minus"></i></button>\n' +
                '</div> ';
            $('.cur').append(cur_div);
            cur_index++;
            return cur_index;
        });


        $("body").delegate(".remove_this","click",function(){
            $(this).parent().remove();
            if(cur_index != 0){
                cur_index -= 1;
            }

            $(".let_each").each(function(index,item){
                $(item).find("input.txt").attr("name",'currency['+index+']');
            });
            return cur_index;

        });

    }
</script>

