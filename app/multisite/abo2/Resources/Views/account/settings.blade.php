@extends('mini::layouts.app',['index'=>'mini_my_account_settings'])
@section('tab')
    <div class="bb-form-header" style="display: none">
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
    @if(isset($form))
        <textarea class="hidden" style="display: none" id="formJson">{!! $form !!}</textarea>
    @endif
    <div class="bb-form-sub-header" style="display: none">
        <div class="row">
            <div class="col-md-12">
                <label>Form description</label>
                {!! Form::textarea('description',null,['class' => 'form-description', 'placeholder' => 'Form Description']) !!}
            </div>
        </div>
    </div>
    <div class="bb-form-header" style="display: none">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="panel-trigger pull-right add-unit" bb-click="openFieldsWindow">Add fields</button>
                <button type="button" class="panel-trigger pull-right add-custom-filed" bb-click="openStudioWindow"
                        data-main="global">Styling
                </button>
                <button type="button" class="panel-trigger pull-right" bb-click="openLogicModal" data-toggle="modal"
                        data-target="#logicModal">Logic
                </button>

                <button type="button" class="panel-trigger pull-right" bb-click="openLayoutWindow">Layout</button>
                <button type="button" class="panel-trigger pull-right" bb-click="openPanelWindow">Panel</button>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 60px;" style="display: none">
        <!-- <div class="text-right" style="margin-bottom: 25px;">
          <button class="btn btn-primary add-unit"> Add unit</button>
          <button class="btn btn-primary saveForm"> Save</button>
        </div> -->

        <div class="row formBuilderShow" style="display: none">
            <div class="col-sm-12">
                <h3 class="text-center text-muted" style="display: none">The
                    <a href="https://github.com/formio/formio.js" target="_blank">Form Builder</a> allows you to build a
                    <select class="form-control" id="form-select" style="display: inline-block; width: 150px;">
                        <option value="form">Form</option>
                        <option value="wizard">Wizard</option>
                        <option value="pdf">PDF</option>
                    </select>
                </h3>
                <div class="well" style="background-color: #fdfdfd; display: none">
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
        <div class="row" >
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="text-center text-muted">which
                    Rendered a Form in your Application</h3>
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
@stop

    <div class="bb-node-action-size"></div>
    <div class="bb-node-action-menu">
        <i class="fa fa-arrows-h bb-node-move" bb-click="toggleResize"></i>
        <i class="fa fa-trash bb-node-delete" bb-click="deleteActiveField"></i>
        <i class="fa fa-paint-brush bb-node-edit" bb-click="openStudioWindow"></i>
    </div>

@section( 'css' )
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

        .panel-default>.panel-heading {
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
    </style>
@stop


@section( 'js' )
    {!! HTML::script("public/js/formio/buttons.js") !!}
    {!! HTML::script("public/js/formio/formio.full.min.js") !!}
    {!! HTML::script("public/js/formio/config.js?v=".rand(999,9999)) !!}
@stop