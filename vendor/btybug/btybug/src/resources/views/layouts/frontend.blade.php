<!DOCTYPE html>
@php
    if(!isset($page)){
       \Btybug\btybug\Services\RenderService::getFrontPageByURL();
    }else{
        \View::share('page', $page);
    }
@endphp
<html lang="@yield('locale')">
<head>
@include("btybug::layouts._partials.frontend.head")
<!-- ================== BEGIN UNITS CSS STYLE ================== -->

{!! getCss() !!}
<!-- ================== END UNITS CSS STYLE ================== -->
    {!! getHeaderJs() !!}
</head>
<body>
@include("btybug::layouts._partials.frontend.notifications")
@yield('contents')
@include("btybug::layouts._partials.frontend.footer")
<!-- ================== BEGIN UNITS CSS STYLE ================== -->

{!! getFooterJs() !!}
<!-- ================== END UNITS CSS STYLE ================== -->

</body>
</html>