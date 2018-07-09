<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
@yield('metas')
<link type="image/x-icon" rel="icon" href="{{ asset('assets/favicon.ico') }}"/>
<link type="image/x-icon" rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}"/>
<link rel="apple-touch-icon" href="{{ asset('assets/apple-touch-icon.png') }}"/>

<!-- ================== BEGIN BASE CSS STYLE ================== -->
@if($page->css_type == 'default')
    {!! BBgetProfileAssets(false,'css','headerCss') !!}
    {!! BBCss()  !!}
@elseif($page->css_type == 'cms')
    {!! BBgetProfile($page->css_cms,'css',true) !!}
@elseif($page->css_type == 'external')
    {!! BBlinkAssets($page->css) !!}
@endif
<!-- ================== END BASE CSS STYLE ================== -->
@yield('css')

@stack('CSS')

<!-- ================== BEGIN BASE JS ================== -->
@if($page->js_type == 'default')
     {!! BBgetProfileAssets(false) !!}
     {!!  BBJs() !!}
@elseif($page->js_type == 'cms')
    {!! BBgetProfileAssets($page->js_cms) !!}
    {!! BBgetProfile($page->js_cms,'js',true) !!}
@elseif($page->js_type == 'external')
    {!! BBlinkAssets($page->js) !!}
@endif
<!-- ================== END BASE JS ================== -->