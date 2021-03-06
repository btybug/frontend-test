@extends("btybug::layouts.frontend")
@section('contents')

    @if($page->header)
        @if($page->header_unit)
            {!! render_mini_unit($page->header_unit,\Btybug\Mini\Model\MiniPainter::class) !!}
        @else
            {!! BBheaderMini() !!}
        @endif
    @endif
    {!! BBRenderMiniFrontLayout($page,\Btybug\Mini\Model\MiniLayouts::class) !!}

    {!! render_mini_unit('btybug_unit_navbar_footer.default',\Btybug\btybug\Models\Painter\Painter::class) !!}
    {{--@if($page->footer)--}}
        {{--{!! BBfooter() !!}--}}
    {{--@endif--}}
@stop
