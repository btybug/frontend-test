<div id="settings_div111">
    <div class="form-group my_rows1">
        <h3 for="newcontainer" class="col-sm-4 labelTitle">Div blocks</h3>
        <div class="col-sm-10 ">
            <div class="col-md-12 slider-box">
                <h3>Title</h3>
                <input type="text" name="content_site_title" class="form-control" value="{{isset($settings["content_site_title"])?$settings["content_site_title"]:''}}">
                <h3>Description</h3>
                <input type="text" name="content_site_desc" class="form-control" value="{{isset($settings["content_site_desc"])?$settings["content_site_desc"]:''}}">
            </div>
            <div class="col-md-12 custom_margin_top_8">
                <h4>create block</h4>
                <a href="javascript:void(0)" class="btn btn-info add_block"><i class="fa fa-plus"></i></a>
            </div>
            <div class="div_for_append">
                @if(isset($settings['content_site_blocks']))
                    @foreach($settings['content_site_blocks'] as $key => $value)
                        <div class="col-md-4 col-xs-12 person">
                            <div>
                                <input class="form-control" type="text" name="content_site_blocks[{{ $key }}][title]" value="{{ $value['title'] }}">
                                <input class="form-control" type="text" name="content_site_blocks[{{ $key }}][description]" value="{{ $value['description'] }}">
                                <input type="hidden" class="last_index" data-id="{{ $key }}">
                                <button class="remove_block btn btn-danger">Remove</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var check = false;
        $("body").delegate(".add_block","click",function(){
            var logout = true;
            if($(".check").length > 0){
                logout = false;
            }
            if(logout){
                var data_key = $('.div_for_append div.person:last-child input.last_index').data('id') + 1;
                if(!data_key){
                    data_key = 0;
                }
                var append = '<div class="col-md-4 col-xs-12 person">'+
                    '<div class="check">'+
                    '<input placeholder="Insert block title" class="form-control" type="text" name="content_site_blocks['+ data_key +'][title]">'+
                    '<input placeholder="Inert block description" type="text" class="form-control" name="content_site_blocks['+ data_key +'][description]">'+
                    '<input type="hidden" class="last_index" data-id="' + data_key + '">'+
                    '</div>'+
                    '</div>';
                $(".div_for_append").append(append);
            }else{
                $(".check").parent().remove();
            }
        });
        $('body').delegate(".remove_block",'click',function(){
            $(this).parent().remove();
        });
    });
</script>





