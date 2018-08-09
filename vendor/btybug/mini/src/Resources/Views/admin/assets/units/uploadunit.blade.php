@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])

@section('tab')
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
            <div class="ui-2_col">
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        @include('multisite::admin.assets.units._partials.sidebar')
                    </div>
                    @if(isset($message))
                        {{$message}}
                    @endif
                    <div class="col-md-6" style="margin-left: 10%">
                        <form method="get" action="{{route('mini_admin_assets_units_add_upload')}}" enctype="multipart/form-data" id="form">
                            <div class="form-group files color">
                                <label>Upload Unit File </label>
                                <input type="file" class="form-control" name="zip" >
                            </div>
                            <button type="submit" class="btn btn-success btn-lg btn-block">Upload</button>
                        </form>
                    </div>
                 </div>
            </div>

@stop
@section('CSS')
    <style>

        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }
        .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
        }
        .files{ position:relative}
        .files:after {  pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .color input{ background-color:#f1f1f1;}
        .files:before {
            position: absolute;
            bottom: 10px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: " or drag it here. ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }
    </style>
@stop