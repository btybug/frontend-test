<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
@yield('metas')
<link type="image/x-icon" rel="icon" href="{{ asset('assets/favicon.ico') }}"/>
<link type="image/x-icon" rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}"/>
<link rel="apple-touch-icon" href="{{ asset('assets/apple-touch-icon.png') }}"/>

{{--start CSS--}}
@if($page->css_type == 'default')
    {!! BBCss()  !!}
    <link rel="stylesheet" href="{{ url("public/css/font-awesome/css/font-awesome.min.css") }}"/>
    <link rel="stylesheet" href="{{ url("public/js/jquery-ui/jquery-ui.min.css") }}"/>
    {!! HTML::style("public/css/cms.css?v=".rand(1111,99999)) !!}
@elseif($page->css_type == 'cms')
    {!! BBgetProfile($page->css_cms,'css',true) !!}
@elseif($page->css_type == 'external')
    {!! BBlinkAssets($page->css) !!}
@endif
{{--end CSS--}}
{!! HTML::style('public/css/pages/'.str_replace(' ','-',$page->title).'.css') !!}
@yield('css')

@stack('CSS')

{{--start JS--}}
@if($page->js_type == 'default')
     {{--TODO: need fix when know from where get default profile --}}
     {!! BBgetProfileAssets(false) !!}
     {{--{!! BBgetProfile(1,'js',true) !!}--}}
     {!!  BBJs() !!}
    {{--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    {{--<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>--}}
    {{--{!! HTML::script("public/js/tinymice/tinymce.min.js") !!}--}}
    {{--{!! HTML::script("public/js/UiElements/bb_iframejs.js") !!}--}}
@elseif($page->js_type == 'cms')
    {!! BBgetProfileAssets($page->js_cms) !!}
    {!! BBgetProfile($page->js_cms,'js',true) !!}
@elseif($page->js_type == 'external')
    {!! BBlinkAssets($page->js) !!}
@endif
{{--end JS--}}