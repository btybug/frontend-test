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
                <div></div>
                <div>
                    <button type="button" class="btn btn-info show_form"><i class="fa fa-plus"></i></button>
                </div>
            </div>

            <div class="form-comp col-md-12 custom_hidden is_show">
                {!! Form::open(['url'=>route('save_style'),'method' => 'get']) !!}
                    <div class="col-md-7">
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Class Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="class_name" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="">Class Code</label>
                            </div>
                            <div class="col-md-8">
                                <textarea name="code" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <input type="hidden" name="type" value="{{ app('request')->input('type') }}">
                    <div class="col-md-5">
                        <button class="btn btn-lg btn-success pull-right">Save</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row layouts_row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                @include("framework::css._partials.left_menu")
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                @include("framework::css._partials.$slug")
            </div>
        </div>
    </div>
@stop
@section('CSS')
    {!! HTML::style('public/css/bty.css?v='.rand(1111,9999)) !!}
    {!! HTML::style('public/css/new-store.css') !!}
    {!! useDinamicStyle('images') !!}
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
