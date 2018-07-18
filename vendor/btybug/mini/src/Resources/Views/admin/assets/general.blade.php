@extends('btybug::layouts.mTabs',['index'=>'mini_assets'])
@section('tab')
    <div class="row">
        <form class="form-horizontal" id="create-page-form">
            <div class="form-group">
                <div class="col-xs-8">
                    <div class="input-group">
                        {!! BBbutton2('unit','header','frontend_header','Select Default Header') !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-8">
                    <div class="input-group">
                        {!! BBbutton2('layouts','layout','front_pages_layout','Select Default Layout') !!}
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xs-offset-4 col-xs-8">
                    <button id="siteSubmit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>

    </div>
    @include('resources::assests.magicModal')
@stop
@section('JS')
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}
    @stop