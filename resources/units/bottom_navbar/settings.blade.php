<h2>Bottom navbar</h2>

<div class="form-group ">
    <div class="checkbox checbox-switch switch-success">
        <label>
            <input type="checkbox" name="bottom_nb_ch" {{isset($settings['bottom_nb_ch'])&&$settings['bottom_nb_ch']=='on'?'checked':''}} class="pull-right">
            <span></span>
            On/off
        </label>
    </div>
</div>
<hr align="left" width="100%">

<h3>Navbar left items</h3>
    <div class="content bty-settings-panel">

      <div class="lang">
          @if(isset($settings['left_item']))
              @foreach($settings['left_item'] as $key => $value)
                  <div class="form-group lets_each">
                        <input type="text" name="left_item[{{$key}}]" class="bty-input-text-4 txt" placeholder="Left item" value="{{$value}}" >
                        <button class="btn btn-danger remove_this_item"><i class="fa fa-minus"></i></button>
                  </div>

              @endforeach
          @endif


      </div>
        <div class="col-md-12 prepend_template">
            <button class="btn btn-primary pull-right add-lang"><i class="fa fa-plus"></i></button>
        </div>
    </div>

<hr align="left" width="100%">

<h3>Central logo</h3>

<input type="text" name="logo_path" class="bty-input-text-4" placeholder="Path" >
<hr align="left" width="100%">

<h3>Search form</h3>
<div class="form-group ">
    <div class="checkbox checbox-switch switch-success">
        <label>
            <input type="checkbox" name="search_form" {{isset($settings['search_form'])&&$settings['search_form']=='on'?'checked':''}} class="pull-right">
            <span></span>
            On/off
        </label>
    </div>
</div>
<hr align="left" width="100%">


<script>
    window.onload = function(){
        var nv_left_item='{{isset($settings['left_item']) ? count($settings['left_item']) : 0}}';
        $("body").delegate(".add-lang","click",function(){
            var left_item_div='<div class="form-group lets_each_item">\n' +
                '    <input type="text" name="left_item['+nv_left_item+']" class="bty-input-text-4 txt-item" placeholder="Left item" >\n' +
                '\n' +
                '    <button class="btn btn-danger remove_this_item"><i class="fa fa-minus"></i></button>\n' +
                '</div> ';
            $('.lang').append(left_item_div);
            nv_left_item++;
            return nv_left_item;
        });


        $("body").delegate(".remove_this_item","click",function(){
            $(this).parent().remove();
            if(nv_left_item != 0){
                nv_left_item -= 1;
            }

            $(".lets_each_item").each(function(index,item){
                $(item).find("input.txt-item").attr("name",'language['+index+']');
            });
            return nv_left_item;

        });


    }
</script>

