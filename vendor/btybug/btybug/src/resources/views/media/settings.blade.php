@extends('btybug::layouts.static_pages')
@section('content')

@stop
@section('menu')
    @include('btybug::_partials.front_user_menu',['items'=>[
    ['title'=>'Drive','url'=>'media/drive'],
    ['title'=>'Settings','url'=>'media/settings'],
    ],'active'=>'Settings'])
@stop
