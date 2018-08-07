@extends("btybug::layouts.frontend")
@section('contents')
    {!! render_mini_unit('btybug_header.default',\Btybug\Mini\Model\MiniPainter::class) !!}
    {{--@if($page->header)--}}
        {{--@if($page->header_unit)--}}
            {{--{!! render_mini_unit($page->header_unit,\Btybug\Mini\Model\MiniPainter::class) !!}--}}
        {{--@else--}}
            {{--{!! BBheaderMini() !!}--}}
        {{--@endif--}}
    {{--@endif--}}
    {!! BBRenderMiniFrontLayout($page,\Btybug\Mini\Model\MiniLayouts::class) !!}

    @if($page->footer)
        {!! BBfooter() !!}
    @endif
@stop
