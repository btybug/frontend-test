<!-- ================== BEGIN BASE FOOTER JS ================== -->
@if($page->js_type == 'default')
    {!! dd(1) !!}
    {!! BBgetProfileAssets(false,'js','footerJs') !!}
@elseif($page->js_type == 'cms')
    {!! dd(2) !!}
    {!! BBgetProfileAssets($page->js_cms,'js','footerJs') !!}
@elseif($page->js_type == 'external')
    {!! dd(3) !!}
    {!! BBlinkAssets($page->js) !!}
@endif
<!-- ================== END FOOTER JS ================== -->

<!-- ================== BEGIN FOOTER PAGE LEVEL JS ================== -->
{!! getFooterJs() !!}
<!-- ================== END FOOTER PAGE LEVEL JS ================== -->