@if($page)
    {!! Form::model($page,['url' => route('frontsite_settings',$id), 'id' => 'page_settings_form','files' => true]) !!}

    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 col-xl-9 p-20">
        {!! BBgetFrontPagesPanels($page) !!}
    </div>
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 p-20">
        <div class="panel panel-default custompanel m-t-20">
            <div class="panel-heading">General</div>
            <div class="panel-body">
                <a href="javascript:void(0)" class="btn btn-info btn-block full-page-view m-b-5">Full Preview</a>
                {{ Form::submit('Save', array('class' => 'save_btn m-b-5 btn-block','style' => "width:100%;")) }}
            </div>
        </div>
    </div>


    {!! Form::close() !!}
    <input type="hidden" id="page" value="{!! $page->id !!}">
    @include('resources::assests.magicModal')

    <div class="modal fade" id="area-settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        {{--{!! Form::open(['url'=>'/admin/backend/theme-edit/live-save', 'id'=>'magic-form']) !!}--}}
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    {{--{!! Form::submit('Save',['class' => 'btn btn-success pull-right m-r-10']) !!}--}}
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body" style="min-height: 500px;">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="checkboxes">Area access</label>
                        <div class="col-md-4">
                            {{--@php--}}
                            {{--$frontendRoles=new \Btybug\User\Repository\RoleRepository();--}}
                            {{--@endphp--}}
                            {{--@foreach($frontendRoles->getFrontRoles() as $role)--}}
                            {{--<div class="checkbox">--}}
                            {{--<label for="checkboxes-1">--}}
                            {{--{!! Form::checkbox('page_layout_settings[sidebar_left_roles][]',$role->slug,(isset($page->page_layout_settings['sidebar_left_roles']) && in_array($role->slug,$page->page_layout_settings['sidebar_left_roles']))?1:0) !!}--}}
                            {{--{!! $role->name !!}--}}
                            {{--</label>--}}
                            {{--</div>--}}
                            {{--@endforeach--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--{!! Form::close() !!}--}}
    </div>
@else
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 design_panel">
        <div class="published_1">
            NO Page
        </div>
    </div>
@endif
<div class="modal fade" id="full-page-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button class="btn close-live-edit" data-dismiss="modal" aria-label="Close">
                <span class="fa fa-power-off"></span>
            </button>
            <div class="modal-body">
                <div class="live-edit-menu">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            Action
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Some live action</a></li>
                            <li><a href="#">Some live Settings</a></li>
                            <li><a href="#">Some live etc</a></li>
                        </ul>
                    </div>
                </div>
                <div class="iframe-area"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="view-unit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Unit Preview</h4>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>

