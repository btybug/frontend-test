@extends('btybug::layouts.admin')
@section('content')
    <div class="main_lay_cont">
        {{--<div class="row for_title_row">--}}
        {{--<h1 class="text-center">Components</h1>--}}
        {{--</div>--}}
        new page
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
    </style>
@stop
@section('JS')
    {!! HTML::script('public/js/bty.js?v='.rand(1111,9999)) !!}
@stop
