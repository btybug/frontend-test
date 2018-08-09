@extends('mini::layouts.app')
@extends('mini::layouts.mTabs',['index'=>'mini_my_site_extra_units'])
@section('tab')
    {{-- {{$units}}--}}
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                @include('mini::extra._partials.sidebar')
            </div>
            @if(is_object($model) && $model instanceof \Btybug\btybug\Models\Painter\PainterInterface)
                <div class="col-md-9 col-xs-12">
                    <div class="right-main-all">
                        <form action="{{route('mini_admin_assets_units_settings_post',$model->slug)}}" method="post" id="form">
                            <div class="profile">
                                <div class="head">
                                    <span>
                                       {{$model->title}}
                                    </span>
                                </div>
                                <div class="content-profile">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="image">
                                                <iframe class="unit_preview" data-slug="{{$model->slug}}"
                                                        src="{{url('admin/mini/assets/units/render/'.$model->slug.'.default')}}"
                                                        width="100%" style="min-height: 500px;">

                                                </iframe>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="info">
                                                <div>
                                                    <p><span>Author:</span>{{$model->author}}</p>
                                                    <p><span>Details:</span>{{$model->description}}</p>
                                                </div>
                                                <div>
                                                    <p><span>Site:</span>{{$model->site}}</p>
                                                    <div class="tagss">
                                                        <p>
                                                            <span>Tags:</span>
                                                        </p>
                                                        <p>
                                                            <input type="text" name="tags" class="onChange" id="tagits" value="
                                                                    @if(is_array($tags))
                                                            {{implode(',',$tags)}}
                                                            @else
                                                            {{$tags}}
                                                            @endif
                                                                    ">
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit-ajax" style="display: none"></button>
                        </form>
                        <div class="variations">
                            <div class="title">
                                Variations
                            </div>
                            <div class="buttons">
                                <a href="{!! route('mini_admin_assets_create_unit_variation',$model->slug) !!}">
                                    <button class="btn btn-sm btn-warning">Create new <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                                <div class="grid-list">
                                    <button class="btn btn-sm btn-warning onGridButton"><i class="fa fa-bars"></i>Detail</button>
                                    <button class="btn btn-sm btn-warning onListButton active"><i class="fa fa-th"></i>List</button>
                                </div>
                            </div>
                        </div>
                        <div class="previews">
                            <div class="row">
                                @foreach($units as $val)
                                    @if($val->slug == $model->slug)
                                        @foreach($val->variations()->all() as  $v)
                                            @if($v->title !== 'default')
                                                <div class="col-sm-12">
                                                    <div class="welll">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="preview">
                                                                    <iframe class="unit_preview" data-slug="}"
                                                                            src="{{route('mini_admin_assets_units_live',$v->id )}}"
                                                                            width="100%" style="min-height: 500px;">
                                                                    </iframe>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 col-xs-12">
                                                                <div class="title">
                                                                    {{$v->title}}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-xs-12">
                                                                <div class="buttons">
                                                                    <a href="{!! route('mini_admin_assets_units_live',$v->id) !!}">
                                                                        <button class="btn btn-md btn-warning">Edit</button>
                                                                    </a>
                                                                    <button class="btn btn-md btn-danger">Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-sm-12">
                                                    <div class="welll">
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="preview">
                                                                    <iframe class="unit_preview" data-slug="{{$v->id}}"
                                                                            src="{{route('mini_admin_assets_units_live',$v->id) }}"
                                                                            width="100%" style="min-height: 500px;">
                                                                    </iframe>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 col-xs-12">
                                                                <div class="title">
                                                                    {{$v->title}}
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-xs-12">
                                                                <div class="buttons">
                                                                    <button class="btn btn-md btn-warning" disabled>Edit</button>
                                                                    <button class="btn btn-md btn-danger" disabled>Delete</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('mini::extra._partials.previewModal')
    <input type="hidden" id="iframle-url" value="{!! url('admin/mini/assets/units/render/') !!}">
    <input type="hidden" id="live-preview-url" value="{!! route('mini_admin_assets_units_live') !!}">

