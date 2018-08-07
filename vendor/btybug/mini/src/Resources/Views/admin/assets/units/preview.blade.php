@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    {{-- {{$units}}--}}
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                @include('multisite::admin.assets.units._partials.sidebar')
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
                                    <a href="{{route('mini_admin_delete_units',$model->id)}}">
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="image">
                                                <img src="http://factinteres.ru/wp-content/uploads/2016/09/IMG-Worlds-of-Adventure-1-945x776.jpg"
                                                     alt="">
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
                                                            {{dd($tags)}}
                                                        </p>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="publish">
                                                <div class="head">
                                                    Publish To
                                                </div>

                                                <div class="publish-check">
                                                    @foreach($memberships as $value)
                                                            <div class="checkbox-publish">
                                                                <input type="radio" id="{{$value}}" class="onChange" name="membership" value="{{$value}}"
                                                                        @if($model->memberships === $value)
                                                                        checked
                                                                        @endif
                                                                >
                                                                <label for="{{$value}}">{{$value}}</label>
                                                            </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit-ajax hidden"></button>
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
                                <div class="col-sm-12">
                                    <div class="welll">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="preview">
                                                    <div class="left-iframe">
                                                        <iframe class="unit_preview" data-slug="{{$model->slug}}"
                                                                src="{{url('admin/mini/assets/units/render/'.$model->slug.'.default')}}"
                                                                width="100%" style="min-height: 500px;">

                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="title">
                                                    Default
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <div class="buttons">
                                                    <button class="btn btn-md btn-warning">Edit</button>
                                                    <button class="btn btn-md btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="welll">
                                        <div class="row">
                                            <div class="col-md-4 col-xs-12">
                                                <div class="preview">
                                                    <img src="http://factinteres.ru/wp-content/uploads/2016/09/IMG-Worlds-of-Adventure-1-945x776.jpg"
                                                         alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <div class="title">
                                                    Variation 2
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <div class="buttons">
                                                    <button class="btn btn-md btn-warning">Edit</button>
                                                    <button class="btn btn-md btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
    @include('multisite::admin.assets.units._partials.previewModal')
    <input type="hidden" id="iframle-url" value="{!! url('admin/mini/assets/units/render/') !!}">
    <input type="hidden" id="live-preview-url" value="{!! route('mini_admin_assets_units_live') !!}">

@stop
@section("JS")
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

            $(".memberships-select").select2();


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
                            console.log(data);
                            return data;
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
            $('#layout-variations').on('change', function () {
                let ifUrl = $('#iframle-url').val() + '/' + $(this).val();
                let livUrl = $('#live-preview-url').val() + '/' + $(this).val();
                $('iframe.unit_preview').attr('src', ifUrl);
                $('#live-preview').attr('href', livUrl);
            });
        });
    </script>
    <script>
                $(document).ready(function () {
                    $('.onChange').on('change',function (e) {
                        e.preventDefault();
                        $(".btn-submit-ajax").click();
                    })
                });

                $(".btn-submit-ajax").click(function(e) {
                    e.preventDefault();
                    var form = $('#form');
                    var url = form.attr('action');

                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        headers: {
                            'X-CSRF-TOKEN': $("input[name='_token']").val()
                        },
                        success: function(data)
                        {

                        }
                    });
                });
    </script>
@stop

