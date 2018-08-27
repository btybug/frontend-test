<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Multi Site Management System">
<meta name="author" content="Abokamal">
<meta name="keywords" content=" mobile applications, web app,web design, multisite, my-site, site, cv,cms">
<meta property="og:url" content="http://btybug.com">
<meta property="og:type" content="Multi Site">
<meta property="og:title" content="Btybug Multy Site Management System">
<meta property="og:description" content="Btybug Multy Site Management System">
<meta property="og:image" content="http://btybug.com/public/images/avatar.png">
<meta name="geo.region" content="UK">
<meta name="geo.region" content="GB" />
<meta name="geo.placename" content="London" />
<meta name="geo.position" content="51.486024;-0.137304" />
<meta name="ICBM" content="51.486024, -0.137304" />
<meta name="csrf-token" content="{{ csrf_token() }}">


<title>@yield('title')</title>
@yield('metas')
<link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
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


<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
{!! getCss() !!}
@yield('css')
@stack('CSS')
<!-- ================== END PAGE LEVEL CSS STYLE ================== -->


<!-- ================== BEGIN BASE JS ================== -->
<script src="https://unpkg.com/popper.js@1.14.3/dist/umd/popper.min.js"></script>
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

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
{!! getHeaderJs() !!}
<!-- ================== END PAGE LEVEL JS ================== -->
