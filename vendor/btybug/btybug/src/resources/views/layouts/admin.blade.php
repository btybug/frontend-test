@php
    $page = \Btybug\btybug\Services\RenderService::getPageByURL();
dd($page);
@endphp
@extends('btybug::layouts.admin_content')
@section('main_content')
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
    @stop