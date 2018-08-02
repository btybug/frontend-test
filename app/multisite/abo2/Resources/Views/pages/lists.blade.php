@extends('mini::layouts.app')
@section('content')
    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="col-md-12 pull-right">
            {!! Form::open(['route' => "mini_page_create"]) !!}
            <div class="form-group">
                <div class="col-md-3">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
            {{ Form::button('<i class="fa fa-plus" aria-hidden="true"></i> New Page', array('type' => 'submit', 'class' => 'pull-right create_new_btn m-l-20')) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <article>
            <div class="bb-menu-container">
                <div class="col-md-8 col-md-offset-2 bb-menu-group-body">
                    <ol class="bb-menu-area">
                        {!! hierarchyMiniUserPagesListFull($pages) !!}
                    </ol>
                </div>
            </div>
        </article>
    </div>

    @include('btybug::_partials.delete_modal')
@stop

@section('css')
    {!! HTML::style('public/css/create_pages.css') !!}
    {!! HTML::style('public/css/tool-css.css?v=0.23') !!}
    {!! HTML::style('public/css/page.css?v=0.15') !!}
    {!! HTML::style('public/css/admin_pages.css') !!}

@stop


@section('js')
    {!! HTML::script('public/js/create_pages.js') !!}
    {!! HTML::script('public/js/admin_pages.js') !!}
    {!! HTML::script('public/js/menus.js') !!}
@stop