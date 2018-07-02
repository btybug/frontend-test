@extends('btybug::layouts.admin')
@include('resources::assests.magicModal')
@section('content')
    <div role="tabpanel" class="m-t-10" id="main">
            <div class="head-top">
                {!! Form::model($hook,['url' => route('frontsite_hooks_edit_save',$hook->id)]) !!}
                    <div class="col-md-3">
                        {!! Form::text('name',$hook->name,["class" => "form-control"]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('type',["Vertical"=>"Vertical",'Horizontal'=>"Horizontal"],$hook->type,["class"=>"form-control is_horizontal"]) !!}
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info pull-right">Save</button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12 custom_margin">
                        <div class="bty-panel-collapse">
                            <div>
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#placeholder"
                                   aria-expanded="true">
                                    <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
                                    <span class="title">Place holder</span>
                                </a>
                            </div>
                            <div id="placeholder" class="collapse in" aria-expanded="true" style="">
                                <div class="content bty-settings-panel">
                                    @if(count($hook->data) > 0)
                                        @foreach($hook->data as $key => $value)
                                            <div class="form-group lets_each" data-id="{{$key}}">
                                                <div class="col-md-7">
                                                    {!! BBbutton2('unit','menu_area['.$key.'][variation]','frontend','Select Menu',['class'=>'form-control input-md ic','model'=>$value['variation']]) !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="" class="col-sm-3">Grid</label>
                                                    <div class="col-md-9">
                                                        {!! Form::select('menu_area['.$key.'][style]',[0=>'select grid',1=>'1',2=>'2',3=>'3',4=>'4',5=>'5',6=>'6',7=>'7',8=>'8',9=>'9',10=>'10',11=>'11',12=>'12'],$value['style'],['class'=>'form-control style custom_change_grid','data-parent'=>$key]) !!}
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-danger pull-right remove_this"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        @endforeach
                                    @endif
                                    <div class="col-md-12 prepend_template">
                                        <button class="btn btn-primary pull-right render_icons"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="col-md-12 custom_margin is_show {{$hook->type=="Vertical" ? 'custom_hide' : ''}}">
                @if(count($hook->data) > 0)
                    @foreach($hook->data as $key => $value)
                        <div class="col-md-{{$value['style']}} lets_change_grid_or_remove_{{$key}}">
                            {!! BBRenderUnits($value['variation']) !!}
                        </div>
                    @endforeach
                @endif
            </div>
    </div>



@stop
@section('CSS')
    <style>
        .head-top{
            padding: 12px 0;
            background: #78909C;
            margin: 0 -15px;
        }
        .head-top .name{
            margin-top: 7px;
            color: white;
        }
        .custom_margin{
            margin-top:30px;
        }
        .custom_hide{
            display:none;
        }
        .bordered{
            height:300px;
            border: 1px solid;
        }
    </style>
    {!! HTML::style('public/css/menu.css?v=0.16') !!}
    {!! HTML::style('public/css/admin_pages.css') !!}
    {!! HTML::style('public/css/tool-css.css?v=0.23') !!}
    {!! HTML::style('public/css/page.css?v=0.15') !!}
@stop


@section('JS')
    <script>
        window.onload = function(){
            var icons_index = {{count($hook->data) ? count($hook->data) : 0}};
            $("body").delegate(".render_icons","click",function(e){
                e.preventDefault();
                $.ajax({
                    type: "post",
                    datatype: "json",
                    url: "/admin/front-site/structure/hooks/renderbbbuton",
                    data: {id: icons_index},
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    },
                    success: function (data) {
                        $(".prepend_template").before(data.html);
                    }
                });

                return icons_index += 1;
            });
            $("body").delegate(".remove_this","click",function(e){
                e.preventDefault();
                var parent = $(this).parents(".lets_each").data("id");
                $(".lets_change_grid_or_remove_"+parent).remove();
                $(this).parent().parent().remove();
                if(icons_index != 0){
                    icons_index -= 1;
                }
                $(".lets_each").each(function(index,item){
                    $(item).find("input.bb-button-realted-hidden-input").attr("name",'menu_area['+index+'][variation]');
                    $(item).find("select.style").attr("name",'menu_area['+index+'][style]');
                });
                $("input.url").trigger("keyup");
                return icons_index;
            });
            $("body").delegate(".is_horizontal","change",function(){
                var value = $(this).val();
                if(value == "Horizontal"){
                    $(".is_show").removeClass("custom_hide");
                }else{
                    $(".is_show").addClass("custom_hide");
                }
            });
            $("body").delegate(".item.item-unit","click",function(){
                var html = '';
                $(".bb-button-realted-hidden-input").each(function(index,item){
                    var val = $(item).val();
                    var removable = $(item).parents(".lets_each").data("id");
                    $.ajax({
                        type: "post",
                        datatype: "json",
                        url: "/admin/console/bburl/render-unit",
                        data: {id: val},
                        async:false,
                        headers: {
                            'X-CSRF-TOKEN': $('[name="_token"]').val()
                        },
                        success: function (data) {
                            //  var col = $(".get_col").val();
                            var col = $(item).parents(".lets_each").find("select.custom_change_grid").val();
                            if(col == 0){
                                col = 4;
                            }
                            if(data.html){
                                html += '<div class="col-md-'+col+' lets_change_grid_or_remove_'+removable+'">'+data.html+'</div>';
                            }
                        }
                    });
                });
                if(html.length){
                    $(".is_show").html(html);
                }
            });
            $("body").delegate(".input-group-addon button","click",function(){
                $(".input-group-addon button").parents(".lets_each").find("select.style").removeClass("get_col");
                $(this).parents(".lets_each").find("select.style").addClass("get_col");
            });
            $("body").delegate(".custom_change_grid","change",function(){
                var parent = $(this).data("parent");
                var grid = $(this).val();
                if (grid == 0){
                    grid = 4;
                }
                $(".lets_change_grid_or_remove_"+parent).removeAttr("class").addClass('lets_change_grid_or_remove_'+parent+' col-md-'+grid);
            });
        }
    </script>

    {!! HTML::script("/public/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script('public/js/admin_pages.js') !!}
    {!! HTML::script('public/js/nestedSortable/jquery.mjs.nestedSortable.js') !!}
    {!! HTML::script('public/js/bootbox/js/bootbox.min.js') !!}
    {!! HTML::script('public/js/icon-plugin.js?v=0.4') !!}
@stop
