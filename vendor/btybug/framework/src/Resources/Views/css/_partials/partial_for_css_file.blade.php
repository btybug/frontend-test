<?php
$path = base_path('public'.DS.'dinamiccss');
$data = $data = getDinamicStyleForCssFileDemo($slug,"table_css");
$file = \App\Http\Controllers\PhpJsonParser::getFileByName($slug,$path);
?>
<style>
    .m-t-b-21{
        margin-top: 20px;
        margin-bottom: 10px;
    }
    .modal-dialog {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
    }

    .modal-content {
        height: 100%;
        border-radius: 0;
    }
    .modal-header{
        background-color: #499bc7;
        color: white;
        box-shadow: 0 1px 4px 0 #2b2b2bb5;
        border: 0;
    }
    .modal-header button{
        opacity: 0.7;
        font-size: 26px;
    }
    .modal-body{
        background-color: #499bc738;
        min-height: 100%;
    }
    #myModalCss{
        padding: 0!important;
    }
    .ace_editor{
        min-height:500px;
        flex: 1;
    }
</style>
@if($file)
    {!! useDinamicStyleByPath($file->__toString(),'public'.DS.'dinamiccss') !!}
@endif

<div class="col-md-12 append_here">

</div>
<div class="clearfix"></div>
<div class="just_html"></div>
<textarea class="hidden get_data">{{json_encode($data->styles,true)}}</textarea>
@if(count($data))
    <script type="template" id="get_for_append">
        @foreach($data->styles as $index => $style)
        @if($style)
        <div class="class_for_delete">
            <div class="col-md-3"><h5>{{$style->classname}}</h5></div>
            <div class="col-md-6">
                @if(isset($data->html))
                    <div class="col-md-12 parent">
                        {!! $data->html !!}
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                {{--<button class="btn btn-success btn-md show_in_just_html" data-class="{{$style->styles}}">Show</button>--}}
                <button class="btn btn-warning btn-md show_in_just_html_for_edit" data-id="{{$style->id}}" data-classname="{{$style->classname}}" data-slug="{{$slug}}" data-class="{{$style->styles}}">Edit</button>
                <button class="btn btn-danger btn-md remove_this_class" data-slug="{{$slug}}" data-id="{{$style->id}}">delete</button>
            </div>
            <div class="clearfix"></div>
            <div class="just_for_edit"></div>
        </div>
        <div class="clearfix"></div>
        @endif
        @endforeach
    </script>
@endif

<div class="modal fade" id="myModalCss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Details</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<script type="template" id="send_form_for_save">
    {!! Form::open(['url'=>route('save_style'),'method' => 'post',"class" => "submit_form_for_style"]) !!}
    <div class="class_for_delete">
        @if(isset($style_from_db->html))
            <div class="col-md-4 parent">
                {!! $style_from_db->html !!}
            </div>
        @endif
        <div class="{{isset($style_from_db->html) ? 'col-md-8' : 'col-md-12'}}">

            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#edit">Editor</a></li>
                <li><a data-toggle="tab" href="#stud">Studio</a></li>
            </ul>

            <div class="tab-content">
                <div id="edit" class="tab-pane fade in active">
                    <textarea class='code_textarea form-control' id="editor" ></textarea>
                </div>
                <div id="stud" class="tab-pane fade">
                    <h3>Area studio</h3>
                </div>
            </div>

            <input type="hidden" name="type" value="{{ app('request')->input('type') }}">
            <div class="this_flex">
                <button class="btn btn-danger btn-md custom_cancel" type="button">Cancel</button>
                <button class="btn btn-success btn-md validate_textarea" type="button" data-slug="{{$slug}}" data-class="{{isset($style) ? $style : ''}}">Save</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</script>
<script type="template" id="send_form_for_edit">
    {!! Form::open(['url'=>route('edit_style'),'method' => 'post',"class" => "submit_form_for_style_edit"]) !!}
    <div class="class_for_delete">
        {{--<div class="col-md-3">{repl_classname}</div>--}}
        <div class="col-md-6">
            @if(isset($style_from_db->html))
                <div class="col-md-12 parent">
                    {!! $style_from_db->html !!}
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <input type="hidden" name="type" value="{{ app('request')->input('type') }}">
            <div class="this_flex">

                <textarea class='code_textarea form-control' id="textarea_editor_for_save"></textarea>
                <button class="btn btn-warning btn-md allow_ace_for_edit" type="button">Edit</button>
                <button class="btn btn-success btn-md check_and_submit custom_hidden" data-id="{repl_id}" type="button" data-slug="{repl_slug}">Save</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</script>
