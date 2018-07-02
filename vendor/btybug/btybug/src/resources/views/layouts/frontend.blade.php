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
</head>
<body>
@include("btybug::layouts._partials.frontend.notifications")
@yield('contents')
@include("btybug::layouts._partials.frontend.footer")
</body>
</html>