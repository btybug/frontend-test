@if($page)
    {!! Form::model($page,['route' => ["frontsite_save_general",$id], 'id' => 'page_settings_form']) !!}

    <div class="">
        <div class="col-xs-12 col-sm-9 connected" data-bbsortable="target">
            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading"> Page Info</div>
                <div class="panel-body published_1">
                    {!! Form::hidden('id') !!}
                    <div class="row">
                        <div class="page-name">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 row_inputs">
                                <i class="fa fa-file-text" aria-hidden="true"></i><span
                                        class="labls">Page Name</span>
                                {!! Form::text('title',null,['class' => 'page_name form-control']) !!}
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 row_inputs">
                                <i class="fa fa-file-text" aria-hidden="true"></i><span
                                        class="labls">Page URL</span>
                                @if($page->type == 'custom')
                                    {!! Form::text('url',null,['class' => 'page_url form-control']) !!}
                                @else
                                    <div class="page_address page_labels">{!! $page->url !!}</div>
                                    {!! Form::hidden('url',null) !!}
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12  left_sd verticalcontainer">
                            {{--<div class="vertical-text">--}}
                            {{--<span><i class="fa fa-check-circle icon_pbl"--}}
                            {{--aria-hidden="true"></i>Published</span>--}}
                            {{--</div>--}}
                            <div class="row left_part_publ">
                                <div>
                                    <div class="row rows">
                                        <div class="col-md-12 ">
                                            <div class="col-md-6">
                                                <div class="block-page">
                                                    <i class="fa fa-universal-access" aria-hidden="true"></i><span
                                                            class="labls">Page access</span>
                                                    <div class="page-access">
                                                        <div class="input-radio-1-bty">
                                                            {!! Form::radio('page_access',0,true,['class' => 'access-radio' ,'id' =>'radios-0']) !!}
                                                            <label for="radios-0">
                                                                Public
                                                            </label>
                                                        </div>
                                                        <div class="input-radio-1-bty">
                                                            {!! Form::radio('page_access',1,null,['class' => 'access-radio','id' =>'radios-1']) !!}
                                                            <label for="radios-1">
                                                                Memberships
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="memberships-box {!! ($page->page_access) ? '' : 'hide' !!}">
                                                        <label>
                                                            Select Memberships
                                                        </label>
                                                        {!! Form::select('memberships[]',$memberships,null,['class' => 'form-control memberships-select','multiple' => true]) !!}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="block-page">


                                                    <i class="fa fa-universal-access" aria-hidden="true"></i><span
                                                            class="labls">Special access</span>

                                                    <div class="special-access">
                                                        <label>
                                                            Select
                                                        </label>
                                                        {!! Form::select('special_access[]',$specials,null,['class' => 'form-control special-select','multiple' => true]) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading"> Author Info</div>
                <div class="panel-body published_1">
                    <div class="">
                        <div class="col-xs-12 col-sm-12 right_part_publ">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 author_name_div">
                                    <div class="name_btn_div">
                                        <span class="author_name labls">Author Name</span>
                                        {!! Form::select('user_id',$admins,null,['style' => 'margin: auto;']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 user_photo text-center">
                                    <img src="{!! BBGetUserAvatar($page->user_id) !!}" alt="avatar"
                                         class="thumb-md-blue">
                                    {{--<i class="fa fa-user" aria-hidden="true"></i>--}}
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 author_name_div m-t-10">
                                    <p style="text-align: left"><b>Created
                                            :</b> {!! BBgetTimeFormat($page->created_at) !!} {!! BBgetDateFormat($page->created_at) !!}
                                    </p>
                                    <p style="text-align: left">
                                        <b>Edited :</b>
                                        @if($page->edited_by)
                                            By {{ @$page->editor->username }} {!! BBgetTimeFormat($page->updated_at) !!} {!! BBgetDateFormat($page->updated_at) !!}
                                        @else
                                            Not Edited Yet
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 create connected" data-bbsortable="source">
            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading">General</div>
                <div class="panel-body">
                    <a href="javascript:void(0)" class="btn btn-info btn-block full-page-view m-b-5">Full Preview</a>
                    {{ Form::submit('Save', array('class' => 'save_btn m-b-5 btn-block','style' => "width:100%;")) }}

                    <div class="form-group">
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        <span class="labls">Status</span>
                        {!! Form::select('status',['draft' => 'Draft','published' => 'Published'],null,["class" => 'form-control']) !!}
                    </div>
                </div>
            </div>

            @if($page->type != 'classify' && $page->type != 'tags')
                <div class="panel panel-default custompanel m-t-20">
                    <div class="panel-heading"> Page Tags</div>
                    <div class="panel-body">
                        <div class="">
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 m-t-15">
                                <div>
                                    All Tags
                                </div>
                                <ul class="list-inline" id="temp">
                                    @if (count($tags) > 0)
                                        @foreach ($tags as $tag)
                                            <li style="margin-top:5px;">
                                                <div class="btn btn-default">
                                                    {{ $tag->name }}
                                                    <a data-key="{!! $tag->id.'.'.$page->id !!}"
                                                       data-type="{!! $tag->name !!} Tag"
                                                       class="delete-button"
                                                       data-href="{{ url('admin/manage/frontend/pages/detach') }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                {!! Form::text('tags','',['class' => 'form-control','id' =>'tags']) !!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default custompanel m-t-20">
                    <div class="panel-heading">Select Classify</div>
                    <div class="panel-body">
                        <div class="">
                            <div class="col-md-4">
                                Select Classify
                            </div>
                            <div class="col-md-8">
                                <select name="classify" class="form-control classify">
                                    <option value="0" data-type="false">Select Classify</option>
                                    @foreach($classifies as $classify)
                                        <option value="{!! $classify->id !!}"
                                                data-type="{!! $classify->type !!}">{!! $classify->title !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row classify-box" style="min-height: 300px;">
                            @if($classifierPageRelations->count())
                                @foreach($classifierPageRelations as $classify)
                                    @include('manage::frontend.pages._partials.classify-items', [
                                        'classify' => $classify->classifier()->first(),
                                        'termsList' => $classify->classifier()->first()->classifierItem()->pluck('title','id')->toArray(),
                                        'classifyRelation' => $classify
                                    ])
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="clearfix"></div>
    </div>
    {!! Form::close() !!}

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

    @include('resources::assests.magicModal')
@else
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 design_panel">
        <div class="published_1">
            NO Page
        </div>
    </div>
@endif

@section('CSS')
    {!! HTML::style('public/css/create_pages.css') !!}
    {!!HTML::style( '/css/tag-it/jquery.tagit.css' ) !!}
    {!! HTML::style('public/css/bootstrap/css/bootstrap-switch.min.css') !!}
    {!! HTML::style('public/css/font-awesome/css/fontawesome-iconpicker.min.css') !!}
    {!! HTML::style('public/css/menus.css?v='.rand(1111,9999)) !!}
    {!! HTML::style("public/css/select2/select2.min.css") !!}

    <style>
        #main-wrapper {
            min-height: 1000px;
            display: inline-block;
        }

        @media (min-width: 1787px) {
            .header_image, .block {
                height: 398px;
            }
        }

        .live-preview-btn {
            background: #499bc7;
            color: #fff;
            width: 96px;
            height: 38px;
            border-radius: 3px;
            padding: 8px;
            font-size: 17px;
            margin-right: 10px;
            box-shadow: 2px 1px 6px #888888;
            cursor: pointer;
        }

        .input-radio-1-bty input[type="radio"] {
            display: none;
            cursor: pointer;
        }

        .input-radio-1-bty input[type="radio"]:focus, .input-radio-1-bty input[type="radio"]:active {
            outline: none;
        }

        .input-radio-1-bty label {
            cursor: pointer;
            display: inline-block;
            position: relative;
            padding-left: 25px;
            margin-right: 10px;
            color: #0b4c6a;
        }

        .input-radio-1-bty label:before, .input-radio-1-bty label:after {
            content: '';
            display: inline-block;
            width: 18px;
            height: 18px;
            left: 0;
            bottom: 0;
            text-align: center;
            position: absolute;
        }

        .input-radio-1-bty label:before {
            background-color: #fafafa;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .input-radio-1-bty label:after {
            color: #fff;
        }

        .input-radio-1-bty input[type="radio"]:checked + label:before {
            -moz-box-shadow: inset 0 0 0 10px #158EC6;
            -webkit-box-shadow: inset 0 0 0 10px #158EC6;
            box-shadow: inset 0 0 0 10px #158EC6;
        }

        .input-radio-1-bty label:before {
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .input-radio-1-bty label:hover:after, .input-radio-1-bty input[type="radio"]:checked + label:after {
            content: "\2022";
            position: absolute;
            top: 0;
            font-size: 19px;
            line-height: 15px;
        }

        .input-radio-1-bty label:hover:after {
            color: #c7c7c7;
        }

        .input-radio-1-bty input[type="radio"]:checked + label:after, .input-radio-1-bty input[type="radio"]:checked + label:hover:after {
            color: #fff;
        }

        .block-page .page-access {
            display: flex;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .block-page {
            box-shadow: 0 0 2px #ccc;
            padding: 15px;
        }
        .block-page .special-access{
            margin-top: 10px;
        }
        .block-page>i{
            margin-right: 5px;
            color: red;
        }
        .name_btn_div{
            padding-left: 0 !important;
        }
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9{
            padding-right: 15px;
            padding-left: 15px;
        }
        .m-t-20{
            margin-top: 20px;
        }


    </style>
@stop
@section('JS')
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script('public/js/page-setting.js') !!}
    {!! HTML::script("public/js/UiElements/bb_div.js?v.5") !!}
    {!! HTML::script('public/js/tinymice/tinymce.min.js') !!}
    {!! HTML::script('public/js/tag-it/tag-it.js') !!}
    {!! HTML::script('public/js/jquery.mjs.nestedSortable.js') !!}
    {!! HTML::script('public/css/bootstrap/js/bootstrap-switch.min.js') !!}
    {!! HTML::script('public/css/font-awesome/js/fontawesome-iconpicker.min.js') !!}
    {!! HTML::script('public/js/menus.js') !!}
    {!! HTML::script('public/js/select2/select2.full.min.js') !!}
    <script>

        $(document).ready(function () {
            $(".memberships-select").select2();
            $(".special-select").select2();

            $(".access-radio").click(function () {
                if ($(this).val() == 1) {
                    $(".memberships-box").removeClass("hide").addClass("show");
                } else {
                    $(".memberships-box").removeClass("show").addClass("hide");
                }
            });

//            var getExt = $('#tagits').data('allwotag').split(',')
//            $('[data-tagit="tagit"]').tagit({
//                availableTags: getExt,
//                // This will make Tag-it submit a single form value, as a comma-delimited field.
//                autocomplete: {delay: 0, minLength: 0},
//                singleField: true,
//                singleFieldNode: $('.tagitext'),
//                beforeTagAdded: function (event, ui) {
//                    if (!ui.duringInitialization) {
//                        var exis = getExt.indexOf(ui.tagLabel);
//                        if (exis < 0) {
//                            $('.tagit-new input').val('');
//                            //alert('PLease add allow at tag')
//                            return false;
//                        }
//                    }
//
//                }
//            })


            tinymce.init({
                selector: '#main_content', // change this value according to your HTML
                height: 200,
                theme: 'modern',
                plugins: [
                    'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullpage fullscreen hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount shortcodes',
                ],
                toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help shortcodes',
                image_advtab: true
            });

            $('body').on('click', '.live-preview-btn', function () {
                if (!$(this).next().hasClass('redirect-type')) {
                    var typeInput = $('<input/>', {
                        type: 'hidden',
                        name: 'redirect_type',
                        value: 'view',
                        class: 'redirect-type'
                    });
                    $(this).after(typeInput);
                    $('#page_settings_form').submit();
                }

            });
        });

    </script>
@stop