@include("btybug::layouts._partials.frontend.footer")
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
<div>
@include("btybug::layouts._partials.frontend.notifications")
@yield('contents')
@yield('footer')
</div>
<div id="app"></div>
<script src="{{ asset('public/js/app.js') }}"></script>

</body>
</html>