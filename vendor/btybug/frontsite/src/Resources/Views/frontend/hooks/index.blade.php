@extends('btybug::layouts.mTabs',['index'=>'frontend_manage'])
@section('tab')
    <div role="tabpanel" class="m-t-10" id="main">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main_container_11">
            <table class="table table-bordered" id="tpl-table">
                <thead>
                <tr class="bg-black-darker text-white">
                    <th>Name</th>
                    <th>Tag</th>
                    <th>Slug</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Helper text</th>
                    <th>Created date</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                @if(count($hooks))
                    @foreach($hooks as $hook)
                        <tr>
                            <th>{{ $hook->name }}</th>
                            <th>{{ $hook->tag }}</th>
                            <th>{{ $hook->slug }}</th>
                            <th>{{ BBGetUser($hook->author_id) }}</th>
                            <th>{{ $hook->type }}</th>
                            <th>{{ $hook->help_text }}</th>
                            <th>{{ BBgetDateFormat($hook->created_at) }}</th>
                            <th>
                                <a href="{!! route("frontsite_hooks_edit",$hook->id) !!}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <a href="{!! route("frontsite_hooks_remove",$hook->id) !!}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            </th>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th  colspan="8" class="text-center">
                            No Hooks
                        </th>
                    </tr>
                @endif
                </tbody>
            </table>
            <a href="{{route('frontsite_hooks_create')}}" class="btn btn-primary pull-right">Add new</a>
        </div>
    </div>
    @include('resources::assests.magicModal')
@stop
@section('CSS')
    {!! HTML::style('public/css/menu.css?v=0.16') !!}
    {!! HTML::style('public/css/admin_pages.css') !!}
    {!! HTML::style('public/css/tool-css.css?v=0.23') !!}
    {!! HTML::style('public/css/page.css?v=0.15') !!}
    <style>
        #tpl-table .btn-danger{
            border-radius: 4px;
        }
    </style>
@stop


@section('JS')
    {!! HTML::script("/public/js/UiElements/bb_styles.js?v.5") !!}
    {!! HTML::script('public/js/admin_pages.js') !!}
    {!! HTML::script('public/js/nestedSortable/jquery.mjs.nestedSortable.js') !!}
    {!! HTML::script('public/js/bootbox/js/bootbox.min.js') !!}
    {!! HTML::script('public/js/icon-plugin.js?v=0.4') !!}
@stop
