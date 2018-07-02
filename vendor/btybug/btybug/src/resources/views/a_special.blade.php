@extends('btybug::layouts.a_special')
@section('content')
@php
    if(!isset($page)){
        $page = \Btybug\btybug\Services\RenderService::getFrontPageByURL();
    }
@endphp
    @if($page->content_type == 'template')
        {!! BBRenderUnits($page->template) !!}
    @else
        @if(\File::exists($page->main_content))
           @php
               echo file_get_contents(base_path($page->main_content));
           @endphp
        @endif
    @endif
@stop
