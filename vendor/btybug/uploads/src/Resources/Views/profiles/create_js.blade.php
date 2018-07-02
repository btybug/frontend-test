@extends('btybug::layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="col-md-12">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-form navbar-left">
                        @if($model && $model->structured_by)
                            {!! Form::hidden('name',@$model->name,['class' => 'profile-name']) !!}
                            {!! Form::hidden('id',@$model->id,['class' => 'profile-id']) !!}
                            <h5>{!! $model->name !!}</h5>
                        @else
                           {!! Form::text('name',@$model->name,['class' => 'form-control profile-name','placeholder' => 'Enter profile name ..']) !!}
                        @endif
                    </div>

                    <div class="navbar-form navbar-right">
                        <button type="submit" class="btn btn-default js-btn-save">Save</button>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Header JS
                        <button 
                            type="button" 
                            class="btn btn-xs btn-default pull-right js-add-assets ">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                        </button>
                    </h3>
                </div>
                <div class="panel-body connectedSortable" id="header-js">
                    @if($model && isset($model->files['headerJs']) && count($model->files['headerJs']))
                        @foreach($model->files['headerJs'] as $headerItem)
                            <li class="list-group-item added-item" data-name="https://buttons.github.io/buttons.js"
                                data-type="{{ $headerItem['type'] }}" data-link="{{ $headerItem['path'] }}" data-id="{{ $headerItem['id'] }}">
                                {{ (($headerItem['type'] != 'unit') ? BBgetVersion($headerItem['id']) : get_filename_from_path($headerItem['path'],DS)) }} (asset: {{ $headerItem['type'] }})
                                <button class="btn btn-xs btn-default pull-right glyphicon glyphicon-trash" type="button"></button>
                            </li>
                        @endforeach
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading draggable">
                            <h4 class="panel-title">
                                @if($model)
                                    {!! $model->name !!}-profile.js
                                @else
                                   <span id="js-name-change">new</span>-profle.js
                                @endif
                                (Grouped file)
                            </h4>
                        </div>
                        <div class="panel-body">
                            <ul id="menus-list" class="connectedSortable">
                                @if(count($assets) && @$model->structured_by)
                                    @foreach($assets as $item)
                                        <li class="list-group-item auto-item" data-id="{{$item->id}}"
                                            data-name="{{ get_filename_from_path($item->path,DS) }}"
                                            data-link="{{ $item->path }}"
                                            data-type="unit">
                                            {{ get_filename_from_path($item->path,DS) }} (unit: {{ $item->page->slug }})

                                            <button type="button" class="btn btn-xs btn-danger pull-right">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </button>
                                        </li>
                                    @endforeach
                                @else
                                    @if($model && isset($model->files['frontHeaderJs']) && count($model->files['frontHeaderJs']))
                                        @foreach($model->files['frontHeaderJs'] as $frontHeaderJs)
                                            <li class="list-group-item added-item" data-name=""
                                                data-type="{{ $frontHeaderJs['type'] }}" data-link="{{ $frontHeaderJs['path'] }}" data-id="{{ $frontHeaderJs['id'] }}">
                                                {{ (($frontHeaderJs['type'] != 'unit') ? BBgetVersion($frontHeaderJs['id']) : get_filename_from_path($frontHeaderJs['path'],DS)) }} (asset: {{ $frontHeaderJs['type'] }})
                                                <button class="btn btn-xs btn-default pull-right glyphicon glyphicon-trash" type="button"></button>
                                            </li>
                                        @endforeach
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-md-12 m-t-15">
            <div class="panel panel-primary"js->
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Footer JS
                        <button 
                            type="button" 
                            class="btn btn-xs btn-default pull-right add-assets js-add-assets footer-js">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add
                        </button>
                    </h3>
                </div>
                <div class="panel-body connectedSortable" id="footer-js">
                    @if($model && isset($model->files['footerJs']) && count($model->files['footerJs']))
                        @foreach($model->files['footerJs'] as $footerItem)
                            <li class="list-group-item added-item" data-name=""
                                data-type="{{ $footerItem['type'] }}" data-link="{{ $footerItem['path'] }}" data-id="{{ $footerItem['id'] }}">
                                {{ (($footerItem['type'] != 'unit') ? BBgetVersion($footerItem['id']) : get_filename_from_path($footerItem['path'],DS)) }} (asset: {{ $footerItem['type'] }})
                                <button class="btn btn-xs btn-default pull-right glyphicon glyphicon-trash" type="button"></button>
                            </li>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-12 m-t-15">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Ignored Units Js
                    </h3>
                </div>
                <div class="panel-body connectedSortable" id="ignored-units-js">
                    @if($model && isset($model->files['ignoreUnitsJs']) && count($model->files['ignoreUnitsJs']))
                        @foreach($model->files['ignoreUnitsJs'] as $ignoreUnitsJs)
                            <li class="list-group-item added-item" data-name=""
                                data-type="{{ $ignoreUnitsJs['type'] }}" data-link="{{ $ignoreUnitsJs['path'] }}" data-id="{{ $ignoreUnitsJs['id'] }}">
                                {{ (($ignoreUnitsJs['type'] != 'unit') ? BBgetVersion($ignoreUnitsJs['id']) : get_filename_from_path($ignoreUnitsJs['path'],DS)) }} (asset: {{ $ignoreUnitsJs['type'] }})
                                <button class="btn btn-xs btn-default pull-right glyphicon glyphicon-trash" type="button"></button>
                            </li>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadAssets" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add assets</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'assetsForm']) !!}
                    <div class="form-group">
                        {!! Form::label('files','Files') !!}
                        <div class="script-box">
                            <div>
                                @if(count($mains))
                                    @foreach( $mains as $item)
                                        @if($item->path)
                                            <label class="checkbox-inline" data-path="{{ $item->path }}">
                                                {!! Form::checkbox('files[]',$item->id,null) !!} {{ $item->name }}
                                            </label>
                                        @else
                                            <label class="checkbox-inline">
                                                <a href="{!! route('uploads_assets_js') !!}">Broken assets</a> {{ $item->name }}
                                            </label>
                                        @endif

                                    @endforeach
                                @endif
                            </div>
                            @if(count($plugins))
                                @foreach( $plugins as $plugin)
                                    <label class="checkbox-inline" data-path="{{ $item->path }}">
                                        {!! Form::checkbox('files[]',$plugin->id,null) !!} {{ $plugin->name }}
                                    </label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary js-get-assets">Add asset</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <input type="hidden" id="script-box-url" value="{!! route('uploads_assets_profiles_get_assets') !!}">
@stop

@section('CSS')
    <style>
        #menus-list {
            min-height: 10px;
        }

        .list-group-item {
            margin-bottom: 5px;
            cursor: pointer;
            padding-left: 48px;
        }

        .list-group-item:before {
            content: "\e068";
            font-size: 19px;
            cursor: move;
            text-align: center;
            line-height: 43px;
            color: white;
            position: absolute;
            font-family: 'Glyphicons Halflings';
            left: -1px;
            top: -1px;
            width: 42px;
            height: 42px;
            background-color: #484848;
        }

        #uploadAssets .form-group > label {
            font-weight: bold !important;
        }

        .draggable {
            cursor: move;
        }

        .navbar.navbar-default{
            margin-top: 20px;
        }
    </style>
@stop

@section('JS')
    <script src="/public/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="/public/js/modules/profiles_edit.js"></script>
@stop