@stop
@section("js")
    {!! HTML::script('public/js/tag-it/tag-it.js') !!}
    {!! HTML::script('public/js/select2/select2.full.min.js') !!}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click','.variations .grid-list button',function() {
                if ($(this).hasClass('onGridButton')) {
                    $('.previews>.row>div').removeClass('col-sm-12 list').addClass('col-sm-6 grid');
                    $(this).parent().children().removeClass('active');
                    $(this).addClass('active');
                }
                else if($(this).hasClass('onListButton')) {
                    $('.previews>.row>div').removeClass('col-sm-6 grid').addClass('col-sm-12 list');
                    $(this).parent().children().removeClass('active');
                    $(this).addClass('active');
                }
            });
            $('body').on('click', '.preview-modal', function () {
                $("#preview-modal").modal()
            });



            $('#tagits').tagit({
                autocomplete: {
                    delay: 0,
                    minLength: 0

                },
                tagSource: function () {
                    $.ajax({
                        url: "{!! route('front_site_tag_list') !!}",
                        dataType: "json",
                        method: "post",
                        data: {},
                        headers: {
                            'X-CSRF-TOKEN': $("input[name='_token']").val()
                        },
                        success: function (data) {

                        }

                    });
                },
                // This will make Tag-it submit a single form value, as a comma-delimited field.
                singleField: true,
                singleFieldNode: $('.tagitext'),
                beforeTagAdded: function (event, ui) {
                    if (!ui.duringInitialization) {
//                    var exis = getExt.indexOf(ui.tagLabel);
//                    if (exis < 0) {
//                        $('.tagit-new input').val('');
//                        //alert('PLease add allow at tag')
//                        return false;
//                    }
                    }

                }
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            $('#tab').addClass('active');
            $('.tagit-hidden-field').attr('disabled');
        });
    </script>
@stop

