<!DOCTYPE html>
@php
    $page = \Btybug\btybug\Services\RenderService::getPageByURL();
@endphp

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>BB Admin Framework</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
{{--{!! HTML::style("public/css/bootstrap/css/bootstrap.css") !!}--}}

{!! BBCss("backend")  !!}
{!! HTML::style("public/css/cms.css?v=".rand(1111,99999)) !!}
{!! HTML::style("public/css/admin.css?v=".rand(1111,99999)) !!}
{!! HTML::style("public/js/DataTables/datatables.css") !!}
{!! HTML::style("public/js/DataTables/Buttons-1.5.1/css/buttons.bootstrap.css") !!}
{!! HTML::style('public-x/custom/css/'.str_replace(' ','-',$page->slug).'.css') !!}
{{--{!! BBMainJS() !!}--}}
{!! BBJs("backend") !!}
{!! HTML::script("public/js/jquery-ui/jquery-ui.min.js") !!}
{!! HTML::script("public/js/helper.js") !!}
@yield('CSS')
@stack('css')

<!--BB:Theme-->

    <!--BB:JS-->
    {!! HTML::script("public/js/jquery-2.1.4.min.js") !!}
    @yield('HeaderJS')
</head>
<body>
<div id="wrapper">
    @if($page)
        <div class="bty-header-fix">
            {!! BBheaderBack() !!}
        </div>
        <div class="adm-top">
            @if($page->panel_main_content)
            @include(BBgetPageLayout(),['settings'=>BBgetPageLayoutSettings()])
            @else
                @yield('content')
            @endif
            {!! BBextraHtml() !!}
        </div>
        <div class="bty-footer-fix">
            {!! BBfooterBack() !!}
        </div>
    @endif
</div>
@include('modal')
{{ csrf_field() }}

<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>

{!! BBJs("backend") !!}
{!! HTML::script("public/js/admin.js?v=6.0") !!}
{!! HTML::script("public/js/BB.js") !!}
{!! HTML::script("public/js/DataTables/datatables.js") !!}
{!! HTML::script("public/js/DataTables/Buttons-1.5.1/js/buttons.bootstrap.js") !!}
{!! HTML::script('public-x/custom/js/'.str_replace(' ','-',$page->slug).'.js') !!}
<script>
    $(function () {
        if ($('[data-role="browseMedia"]').length > 0) {
            $('[data-role="browseMedia"]').media();
        }
    })
</script>
@yield('JS')
{!! BBscriptsHook() !!}
@stack('javascript')

@yield('Footer')
</body>
</html>

