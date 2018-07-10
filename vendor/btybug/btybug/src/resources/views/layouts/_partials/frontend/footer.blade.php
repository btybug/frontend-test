<!-- ================== BEGIN BASE FOOTER JS ================== -->
@if($page->js_type == 'default')
    {!! BBgetProfileAssets(1,'js','footerJs') !!}
@elseif($page->js_type == 'cms')
    {!! BBgetProfileAssets($page->js_cms,'js','footerJs') !!}
@elseif($page->js_type == 'external')
    {!! BBlinkAssets($page->js) !!}
@endif
<!-- ================== END FOOTER JS ================== -->

<!-- ================== BEGIN FOOTER PAGE LEVEL JS ================== -->
{!! getFooterJs() !!}
<!-- ================== END FOOTER PAGE LEVEL JS ================== -->