@extends('btybug::layouts.admin')
@section('content')
    <div class="col-md-12">
        <h3>Edit {{ $model->name }} product</h3>
        {!! Form::model($product) !!}
        {!! Form::hidden('id',null) !!}
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row module_detail">
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <img src="{!! url('images/module.jpg') !!}" alt=""
                                 class="img-rounded img-responsive"/>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="module-title"> name: {!! Form::text('name',null) !!}</div>
                            <div class="module-title">
                                status: {!! Form::select('status',['0' => 'Inactive','1' => 'Active']) !!}</div>
                            <div class="module-desc">
                                {!! Form::textarea('description',null,['class' => 'form-control']) !!}
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 pull-right text-right m-t-20">
                            {{--@if(isset($module->have_setting) and $module->have_setting==1)--}}
                            <a href="#"
                               class="btn  btn-sm  m-b-5 p-l-20 p-r-20 width-150 text-left settings"><i
                                        class="fa fa-pencil f-s-14 m-r-10"></i> Settings</a>
                            {{--@endif--}}
                            <a href="#"
                               class="btn  btn-sm  m-b-5 p-l-20 p-r-20 width-150 text-left"><i
                                        class="fa fa-cogs f-s-14 m-r-10"></i>Explore</a>
                        </div>
                    </div>

                    <div class="row module_detail_link">
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 m-t-10 m-b-10">
                            {{ $model->token }}
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 module_author_detail m-t-10 m-b-10">
                            <div class="pull-left">
                                <i class="fa fa-bars f-s-15" aria-hidden="true"></i>
                                Version {{ $model->app->name }}
                            </div>
                            <div class="pull-right">
                                <i class="fa fa-user f-s-15" aria-hidden="true"></i>
                                {!! $model->user->username !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-3">
            <div class="panel panel-default custompanel m-t-20">
                <div class="panel-heading">General</div>
                <div class="panel-body">
                    {{ Form::submit('Save', array('class' => 'btn btn-info','style' => "width:100%;")) }}
                </div>
            </div>
        </div>

        <div class="m-t-15 col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#config_tab" aria-controls="config_tab" role="tab" data-toggle="tab">Config</a>
                </li>
                <li role="presentation" class="">
                    <a href="#permissions_tab" aria-controls="permissions_tab" role="tab"
                       data-toggle="tab">Permissions</a>
                </li>
                <li role="presentation">
                    <a href="#docs_tab" aria-controls="docs_tab" role="tab" data-toggle="tab">Documentation</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content m-t-15">
                <div role="tabpanel" class="tab-pane active" id="config_tab">
                    @if(\view::exists($model->app->config_tab))
                        @include($model->app->config_tab)
                    @endif
                </div>
                <div role="tabpanel" class="tab-pane" id="permissions_tab">

                </div>
                <div role="tabpanel" class="tab-pane" id="docs_tab">
                    @if(\view::exists($model->app->documantation_tab))
                        @include($model->app->documantation_tab)
                    @endif
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

@stop
@section('CSS')
    {!! HTML::style('public/css/new-store.css') !!}
@stop
@section('JS')
    <script>
        $(function () {
            $('body').on('click', '.enb-disb', function () {
                var namespace = $(this).attr('namespace');
                var action = $(this).attr('data-action');
                $.ajax({
                    url: '{!! route('on_off') !!}',
                    data: {
                        namespace: namespace,
                        action: action,
                        _token: $('input[name=_token]').val()
                    },
                    success: function (data) {
                        location.reload();
                    },
                    type: 'POST'
                });
            });
        })
    </script>
@stop