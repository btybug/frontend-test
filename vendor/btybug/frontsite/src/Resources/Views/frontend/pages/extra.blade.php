@extends('btybug::layouts.mTabs',['index'=>'page_edit'])
@section('tab')
Extra

@stop

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


    </style>
@stop
@section('JS')
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script('public/js/page-setting.js') !!}
    {!! HTML::script("public/js/UiElements/ui-preview-setting.js") !!}
    {!! HTML::script("public/js/UiElements/ui-settings.js") !!}
    {!! HTML::script("public/js/UiElements/bb_div.js") !!}
    {!! HTML::script('public/js/tinymice/tinymce.min.js') !!}
    {!! HTML::script("public/js/select2/select2.full.min.js") !!}

    <script>

    </script>

@stop