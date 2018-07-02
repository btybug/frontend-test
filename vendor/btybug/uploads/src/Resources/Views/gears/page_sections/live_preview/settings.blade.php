@extends('btybug::layouts.sections')
@section('content')

    <div class="center-block" id="widget_container">
        {!! $html !!}
    </div>
    <textarea type="hidden" class="hide" id="hidden_data" hidden>{!! $json !!}</textarea>

    <input type="hidden" id="layout_slug" value="{!! $model->slug !!}">
    <input type="hidden" id="layout_variation" value="{!! @$variation->id  !!}">
    <div id="output-content" style="display: none"></div>
@stop

@section('settings')
    <div class="settings-bottom ">
        <div class="head">
            <span id="current-node-text">SELECT ELEMENT</span>

            <a href="#" class="float-right closeCSSEditor"><i class="fa fa-arrow-down"></i></a>
        </div>
        <div class="content animated bounceInRight hide" data-settinglive="settings">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-3">
                        <div class="left">
                            <ul id="placeholders-render-list-main-box-bty">
                                @isset($model->placeholders)
                                    @foreach($model->placeholders as $key => $placeholder)
                                        <li>
                                            <div class="pl-item action-placeholder" data-key="{{ $key }}"
                                                 @if(isset($placeholder['f']))
                                                 @if($usedIn && isset($placeholder['main']))
                                                 @if($usedIn->type == 'custom')
                                                 data-type="f"
                                                 @elseif(isset($placeholder['s']))
                                                 data-type="s"
                                                 @endif
                                                 @else
                                                 data-type="f"
                                                 @endif
                                                 @elseif(isset($placeholder['s']))
                                                 data-type="s"
                                                    @endif
                                            >
                                                <span class="left-li">{{ $placeholder['title'] }} </span>
                                                <div class="button">
                                                    @isset($placeholder['f'])
                                                        @if($usedIn && isset($placeholder['main']))
                                                            @if($usedIn->type == 'custom')
                                                                <a href="javascript:void(0)" data-key="{{ $key }}"
                                                                   data-type="f"
                                                                   class="btn btn-sm btn-warning action-placeholder">F</a>
                                                            @endif
                                                        @else
                                                            <a href="javascript:void(0)" data-key="{{ $key }}"
                                                               data-type="f"
                                                               class="btn btn-sm btn-warning action-placeholder">F</a>
                                                        @endif
                                                    @endisset

                                                    @isset($placeholder['s'])
                                                        <a href="javascript:void(0)" data-key="{{ $key }}" data-type="s"
                                                           class="btn btn-sm btn-info action-placeholder">S</a>
                                                    @endisset
                                                </div>

                                            </div>
                                        </li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-9">
                        <img src="{!! url('/public/images/loader.gif') !!}" style="position: relative;left: 40%;width: 100px;top: 70px;" id="loader-img" class="hide" />
                        <div class="right" id="right-settings-main-box-bty">
                            {!! Form::model($model,['id'=>'add_custome_page']) !!}
                                <h3 id="main-box-title"></h3>
                                @include($settingsHtml)
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{!! route('uploads_settings_options') !!}" id="options-url">
@stop
@section('CSS')
    {!! HTML::style("https://jqueryvalidation.org/files/demo/site-demos.css") !!}
    {!! HTML::style('public/css/preview-template.css') !!}
    {!! HTML::style('public/js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}
    <style>
        .settings-bottom {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.76);
            /*height: 220px;*/
            color: white;
            z-index: 999;
        }

        .settings-bottom .head {
            display: flex;
            justify-content: space-between;
            padding: 15px;
            color: white;
            background-color: #090909;
            cursor: n-resize;
        }

        .settings-bottom .head a {
            color: white;
        }

        .settings-bottom .content .left, .settings-bottom .content .right {
            overflow-x: auto;
            height: 170px;
            padding: 10px;
        }

        .settings-bottom .content {
            height: 170px;
        }

        .settings-bottom .content.hide {
            height: 0;
            overflow: hidden;
        }

        .settings-bottom .content .left::-webkit-scrollbar-track, .settings-bottom .content .right::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        .settings-bottom .content .left::-webkit-scrollbar, .settings-bottom .content .right::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }

        .settings-bottom .content .left::-webkit-scrollbar-thumb, .settings-bottom .content .right::-webkit-scrollbar-thumb {
            background-color: #000000;
        }

        .settings-bottom .content > .container-fluid > .row > [class*="col-"] {
            padding: 0;
        }

        .settings-bottom .content .left ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .settings-bottom .content .left ul li > div {
            background-color: #090909;
            border: 1px solid #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
            cursor: pointer;
            -webkit-transition: 0.5s ease;
            -moz-transition: 0.5s ease;
            -ms-transition: 0.5s ease;
            -o-transition: 0.5s ease;
            transition: 0.5s ease;
        }

        .settings-bottom .content .left ul li > div:hover, .pl-item.hover-cl {
            background-color: #fff !important;
            color: black;
        }

        .closeCSSEditor.top-show i {
            transform: rotate(180deg);
        }

        .settings-bottom .content > .container-fluid, .settings-bottom .content > .container-fluid > .row, .settings-bottom .content > .container-fluid > .row > [class*="col-"],
        .settings-bottom .content > .container-fluid > .row > [class*="col-"] > div {
            height: 100%;
        }

    </style>
    @yield('CSS')
    @stack('css')
@stop
@section('JS')
    {!! HTML::script("public/js/UiElements/bb_styles.js?v=".rand(999,9999)) !!}
    {!! HTML::script("public/js/UiElements/bb_div.js") !!}
    {!! HTML::script("public/js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js") !!}
    {!! HTML::script("public/js/jquery-ui/jquery-ui.js") !!}
    {!! HTML::script("https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js") !!}
    {!! HTML::script("https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js") !!}


    {!! HTML::script('public/js/UiElements/content-layout-settings.js?v='.rand(1111,9999)) !!}
    <script>
        $(document).ready(function () {
            $('.closeCSSEditor').on('click', function () {
                if ($(this).closest('.head').next().hasClass("hide")) {
                    $(this).closest('.head').next().removeClass('hide');
                    $(this).removeClass('top-show')
                } else {
                    $(this).closest('.head').next().addClass('hide');
                    $(this).addClass('top-show')
                }

            });

            $('.settings-bottom').draggable({
                cursor: 'n-resize',
                axis: 'y',
               // containment: 'body',
                start: function () {
                    $(this).css({"height" : "auto","top" : "auto"});

                    $(this).find('.content').height('calc(100% - 50px)');
                    $(this).find('.content').removeClass('hide');
                    $(this).find('.closeCSSEditor').on('click', function () {
                        $(this).closest('.settings-bottom').attr('style', '');
                    })

                },
                stop: function () {
                    $(this).find('.content').height('calc(100% - 50px)');
                    $(this).find('.content').removeClass('hide');
                    if($(this).height() <= 50){
                        $(this).css({"height" : "50px","top" : "auto"});
                        $('[data-settinglive="settings"]').addClass('hide');
                    }
                }
            });
        });
    </script>
@stop
