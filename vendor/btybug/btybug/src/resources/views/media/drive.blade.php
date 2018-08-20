@extends('btybug::layouts.static_pages')
@section('content')
    @include('media::_partials.drive')
@stop
@section('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.5/require.min.js" data-main="{!! url('public/elFinder/main.default.js') !!}"></script>
    <script src="{!! url('public/elFinder/elfinder.js') !!}"></script>
@stop
