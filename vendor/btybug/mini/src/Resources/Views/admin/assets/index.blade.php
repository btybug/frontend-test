@extends('btybug::layouts.admin')
@section('content')
    <div class="main_lay_cont">
        <div class="row for_title_row">
            <h1 class="text-center">Assets control</h1>
        </div>
        <div class="row layouts_row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 items_links">
                <a href="{{route('mini_admin_assets_units')}}" class="ly_items">
                    <h3>Units</h3>
                    <h2><i class="fa fa-columns" aria-hidden="true"></i></h2>
                </a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 items_links">
                <a href="{{route('mini_admin_assets_forms')}}" class="ly_items">
                    <h3>Forms</h3>
                    <h2><i class="fa fa-bug" aria-hidden="true"></i></h2>
                </a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 items_links">
                <a href="{{route('mini_admin_assets_pages')}}" class="ly_items">
                    <h3>Pages</h3>
                    <h2><i class="fa fa-television" aria-hidden="true"></i></h2>
                </a>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 items_links">
                <a href="{{route('mini_admin_assets_plugins')}}" class="ly_items">
                    <h3>Plugins</h3>
                    <h2><i class="fa fa-bug" aria-hidden="true"></i></h2>
                </a>
            </div>
        </div>
    </div>
@stop
@section('CSS')
    {!! HTML::style('public/css/backend_layouts_style.css') !!}
@stop
@section('JS')
@stop