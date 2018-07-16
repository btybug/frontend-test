@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    {{-- {{$units}}--}}
    <div class="ui-2_col">
        <div class="row">
            <div class="col-md-3 col-xs-12">
                @include('multisite::admin.assets.units._partials.sidebar')
            </div>
            <div class="col-md-9 col-xs-12">
                @if($model)
                    <div class="display-area">
                        @include('multisite::admin.assets.units._partials.buttons')
                        <div class="right-iframe">
                            <div class="bb-form-header">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Form name</label>
                                        {!! Form::text('name',null,['class' => 'form-name', 'placeholder' => 'Form Name']) !!}
                                    </div>
                                    <div class="col-md-8">
                                        <button type="submit" class="form-save pull-right saveForm" bb-click="saveHTML">Save</button>
                                        <button type="button" class="panel-trigger pull-right" data-toggle="modal" data-target="#settingsModal">
                                            Settings
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @if(isset($editableData))
                                <textarea class="hidden" id="formJson">{!! $editableData !!}</textarea>
                            @endif
                            <div class="bb-form-sub-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Form description</label>
                                        {!! Form::textarea('description',null,['class' => 'form-description', 'placeholder' => 'Form Description']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="bb-form-header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="panel-trigger pull-right add-unit" bb-click="openFieldsWindow">Add fields</button>
                                        <button type="button" class="panel-trigger pull-right add-custom-filed" bb-click="openStudioWindow"
                                                data-main="global">Add custom filed
                                        </button>
                                        <button type="button" class="panel-trigger pull-right" bb-click="openLogicModal" data-toggle="modal"
                                                data-target="#logicModal">Logic
                                        </button>

                                        <button type="button" class="panel-trigger pull-right" bb-click="openLayoutWindow">Layout</button>
                                        <button type="button" class="panel-trigger pull-right" bb-click="openPanelWindow">Panel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid" style="margin-top: 60px;">
                                <!-- <div class="text-right" style="margin-bottom: 25px;">
                                  <button class="btn btn-primary add-unit"> Add unit</button>
                                  <button class="btn btn-primary saveForm"> Save</button>
                                </div> -->

                                <div class="row formBuilderShow">
                                    <div class="col-sm-12">
                                        <h3 class="text-center text-muted" style="display: none">The
                                            <a href="https://github.com/formio/formio.js" target="_blank">Form Builder</a> allows you to build a
                                            <select class="form-control" id="form-select" style="display: inline-block; width: 150px;">
                                                <option value="form">Form</option>
                                                <option value="wizard">Wizard</option>
                                                <option value="pdf">PDF</option>
                                            </select>
                                        </h3>
                                        <div class="well" style="background-color: #fdfdfd;">
                                            <div id="builder"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" style="display: none">
                                        <h3 class="text-center text-muted">as JSON Schema</h3>
                                        <div class="well jsonviewer">
                                            <pre id="json"></pre>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="display: none">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <h3 class="text-center text-muted">which
                                            <a href="https://github.com/formio/ngFormio" target="_blank">Renders as a Form</a> in your Application</h3>
                                        <div id="formio" class="well"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="row" style="display: none">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <h3 class="text-center text-muted">which creates a Submission JSON</h3>
                                        <div class="well jsonviewer">
                                            <pre id="subjson"></pre>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>







                            </div>
                        </div>
                    </div>
                    <div id="add-filed-modal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Confirmation</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to save changes you made to document before closing?</p>
                                    <p class="text-warning"><small>If you don't save, your changes will be lost.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
            </div>
        </div>
        @endif
    </div>
@stop

@section( 'Footer' )
    <div class="bb-node-action-size"></div>
    <div class="bb-node-action-menu">
        <i class="fa fa-arrows-h bb-node-move" bb-click="toggleResize"></i>
        <i class="fa fa-trash bb-node-delete" bb-click="deleteActiveField"></i>
        <i class="fa fa-paint-brush bb-node-edit" bb-click="openStudioWindow"></i>
    </div>
@stop

@section( 'CSS' )
    {!! HTML::style("public/css/formio/formio.full.min.css") !!}
    {!! HTML::style("public/css/formio/bootstrap.vertical-tabs.min.css") !!}
    {!! Html::style("public/css/form-builder/form-builder.css?m=m") !!}

    <style>
        .formcomponents {
            float: right;
            /* display: none; */
            transform: translateX(+100px);
            opacity: 0;
            transition: all cubic-bezier(0.68, -0.55, 0.265, 1.55) 0.4s
        }

        .displayToggle {
            transform: translateX(0);
            opacity: 1;

            /* display: block !important; */
        }

        .accordion panel-group {
            margin-top: 15px !important;
        }

        .panel-default {
            border-color: #fff;
        }

        .panel-default > .panel-heading {
            border-color: #fff;
            background: #e6e6e6;
        }

        .builder-group-button {
            background: none;
            color: #000
        }

        .formcomponents .formcomponent {
            padding: 15px 20px;
            background-color: #607d8b;
        }

        .ui-2_col {
            margin-top: 30px;
        }

        .ui-2_col .left-menu ul {
            border-right: 1px solid #c5c5c5;
            background-color: #3e81a5;
            padding-top: 20px !important;
            height: calc(100vh - 154px);
            overflow-x: auto;
        }

        .ui-2_col .left-menu li {
            background: #0000004f;
            width: 95%;
            height: 60px;
            margin-bottom: 11px;
            box-shadow: -4px 4px 5px 0 #00000073;
            margin-left: 11px;
            cursor: pointer;
            color: white;
            display: flex;
            justify-content: space-between;
            transition: 0.5s ease;
        }

        .ui-2_col .left-menu li > a {
            align-self: center;
            margin-left: 10px;
            font-size: 16px;
            color: white;
            text-decoration: none;
        }

        .ui-2_col .left-menu li.active {
            background: rgba(0, 0, 0, 0.48);
        }

        .ui-2_col .left-menu .button {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .ui-2_col .left-menu .button button {
            margin-right: 5px;
        }

        .ui-2_col .left-menu li:hover {
            background: rgba(0, 0, 0, 0.48);
        }
    </style>
@stop


@section( 'JS' )
    {!! HTML::script("public/js/formio/buttons.js") !!}
    {!! HTML::script("public/js/formio/formio.full.min.js") !!}
    {!! HTML::script("public/js/formio/config.js?v=".rand(999,9999)) !!}
@stop
