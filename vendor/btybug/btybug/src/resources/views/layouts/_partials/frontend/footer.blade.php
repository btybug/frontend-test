@if($page->js_type == 'default')
    {!! BBgetProfileAssets(1,'js','footerJs') !!}
@elseif($page->js_type == 'cms')
    {!! BBgetProfileAssets($page->js_cms,'js','footerJs') !!}
@elseif($page->js_type == 'external')
    {!! BBlinkAssets($page->js) !!}
@endif

{{--start CSS--}}
@if($page->css_type == 'default')
    {!! BBgetProfileAssets(false,'css','footerCss') !!}
@endif

{{--{!! HTML::script('public/js/pages/'.str_replace(' ','-',$page->title).'.js') !!}--}}