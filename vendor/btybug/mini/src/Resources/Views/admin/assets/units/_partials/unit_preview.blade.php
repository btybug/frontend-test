<head>
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
        {!! BBgetProfileAssets(false,'css','headerCss') !!}
        {!! BBCss()  !!}
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
        {!! getCss() !!}
    <!-- ================== END PAGE LEVEL CSS STYLE ================== -->



<!-- ================== BEGIN BASE JS ================== -->
    {!! BBgetProfileAssets(false) !!}
    {!!  BBJs() !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    {!! getHeaderJs() !!}
<!-- ================== END PAGE LEVEL JS ================== -->

    {!! HTML::style('public/css/cms.css') !!}
    {!! HTML::style("public/css/bty.css?v=".rand('1111','9999')) !!}
    {!! getCss() !!}
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
</head>

<body>
<input type="hidden" id="unit_slug" value="{!! $ui->slug !!}">
<input type="hidden" id="unit_variation" value="{!! $id  !!}">
{!! csrf_field() !!}
@include('resources::assests.magicModal')
<div class="container-fluid">
    <div class="body_ui previewcontent activeprevew" data-settinglive="content"
         id="widget_container">
        {!! $htmlBody !!}
    </div>
</div>
{{--<div class="Settings_ui coresetting hide animated bounceInRight" data-settinglive="settings">--}}
{{--<div class="container-fluid">--}}
{{--<a href="#" class="btn btn-danger close-settings-panel"><i class="fa fa-close"></i></a>--}}
{{--{!! Form::model($settings,['url'=>'/admin/uploads/gears/settings/'.$id, 'id'=>'add_custome_page','files'=>true]) !!}--}}
{{--<input name="itemname" type="hidden" data-parentitemname="itemname"/>--}}
{{--{!! $htmlSettings !!}--}}
{{--{!! Form::close() !!}--}}
{{--</div>--}}
{{--</div>--}}

<div class="settings-bottom ">
    <div class="head">
        <span id="current-node-text">SELECT ELEMENT</span>
        <a href="#" class="float-right closeCSSEditor"><i class="fa fa-arrow-down"></i></a>
    </div>
    <div class="content animated bounceInRight hide" data-settinglive="settings">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="left">
                        <ul id="placeholders-render-list-main-box-bty">
                            @isset($ui->placeholders)
                                @foreach($ui->placeholders as $key => $placeholder)
                                    <li>
                                        <div class="pl-item action-placeholder" data-key="{{ $key }}"
                                             @if(isset($placeholder['f']))
                                             data-type="f"
                                             @elseif(isset($placeholder['s']))
                                             data-type="s"
                                                @endif
                                        >
                                            <span class="left-li">{{ $placeholder['title'] }} </span>
                                            <div class="button">
                                                @isset($placeholder['f'])
                                                    <a href="javascript:void(0)" data-key="{{ $key }}"
                                                       data-type="f"
                                                       class="btn btn-sm btn-warning action-placeholder">F</a>
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
                <div class="col-md-9">
                    <div class="right" id="right-settings-main-box-bty">
                        @include("multisite::admin.assets.units._partials.right_box")
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! BBextraHtml() !!}

<button data-settingaction="save" class="hide" id="settings_savebtn"></button>
<input type="hidden" id="hidden_data" value='{!!$settings_json!!}'>

<!-- ================== BEGIN BASE FOOTER JS ================== -->
    {!! BBgetProfileAssets(false,'js','footerJs') !!}
<!-- ================== END FOOTER JS ================== -->

<!-- ================== BEGIN FOOTER PAGE LEVEL JS ================== -->
{!! getFooterJs() !!}
<!-- ================== END FOOTER PAGE LEVEL JS ================== -->
{!! HTML::script("public/js/UiElements/bb_styles.js?v=".rand('1111','9999')) !!}
{!! HTML::script("public/js/UiElements/ui-preview-setting.js?v=".rand('1111','9999')) !!}
{!! HTML::script("public/js/UiElements/ui-settings.js?v=".rand('1111','9999')) !!}
{!! getFooterJs() !!}
<script>
    $(document).ready(function () {
        $('.closeCSSEditor').on('click', function () {
            if ($(this).closest('.head').next().hasClass("d-none")) {
                $(this).closest('.head').next().removeClass('d-none');
                $(this).removeClass('top-show')
            } else {
                $(this).closest('.head').next().addClass('d-none');
                $(this).addClass('top-show')
            }
        });
        $('.settings-bottom').draggable({
            cursor: 'n-resize',
            axis: 'y',
//                containment: 'body',
            start: function () {
                $(this).find('.content').height('calc(100% - 50px)');
                $(this).find('.content').removeClass('d-none');
                $(this).find('.closeCSSEditor').on('click', function () {
                    $(this).closest('.settings-bottom').attr('style', '');
                })
            },
            stop: function () {
                $(this).find('.content').height('calc(100% - 50px)');
                $(this).find('.content').removeClass('d-none');
            }
        });
    });
</script>
{!! BBscriptsHook() !!}
</body>
