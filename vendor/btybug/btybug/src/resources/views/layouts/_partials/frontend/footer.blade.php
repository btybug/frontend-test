@section('footer')
    @if($page->user_navbar)
        {!! render_mini_unit('btybug_unit_navbar_footer.default',\Btybug\btybug\Models\Painter\Painter::class) !!}
    @endif
<!-- ================== BEGIN BASE FOOTER JS ================== -->

@if($page->js_type == 'default')
    {!! BBgetProfileAssets(false,'js','footerJs') !!}
@elseif($page->js_type == 'cms')
    {!! BBgetProfileAssets($page->js_cms,'js','footerJs') !!}
@elseif($page->js_type == 'external')
    {!! BBlinkAssets($page->js) !!}
@endif
<!-- ================== END FOOTER JS ================== -->

<!-- ================== BEGIN FOOTER PAGE LEVEL JS ================== -->
{!! getFooterJs() !!}
<!-- ================== END FOOTER PAGE LEVEL JS ================== -->
    @stop