<script type="template" id="js_tmp">
    <div class="col-md-12 portlet-js ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="col-md-2 portlet-handle-js ui-widget-header ui-corner-all">
            <label class="lbl"><span class='ui-icon ui-icon-grip-diagonal-se portlet-toggle'></span> Add Link </label>
        </div>
        <div class="col-md-6">
            {!! Form::text('js[]',null,['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            <a href="javascript:void(0)" class="external_delete btn btn-danger"><i class="fa fa-trash"></i></a>
        </div>
    </div>
</script>
<script type="template" id="css_tmp">
    <div class="col-md-12 portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
        <div class="col-md-2 portlet-handle ui-widget-header ui-corner-all">
            <label class="lbl"><span class='ui-icon ui-icon-grip-diagonal-se portlet-toggle'></span> Add Link </label>
        </div>
        <div class="col-md-6">
            {!! Form::text('css[]',null,['class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            <a href="javascript:void(0)" class="external_delete btn btn-danger"><i class="fa fa-trash"></i></a>
        </div>
    </div>
</script>

@section('CSS')
    {!! HTML::style('public/css/create_pages.css') !!}
    {!! HTML::style("public/css/select2/select2.min.css") !!}

    <style>
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            padding-right: 15px;
            padding-left: 15px;
        }

        .m-t-20 {
            margin-top: 20px;
        }

        .page-name > div:nth-of-type(1) > i {
            margin-left: 0;
        }

        .page-name > div:nth-of-type(2) .page_labels {
            margin-top: 0;
        }

        .column, .column-js {
            min-height: 100px;
        }

        .lbl {
            height: 28px;
            line-height: 30px;
            cursor: move;
        }

        .portlet-handle, .portlet-handle-js {
            cursor: move;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script("public/js/jquery-ui/jquery-ui.min.js") !!}
    {!! HTML::script("public/js/UiElements/bb_styles.js?v=".rand(999,9999)) !!}
    {!! HTML::script('public/js/page-setting.js') !!}
    {!! HTML::script("public/js/UiElements/ui-preview-setting.js") !!}
    {!! HTML::script("public/js/UiElements/ui-settings.js") !!}
    {!! HTML::script("public/js/UiElements/bb_div.js") !!}
    {!! HTML::script('public/js/tinymice/tinymce.min.js') !!}
    {!! HTML::script("public/js/select2/select2.full.min.js") !!}

    <script>
        tinymce.init({
            selector: '#main_content', // change this value according to your HTML
            height: 200,
            theme: 'modern',
            plugins: [
                'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullscreen hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount shortcodes',
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help shortcodes',
            image_advtab: true
        });

        $(document).ready(function () {
            $("body").on("click", ".reset-placeholder", function () {
                var key = $(this).data("reset");
                $("[data-id=" + key + "]").val("");
                $("[data-name=" + key + "]").val("");
            });

            $('.select-dropdowns').select2({
                placeholder: 'Select versions'
            });

            $(".column").sortable({
                connectWith: ".column",
                handle: ".portlet-handle",
                placeholder: "portlet-placeholder ui-corner-all"
            });

            $(".portlet")
                .addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
                .find(".portlet-handle")
                .addClass("ui-widget-header ui-corner-all")
                .prepend("<span class='ui-icon ui-icon-grip-diagonal-se portlet-toggle'></span>");


            $(".column-js").sortable({
                connectWith: ".column-js",
                handle: ".portlet-handle-js",
                placeholder: "portlet-placeholder-js ui-corner-all"
            });

            $(".portlet-js")
                .addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
                .find(".portlet-handle-js")
                .addClass("ui-widget-header ui-corner-all")
                .prepend("<span class='ui-icon ui-icon-grip-diagonal-se portlet-toggle'></span>");

            $('body').on('change', '.content_type_special', function () {
                var value = $(this).val();
                if (value == 'html') {
                    $('.html_body').removeClass('hide').addClass('show');
                    $('.template_body').removeClass('show').addClass('hide');
                } else {
                    $('.template_body').removeClass('hide').addClass('show');
                    $('.html_body').removeClass('show').addClass('hide');
                }

            });

            $("body").on("click", ".reset-placeholder", function () {
                var key = $(this).data("reset");
                $("[data-id=" + key + "]").val("");
                $("[data-name=" + key + "]").val("");
            });

            $("body").on("click", ".add-new-js", function () {
                var key = $('#js_tmp').html();
                $(".column-js").append(key);
                $(".column-js").sortable("refresh");
            });

            $("body").on("click", ".external_delete", function () {
                $(this).parents().eq(1).remove();
            });

            $("body").on("click", ".add-new-css", function () {
                var key = $('#css_tmp').html();
                $(".column").append(key);
                $(".column").sortable("refresh");
            });

            $("body").on("click", ".view-placeholder", function () {
                var key = $(this).data("view");
                $.ajax({
                    type: "post",
                    datatype: "json",
                    url: "/admin/console/bburl/render-unit",
                    data: {id: key},
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    },
                    success: function (data) {
                        $("#view-unit .modal-body").html(data.html);
                        $("#view-unit").modal();
                    }
                });
            });

            $('body').on('change', '.content_type_css', function () {
                var value = $(this).val();
                if (value == 'external') {
                    $('.css_external').removeClass('hide').addClass('show');
                    $('.css_cms').removeClass('show').addClass('hide');
                } else if (value == 'cms') {
                    $('.css_cms').removeClass('hide').addClass('show');
                    $('.css_external').removeClass('show').addClass('hide');
                } else {
                    $('.css_cms').removeClass('show').addClass('hide');
                    $('.css_external').removeClass('show').addClass('hide');
                }
            });

            $('body').on('change', '.content_type_js', function () {
                var value = $(this).val();
                if (value == 'external') {
                    $('.js_external').removeClass('hide').addClass('show');
                    $('.js_cms').removeClass('show').addClass('hide');
                } else if (value == 'cms') {
                    $('.js_cms').removeClass('hide').addClass('show');
                    $('.js_external').removeClass('show').addClass('hide');
                } else {
                    $('.js_cms').removeClass('show').addClass('hide');
                    $('.js_external').removeClass('show').addClass('hide');
                }
            });
        });
    </script>

@stop