<!DOCTYPE html>
@php
    if(!isset($page)){
       \Btybug\btybug\Services\RenderService::getFrontPageByURL();
    }
@endphp
<html lang="@yield('locale')">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('metas')
    <link type="image/x-icon" rel="icon" href="{{ asset('assets/favicon.ico') }}"/>
    <link type="image/x-icon" rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}"/>
    @if($page->css_type == 'external' && count($page->css))
        @foreach($page->css as $css)
            @if (!filter_var($css, FILTER_VALIDATE_URL) === false)
                {!! Html::style($css) !!}
            @endif
        @endforeach
    @endif

    @if($page->css_type == 'cms' && count($page->css_cms))
        @foreach($page->css_cms as $id)
            @php
                $versionRepo = new \Btybug\Framework\Repository\VersionsRepository();
                $version = $versionRepo->find($id);
                $path = ($version->env =='local') ? "public/css/versions/" . $version->file_name : $version->file_name;
            @endphp
            {!! Html::style($path) !!}
        @endforeach
    @endif
    {!! HTML::style('public-x/custom/css/'.str_replace(' ','-',$page->slug).'.css') !!}
    @yield('css')
    @stack('CSS')
</head>
<body>
<div class="full_page">
    @if (isset($errors) && count($errors) > 0)
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('flash.message') != null)
        <div class="flash alert {{ Session::has('flash.class') ? session('flash.class') : 'alert-success' }}"
             role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            {!! session('flash.message') !!}
        </div>
    @endif

    @if(Session::has('message'))
        <div class="m-t-10 alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible"
             role="alert">
            <button type="button" class="close" data-dismiss="alert"
                    aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            {!! Session::get('message') !!}
        </div>
    @endif
    @yield('content')

<!-- jQuery first, then Bootstrap JS. -->
    @if(count($page->js))
        @foreach($page->js as $js)
            @if (!filter_var($js, FILTER_VALIDATE_URL) === false)
                {!! Html::script($js) !!}
            @endif
        @endforeach
    @endif

    @if($page->js_type == 'cms' && count($page->js_type))
        @foreach($page->js_cms as $id)
            @php
                $versionRepo = new \Btybug\Framework\Repository\VersionsRepository();
                $version = $versionRepo->find($id);
                $path = ($version->env =='local') ? "public/js/versions/" . $version->file_name : $version->file_name;
            @endphp
            {!! Html::script($path) !!}
        @endforeach
    @endif
    {!! HTML::script('public-x/custom/js/'.str_replace(' ','-',$page->slug).'.js') !!}

    @yield('js')
</div>
</body>
</html>