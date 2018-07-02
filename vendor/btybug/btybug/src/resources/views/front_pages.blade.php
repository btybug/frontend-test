@extends("btybug::layouts.frontend")
@section('contents')
    @if($page->header)
        {!! BBheader() !!}
    @endif
    {!! BBRenderFrontLayout($page) !!}
    @if($page->footer)
        {!! BBfooter() !!}
    @endif
@stop