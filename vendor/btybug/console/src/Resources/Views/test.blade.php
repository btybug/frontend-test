@extends('btybug::layouts.admin')
@section('content')
    <form class="form-horizontal">
        <fieldset>
            <!-- Form Name -->
            <legend>Form Name</legend>
            <!-- Text input-->
            <div class="form-group">
                <div class="col-md-4">
                    {!! BBbutton2('unit','field_input','field_input','Select Header',['class' => 'form-control input-md btn-info','data-type' => 'header','model'=>'field_input.default'],['validation']) !!}
                </div>
            </div>
        </fieldset>
    </form>
    @include('resources::assests.magicModal')
@stop
@section('JS')
    {!! HTML::script("public/js/UiElements/bb_styles.js?v.5") !!}

@stop