<!-- ================== BEGIN FOOTER JS ================== -->
@if($page->js_type == 'default')
    {!! BBgetProfileAssets(1,'js','footerJs') !!}
@elseif($page->js_type == 'cms')
    {!! BBgetProfileAssets($page->js_cms,'js','footerJs') !!}
@elseif($page->js_type == 'external')
    {!! BBlinkAssets($page->js) !!}
@endif
<!-- ================== END FOOTER JS ================== -->

<!-- ================== BEGIN FOOTER CSS ================== -->
@if($page->css_type == 'default')
    {!! BBgetProfileAssets(false,'css','footerCss') !!}
@endif
<!-- ================== END FOOTER CSS ================== -->