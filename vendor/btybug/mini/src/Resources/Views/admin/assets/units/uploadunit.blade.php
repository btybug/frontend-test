@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])

@section('tab')
            <div class="ui-2_col">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        @include('multisite::admin.assets.units._partials.sidebar')
                    </div>
                    @if(isset($message))
                        {{$message}}
                    @endif
                    <div class="col-md-6" style="margin-left: 10%">

                        {!! Form::open(['url'=>route('mini_admin_assets_units_add_upload'),'class'=>'dropzone', 'id'=>'my-awesome-dropzone']) !!}
                        {!! Form::hidden('data_type','files',['id'=>"dropzone_hiiden_data"]) !!}
                        {!! Form::close() !!}
                    </div>
                 </div>
            </div>

@stop
@section('CSS')
@stop
@section('JS')
    {!! HTML::script('public/js/dropzone/js/dropzone.js') !!}
    <script>
        Dropzone.options.myAwesomeDropzone = {
            init: function () {
                this.on("success", function (file) {
                    location.reload();

                });
            }
        };
    </script>
@stop