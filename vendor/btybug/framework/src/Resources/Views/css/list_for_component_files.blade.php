@extends('btybug::layouts.admin')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('success') }}</strong>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ Session::get('error') }}</strong>
        </div>
    @endif
    <div class="main_lay_cont">
        {{--<div class="row for_title_row">--}}
        {{--<h1 class="text-center">Components</h1>--}}
        {{--</div>--}}
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <div class=" headar-btn">
                <div>
                    {{\App\Http\Controllers\PhpJsonParser::renderName(explode("_",$slug))}}
                </div>
                <div>
                    <button class="btn btn-primary show_form_for_setting">Settings</button>
                    <button type="button" class="btn btn-info show_form"><i class="fa fa-plus"></i></button>
                </div>
            </div>


            <div class="form-comp col-md-12 custom_hidden is_show_for_setting">
                {!! Form::open(['url'=>route('save_style_with_html_component'),'method' => 'post','class'=>'sub_html_tag']) !!}
                <div class="col-md-7">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="filename">Item name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" id="filename" name="filename" class="form-control" value="{{\App\Http\Controllers\PhpJsonParser::renderName(explode("_",$slug))}}">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="">Item html</label>
                        </div>
                        <div class="col-md-8">
                            <input id="html_val" type="hidden" value="{{isset($style_from_db) ? $style_from_db->html : ''}}">
                            <textarea id="editor_html" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <input type="hidden" name="type" value="{{ app('request')->input('type') }}">
                <div class="col-md-12">
                    @if($slug != "xl_large_text" && $slug != "l_text" && $slug != "m_text" && $slug != "s_text" && $slug != "xs_text" && $slug != "link_text" && $slug != "icons")
                        <button type="button" class="btn btn-danger pull-right btn-lg custom_margin_left delete_item_and_classes" data-name="{{$slug}}">Delete this item and its classes</button>
                    @endif
                    <button class="btn btn-lg btn-success pull-right html_before_submit" type="button">Save</button>
                </div>
                {!! Form::close() !!}
            </div>


            {{-- <div class="form-comp col-md-12 custom_hidden is_show">
                 {!! Form::open(['url'=>route('save_style'),'method' => 'post',"class" => "submit_form_for_style"]) !!}
                     <div class="col-md-7">
                         <div class="form-group">
                             <div class="col-md-4">
                                 <label for="">Class Code</label>
                             </div>
                             <div class="col-md-8">
                                 <textarea name="code" id="editor" cols="30" rows="10" class="form-control this_very_textarea"></textarea>
                                 <div class="clearfix"></div>
                             </div>
                             <div class="clearfix"></div>
                         </div>
                     </div>
                     <input type="hidden" name="type" value="{{ app('request')->input('type') }}">
                     <div class="col-md-5">
                         <button class="btn btn-lg btn-success pull-right validate_textarea" type="button">Save</button>
                     </div>
                 {!! Form::close() !!}
                 <div class="clearfix"></div>
             </div>--}}
        </div>

        <div class="row layouts_row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 m-t-54">
                @include("framework::css._partials.left_menu_for_component")
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                @include("framework::css._partials.partial_for_component_file")
            </div>
        </div>
    </div>
@stop
@section('CSS')
    {!! HTML::style('public/css/bty.css?v='.rand(1111,9999)) !!}
    {!! HTML::style('public/css/new-store.css') !!}
    <style>
        .main_lay_cont {
            min-height: 500px;
        }

        .headar-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #78909C;
            color: #fff;
            padding: 10px 15px;
        }

        .form-comp {
            background-color: #a0a0a0;
            color: white;
            padding: 20px;
            position:absolute;
            z-index: 9999999;
            width:97%;
        }

        .form-comp textarea {
            height: 150px !important;
        }
        .custom_hidden{
            display: none;
        }
        .custom_div_width{
            width:200px;
            margin:10px 0px;
        }
        .code_textarea{
            height:130px!important;
        }
        .custom_margin_left{
            margin-left:15px;
        }
        .error{
            color:#a94442;
        }
        .m-t-54{
            margin-top:-54px;
        }
        @media (max-width: 992px){
            .m-t-54{
                margin-top:0;
            }
        }
        .ace_editor{
            height:160px;
            flex: 1;
        }
        .set_border{
            border: 2px solid #FF0000;
        }
        .custom_inline_block{
            display:inline-block;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script('public/js/ace-editor/ace.js') !!}

    <script>
        $(document).ready(function(){
            var html_val = $("#html_val").val();
            var editor_html = ace.edit("editor_html");
            editor_html.setTheme("ace/theme/monokai");
            editor_html.session.setMode("ace/mode/html");
            editor_html.setValue(html_val);

            var editor = {};
            $("body").delegate(".show_form","click",function(){
                var content = $("#send_form_for_save").html();
                $(".is_show_for_setting").addClass("custom_hidden");
                $("div.just_html").html(content);

                editor = ace.edit("editor");
                editor.setTheme("ace/theme/monokai");
                editor.session.setMode("ace/mode/css");
                editor.on("focus", function(){
                    editor.unsetStyle("set_border");
                });
            });
            $("body").delegate(".delete_item_and_classes","click",function(){
                var slug = $(this).data("name");
                var _token = $('input[name=_token]').val();
                var url = base_path + "/admin/framework/html-component/reset";
                $.ajax({
                    url: url,
                    data: {
                        slug:slug,
                        _token: _token
                    },
                    success: function (data) {
                        if(!data.error){
                            return window.location.reload();
                        }
                        alert("File does not exists");
                    },
                    type: 'POST'
                });
            });
            $("body").delegate(".show_form_for_setting","click",function(){
                var is_show = $(".is_show_for_setting").hasClass("custom_hidden");
                if(is_show){
                    $(".is_show_for_setting").removeClass('custom_hidden');
                    $(".is_show").addClass('custom_hidden');
                }else{
                    $(".is_show_for_setting").addClass('custom_hidden');
                }
            });
            $("body").delegate(".validate_textarea","click",function(){
                var editor_value = editor.getValue();
                var annot = editor.getSession().getAnnotations();
                for (var key in annot){
                    if (annot.hasOwnProperty(key) && annot[key].type === 'error') {
                        return editor.setStyle("set_border");
                    }
                }
                if(!editor_value){
                    return editor.setStyle("set_border");
                }
                return (
                    $(".submit_form_for_style").append("<input type='hidden' name='full_style' value='"+editor_value+"'>").submit()
                );
            });
            $("body").delegate(".html_before_submit","click",function(){
                var editor_value = editor_html.getValue();
                var annot = editor_html.getSession().getAnnotations();
                for (var key in annot){
                    if (annot.hasOwnProperty(key) && annot[key].type === 'error') {
                        return editor_html.setStyle("set_border");
                    }
                }
                if(!editor_value){
                    return editor_html.setStyle("set_border");
                }
                return (
                    $(".sub_html_tag").append("<input type='hidden' name='file_html' value='"+editor_value+"'>").submit()
                );
            });
        });
    </script>

    {!! HTML::script('public/js/bty.js?v='.rand(1111,9999)) !!}
@stop