@section('CSS')
    {!! HTML::style('public/css/jquery.tagit.css') !!}
    {!! HTML::style("public/css/select2/select2.min.css") !!}

    <style>
        .right_sect {
            border-left: 6px solid lightgrey;
            height: 200px;
            margin-left: 650px;
        }

        .ui-2_col {
            margin-top: 30px;
        }

        .ui-2_col .left-menu ul {
            border-right: 1px solid #c5c5c5;
            background-color: #3e81a5;
            padding-top: 20px !important;
            height: calc(100vh - 154px);
            overflow-x: auto;
        }

        .ui-2_col .left-menu li {
            background: #0000004f;
            width: 95%;
            height: 60px;
            margin-bottom: 11px;
            box-shadow: -4px 4px 5px 0 #00000073;
            margin-left: 11px;
            cursor: pointer;
            color: white;
            display: flex;
            justify-content: space-between;
            transition: 0.5s ease;
        }

        .ui-2_col .left-menu li > a {
            align-self: center;
            margin-left: 10px;
            font-size: 16px;
            color: white;
            text-decoration: none;
        }

        .ui-2_col .left-menu li.active {
            background: rgba(0, 0, 0, 0.48);
        }

        .ui-2_col .left-menu .button {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .ui-2_col .left-menu .button button {
            margin-right: 5px;
        }

        .ui-2_col .left-menu li:hover {
            background: rgba(0, 0, 0, 0.48);
        }

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

        .right-main-all .profile > .content {
            background-color: whitesmoke;
        }

        .right-main-all .profile > .content > .row {
            display: flex;
        }

        .right-main-all .profile > .content .image {
            padding: 15px;
            padding-right: 0;

        }

        .right-main-all .profile > .content img {
            width: 100%;
            border: 2px solid #000000;
            object-fit: cover;
            height: 100%;
        }

        .right-main-all .profile > .content .info {
            height: 100%;
            display: flex;
            flex-direction: column;
            padding-top: 13px;
        }

        .right-main-all .profile > .content .info p span {
            font-weight: bold;
            margin-right: 7px;
        }

        .right-main-all .profile > .content .info > div:last-of-type {
            margin-top: auto;
        }

        .right-main-all .profile > .content .publish {
            height: 100%;
            background-color: #a0d8f7;
            border-left: 2px solid #000000;
            padding: 15px;
        }

        .right-main-all .profile > .content .publish .head {
            background-color: #f0ad4e;
            color: black;
            padding: 5px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .right-main-all .profile > .content .publish .publish-check input[type="radio"] {
            display: none;
            cursor: pointer;
        }

        .right-main-all .profile > .content .publish .publish-check input[type="radio"]:focus,
        .right-main-all .profile > .content .publish .publish-check input[type="radio"]:active {
            outline: none;
        }

        .right-main-all .profile > .content .publish .publish-check label {
            cursor: pointer;
            display: inline-block;
            position: relative;
            padding-left: 25px;
            margin-right: 10px;
            color: #0b4c6a;
            font-weight: bold !important;
        }

        .right-main-all .profile > .content .publish .publish-check label:before,
        .right-main-all .profile > .content .publish .publish-check label:after {
            content: '';
            display: inline-block;
            width: 18px;
            height: 18px;
            left: 0;
            bottom: 0;
            text-align: center;
            position: absolute;
        }

        .right-main-all .profile > .content .publish .publish-check label:before {
            background-color: #fafafa;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .right-main-all .profile > .content .publish .publish-check label:after {
            color: #fff;
        }

        .right-main-all .profile > .content .publish .publish-check input[type="radio"]:checked + label:before {
            -moz-box-shadow: inset 0 0 0 10px #f0ad4e;
            -webkit-box-shadow: inset 0 0 0 10px #f0ad4e;
            box-shadow: inset 0 0 0 10px #f0ad4e;
        }

        .right-main-all .profile > .content .publish .publish-check label:before {
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
        }

        .right-main-all .profile > .content .publish .publish-check label:hover:after, .right-main-all .profile > .content .publish .publish-check input[type="radio"]:checked + label:after {
            content: "\2713";
            line-height: 18px;
            font-size: 14px;
        }

        .right-main-all .profile > .content .publish .publish-check label:hover:after {
            color: #c7c7c7;
        }

        .right-main-all .profile > .content .publish .publish-check input[type="radio"]:checked + label:after, .right-main-all .profile > .content .publish .publish-check input[type="radio"]:checked + label:hover:after {
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



{{--
public function iframeRander($slug){
return BBRenderUnits($slug);
}--}}
