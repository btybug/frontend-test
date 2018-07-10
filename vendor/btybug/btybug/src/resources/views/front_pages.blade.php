@extends("btybug::layouts.frontend")
@section('contents')
    @if($page->header)
        @if($page->header_unit)
            {!! BBRenderUnits($page->header_unit) !!}
        @else
            {!! BBheader() !!}
        @endif
    @endif
    {!! BBRenderFrontLayout($page) !!}
    @if($page->footer)
        {!! BBfooter() !!}
    @endif
@stop