@section('css')
    {!! HTML::style('public/css/jquery.tagit.css') !!}
    {!! HTML::style("public/css/select2/select2.min.css") !!}

    <style>

        .right-main-all .profile {
            margin-bottom: 20px;
            box-shadow: 0 1px 2px #949494;
        }

        .right-main-all .profile > .head {
            background-color: #000000;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 15px;
        }

        .right-main-all .profile > .head {
            font-weight: bold;
        }

        .right-main-all .profile > .content-profile {
            background-color: whitesmoke;
        }

        .right-main-all .profile > .content-profile > .row {
            display: flex;
            padding-left: 0;
        }

        .right-main-all .profile > .content-profile .image {
            padding: 15px;
            padding-right: 0;
            overflow: hidden;
            height: 200px;

        }

        .right-main-all .profile > .content-profile img {
            width: 100%;
            border: 2px solid #000000;
            object-fit: cover;
            height: 100%;
        }

        .right-main-all .profile > .content-profile .info {
            height: 100%;
            display: flex;
            flex-direction: column;
            padding-top: 13px;
        }

        .right-main-all .profile > .content-profile .info p span {
            font-weight: bold;
            margin-right: 7px;
        }

        .right-main-all .profile > .content-profile .info > div:last-of-type {
            margin-top: auto;
        }

        .right-main-all .profile > .content-profile .publish {
            height: 100%;
            background-color: #a0d8f7;
            border-left: 2px solid #000000;
            padding: 15px;
        }

        .right-main-all .profile > .content-profile .publish .head {
            background-color: #f0ad4e;
            color: black;
            padding: 5px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .right-main-all .profile > .content-profile .publish .publish-check input[type="radio"] {
            display: none;
            cursor: pointer;
        }

        .right-main-all .profile > .content-profile .publish .publish-check input[type="radio"]:focus,
        .right-main-all .profile > .content-profile .publish .publish-check input[type="radio"]:active {
            outline: none;
        }

        .right-main-all .profile > .content-profile .publish .publish-check label {
            cursor: pointer;
            display: inline-block;
            position: relative;
            padding-left: 25px;
            margin-right: 10px;
            color: #0b4c6a;
            font-weight: bold !important;
        }

        .right-main-all .profile > .content-profile .publish .publish-check label:before,
        .right-main-all .profile > .content-profile .publish .publish-check label:after {
            content-profile: '';
            display: inline-block;
            width: 18px;
            height: 18px;
            left: 0;
            bottom: 0;
            text-align: center;
            position: absolute;
        }

        .right-main-all .profile > .content-profile .publish .publish-check label:before {
            background-color: #fafafa;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .right-main-all .profile > .content-profile .publish .publish-check label:after {
            color: #fff;
        }

        .right-main-all .profile > .content-profile .publish .publish-check input[type="radio"]:checked + label:before {
            -moz-box-shadow: inset 0 0 0 10px #f0ad4e;
            -webkit-box-shadow: inset 0 0 0 10px #f0ad4e;
            box-shadow: inset 0 0 0 10px #f0ad4e;
        }

        .right-main-all .profile > .content-profile .publish .publish-check label:before {
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
        }

        .right-main-all .profile > .content-profile .publish .publish-check label:hover:after, .right-main-all .profile > .content-profile .publish .publish-check input[type="radio"]:checked + label:after {
            content: "\2713";
            line-height: 18px;
            font-size: 14px;
        }

        .right-main-all .profile > .content-profile .publish .publish-check label:hover:after {
            color: #c7c7c7;
        }

        .right-main-all .profile > .content-profile .publish .publish-check input[type="radio"]:checked + label:after, .right-main-all .profile > .content-profile .publish .publish-check input[type="radio"]:checked + label:hover:after {
            color: #fff;
        }

        .right-main-all .variations {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 15px;
            background-color: #b177a7;
            margin-bottom: 20px;
        }

        .right-main-all .variations > .title {
            font-weight: bold;
            color: black;
            font-size: 16px;
            letter-spacing: 1px;
        }

        .right-main-all .profile > .head span {
            font-size: 16px;
            letter-spacing: 1px;
        }

        .right-main-all .variations > .buttons  {
            display: flex;
        }
        .right-main-all .variations > .buttons >a {
            margin-right: 40px;
        }
        .right-main-all .variations > .buttons .grid-list button i {
            margin-right: 5px;
        }
        .right-main-all .previews .welll {
            margin-bottom: 15px;
            box-shadow: 0 1px 2px #949494;
            padding: 15px 0;

        }

        .right-main-all .previews .welll > .row {
            display: flex;
        }

        .right-main-all .info .tagss {
            display: flex;
            align-items: center;
        }

        .memberships {
            display: flex;
            align-items: center;
        }

        .right-main-all .previews .welll .preview {
            padding-left: 25px;
            height: 200px;
            overflow: hidden;
        }

        .right-main-all .previews .welll .preview img {
            width: 100%;
            object-fit: cover;
            height: 100%;
        }

        .right-main-all .previews .welll .title {
            height: 100%;
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 18px;
        }

        .right-main-all .previews .welll .buttons {
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: flex-end;
        }

        .right-main-all .previews .welll .buttons button {
            border-radius: 0;
        }

        .right-main-all .previews .welll .buttons button:first-of-type {
            margin-bottom: 10px;
        }
        .right-main-all .previews .grid .welll{
            padding: 0;
        }
        .right-main-all .previews .grid .welll>.row{
            flex-direction: column;
        }
        .right-main-all .previews .grid .welll>.row>div{
            width: 100%;
        }
        .right-main-all .previews .grid .welll .preview{
            width: 100%;
            padding: 0;
        }
        .right-main-all .previews .grid .welll .title{
            padding: 10px;
            text-align: center;
            display: block;
        }
        .right-main-all .previews .grid .welll .buttons button:first-of-type{
            margin: 0;
        }
    </style>

@stop
