@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    <div class="row">
        {!! Form::open(['class'=>'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-xs-8">
                    <div class="input-group">
                        {!! BBbutton2('mini_unit','header','header','Select Default Header',['model'=>$header]) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-8">
                    <div class="input-group">
                        {!! BBbutton2('mini_layouts','layout','layout','Select Default Layout',['model'=>$layout]) !!}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-offset-4 col-xs-8">
                    <button id="siteSubmit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
       {!! Form::close() !!}

    </div>
    @include('resources::assests.magicModal')
@stop
@section('JS')
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}
    @stop