<script>
    $(document).ready(function(){
        var textarea_editor_for_save = {};
        var data = JSON.parse($(".get_data").text());
        var html = $("#get_for_append").html();
        $(".append_here").html(html);
        if(html){
            $('[class="{your_class_name}"]').each(function(index,elem){
                var class_name = data[index].classname;
                return $(elem).attr("class",class_name);
            });
            // var childs = $(".append_here").children("div.class_for_delete").children().children("div.parent").children();
        }

        $("body").delegate(".remove_this_class","click",function () {
            var slug = $(this).data("slug");
            var id = $(this).data("id");
            var _token = $('input[name=_token]').val();
            var that = $(this);
            var url = base_path + "/admin/framework/css-classes/removeclass";
            $.ajax({
                url: url,
                data: {
                    slug:slug,
                    id:id,
                    _token: _token
                },
                success: function (data) {
                    if(!data.error){
                        return that.parents("div.class_for_delete").remove();
                    }
                    return alert("File does not exists");
                },
                type: 'POST'
            });
        });
        /*$("body").delegate(".show_in_just_html","click",function(){
            var content = $(this).data("class");
            $("div.just_for_edit").html("");
            $(this).parents("div.class_for_delete").children("div.just_for_edit").html("<div class='bordered'>" + content + "</div><div class='clearfix'></div>");
        });*/

        $("body").delegate(".show_in_just_html_for_edit","click",function(){
            var style = $(this).data("class");
            var slug = $(this).data("slug");
            var id = $(this).data("id");

            var class_name = $(this).data("classname");

            var content = $("#send_form_for_edit").html();
            content = content.replace("{repl_classname}",class_name).replace("{repl_id}",id).replace("{repl_slug}",slug).replace("{repl_original}",style);
            $("#myModalCss .modal-dialog .modal-body").html(content+"<div class='clearfix'></div>").find("div.parent").children().addClass(class_name);
            $("#myModalCss").modal("show");
            //$("div.just_for_edit").html("");
            // $(this).parents("div.class_for_delete").children("div.just_for_edit").html(content).find("div.parent").children().addClass(class_name);

            textarea_editor_for_save = ace.edit("textarea_editor_for_save");
            textarea_editor_for_save.setTheme("ace/theme/monokai");
            textarea_editor_for_save.session.setMode("ace/mode/css");
            textarea_editor_for_save.setOptions({
                maxLines: 25,
                readOnly: true
            });
            textarea_editor_for_save.setValue(style);
            textarea_editor_for_save.on("focus", function(){
                textarea_editor_for_save.unsetStyle("set_border");
            });
            textarea_editor_for_save.renderer.$cursorLayer.element.style.opacity=0
        });
        $("body").delegate(".check_and_submit","click",function(){
            var editor_value = textarea_editor_for_save.getValue();
            var annot = textarea_editor_for_save.getSession().getAnnotations();
            var id = $(this).data("id");
            for (var key in annot){
                if (annot.hasOwnProperty(key) && annot[key].type === 'error') {
                    return textarea_editor_for_save.setStyle("set_border");
                }
            }
            if(!editor_value){
                return textarea_editor_for_save.setStyle("set_border");
            }
            return (
                $(".submit_form_for_style_edit").append("<input type='hidden' name='style_id' value='"+id+"'><input type='hidden' name='changed_style' value='"+editor_value+"'>").submit()
            );
        });
        $("body").delegate(".allow_ace_for_edit","click",function(){
            textarea_editor_for_save.setOptions({
                readOnly: false
            });
            textarea_editor_for_save.renderer.$cursorLayer.element.style.opacity=1;
            $(this).addClass("custom_hidden");
            $(".check_and_submit").removeClass('custom_hidden');
        });
        $("body").delegate(".custom_cancel","click",function(){
            $("div.just_html").html("");
        });
    });
</script>
