@extends('btybug::layouts.mTabs',['index'=>'page_special_edit'])
@section('tab')
    @if($page->form_path)
        @include($page->form_path)
    @else
        @include('manage::frontend.pages._partials.special-page-data')
    @endif
@stop