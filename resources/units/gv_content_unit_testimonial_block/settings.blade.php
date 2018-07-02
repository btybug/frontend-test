



<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#functions">Functions</a></li>
    <li><a data-toggle="tab" href="#styles">Styles</a></li>
</ul>

<div class="tab-content">
    <div id="functions" class="tab-pane fade in active">
        <div id="settings_div111">
            <div class="form-group my_rows1">
                <h3 for="newcontainer" class="col-sm-4 labelTitle">Add Testamonial</h3>
                <div class="col-sm-10 ">
                    <div class="col-md-12 slider-box div_for_append">

                        @if(isset($settings['testamonial']))
                            @foreach($settings['testamonial'] as $key => $value)
                                <div class="col-md-4 col-xs-12 person">
                                    <div>
                                        <input class="form-control" type="text" name="testamonial[{{ $key }}][image]" value="{{ $value['image'] }}">
                                        <input class="form-control" type="text" name="testamonial[{{ $key }}][name]" value="{{ $value['name'] }}">
                                        <input class="form-control" type="text" name="testamonial[{{ $key }}][description]" value="{{ $value['description'] }}">
                                        <input type="hidden" class="last_index" data-id="{{ $key }}">
                                        <button class="remove_image btn btn-danger">Remove</button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-12 custom_margin_top_8">
                        <a href="javascript:void(0)" class="btn btn-info add_testamonial"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="styles" class="tab-pane fade">
        <div id="settings_div111">
            <div class="form-group my_rows1">
                <h3 for="newcontainer" class="col-sm-4 labelTitle">Add Styles</h3>
                <div class="col-sm-10 ">
                    <div class="col-md-12 slider-box div_for_append">
                        @if(isset($settings['testamonial']))
                            <div class="col-md-12 col-xs-12 person">
                                    <div class="col-md-6">
                                        <p>Image</p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="pull-right form-control">
                                            <option value="option1">option1</option>
                                            <option value="option">option2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="pull-right form-control">
                                            <option value="option1">option1</option>
                                            <option value="option">option2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Description</p>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="pull-right form-control">
                                            <option value="option1">option1</option>
                                            <option value="option">option2</option>
                                        </select>
                                    </div>

                                    <button class="clear_styles btn btn-danger">clear</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom_text_break{
        word-wrap: break-word;
    }
</style>


<script>
    $(document).ready(function(){
        var check = false;
        $("body").delegate(".add_testamonial","click",function(){
            var data_key = $('.div_for_append div.person:last-child input.last_index').data('id') + 1;
            if(!data_key){
                data_key = 0;
            }
            var append = '<div class="col-md-4 col-xs-12 person">'+
                '<div class="check">'+
                '<input placeholder="Insert image url" class="form-control" type="text" name="testamonial['+ data_key +'][image]">'+
                '<input placeholder="Insert name" class="form-control" type="text" name="testamonial['+ data_key +'][name]">'+
                '<input placeholder="Inert description" type="text" class="form-control" name="testamonial['+ data_key +'][description]">'+
                '<input type="hidden" class="last_index" data-id="' + data_key + '">'+
                '<button class="remove_image btn btn-danger">Remove</button>'+
                '</div>'+
                '</div>';
            $(".div_for_append").append(append);
        });
        $('body').delegate(".remove_image",'click',function(){
            $(this).parent().remove();
        });
        $('body').delegate('.clear_styles','click',function(){

        });
    });
</script>





