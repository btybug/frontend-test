@extends('btybug::layouts.mTabs',['index'=>'structure_console'])
@section('tab')
    <div class="row m-b-10">
        <h3>Field Types</h3>

    </div>

    @include('resources::assests.magicModal')
    @include('btybug::_partials.delete_modal')
@stop
@section('CSS')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop
@section('JS')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

@stop