@extends('mini::layouts.app')
@php
    $title = 'Plugins';
@endphp
@section('tab')
    <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <div class="col-md-12 pull-right">
            {!! Form::open(['url'=>'#']) !!}
            <div class="form-group">
                <div class="col-md-3">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::button('<i class="fa fa-plus" aria-hidden="true"></i>Add Plugin', array('type' => 'button', 'class' => 'pull-right create_new_btn m-l-20')) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <article class="mt-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="my-account-left-col">
                        <div class="bb-menu-container">
                            <div class="bb-menu-group-body">
                                <ul class="bb-menu-area ui-sortable">
                                    <li class="Item show-page ui-sortable-handle" data-id="157" id="157"
                                        data-type="core">
                                        <div class="listinginfo bb-menu-item">
                                            <div class="lsitingbutton bb-menu-item-title"
                                                 style="background: #00c7e0;  !important"><span class="listingtitle">Plugin 1</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="Item show-page ui-sortable-handle" data-id="158" id="158"
                                        data-type="custom">
                                        <div class="listinginfo bb-menu-item">
                                            <div class="lsitingbutton bb-menu-item-title"
                                                 style="background: #36e0a0; !important"><span class="listingtitle">Plugin 2</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 view-box">
                    @include('mini::extra._partials.view')
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