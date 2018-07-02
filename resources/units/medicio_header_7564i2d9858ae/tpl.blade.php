{!! BBstyle($_this->path.DS.'css/header.css',$_this) !!}
{{--<div class="logo-menu">--}}
    {{--<nav class="navbar navbar-default" role="navigation" data-spy="affix" data-offset-top="50">--}}
        {{--<div class="row">--}}
            {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
            {{--<div class="col-md-3">--}}
                {{--<div class="navbar-header col-md-12">--}}
                    {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">--}}
                        {{--<span class="sr-only">Toggle navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}
                    {{--<a class="navbar-brand" href="#home">--}}
                        {{--<img src="{!! BBgetSiteLogo() !!}" width="50" alt="Logo" class="img-circle pull-left">--}}
                        {{--<span>{!! BBgetSiteName() !!}</span></a>--}}
                {{--</div>--}}
            {{--</div>--}}
           {{--<div class="col-md-6">--}}
               {{--<div class="collapse navbar-collapse" id="navbar">--}}
                   {{--@if(isset($settings['menu_area']))--}}
                       {{--@php--}}
                           {{--$items = BBGetMenu($settings['menu_area'])--}}
                       {{--@endphp--}}
                       {{--@if(count($items))--}}
                           {{--<ul class="nav navbar-nav col-md-9 pull-right">--}}
                               {{--@foreach($items as $item)--}}
                                   {{--<li><a href="{!! url($item->url) !!}"><i class="{!! $item->icon !!}"></i> {!! $item->title !!}</a></li>--}}
                               {{--@endforeach--}}
                           {{--</ul>--}}
                       {{--@endif--}}
                   {{--@endif--}}
               {{--</div>--}}
           {{--</div>--}}
            {{--<div class="col-md-3">--}}
                {{--<div class="navbar-header col-md-3">--}}
                    {{--@if(isset($settings['user_area']))--}}
                        {{--{!! BBRenderUnits($settings['user_area']) !!}--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}
{{--</div>--}}

<section id="header">
    <nav class="navbar navbar-bg">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="{!! BBgetSiteLogo() !!}" alt="logo"><span>{!! BBgetSiteName() !!}</span></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                {{--<ul class="nav navbar-nav navbar-right login-part">--}}
                    {{--<li><a href="#">Login</a></li>--}}
                    {{--<li><a href="#">register</a></li>--}}
                    {{--<li class="prof-pic"><a href="#"></a></li>--}}
                    {{--<li class="dropdown">--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">User Profile <i class="fa fa-angle-down" aria-hidden="true"></i></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}

                <ul class="nav navbar-nav navbar-right login-part">
                        <li class="prof-pic"><a href=""><img src="{!! BBGetUserAvatar() !!}" alt=""></a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">{{Auth::user()->username}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            <ul class="dropdown-menu">
                                @if(isset($settings['user_area']))

                                    @php
                                        $items = BBGetMenu($settings['user_area'])
                                    @endphp
                                    @if(count($items))
                                        @foreach($items as $item)
                                            <li><a href="{!! url($item->url) !!}"><i class="fa {!! $item->icon !!}"
                                                                                     aria-hidden="true"></i><span>{!! $item->title !!}</span></a>
                                            </li>
                                        @endforeach
                                    @endif
                                @endif
                                <li><a href="{!! url('logout') !!}"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Log out</span></a></li>

                            </ul>
                        </li>
                </ul>





                @if(isset($settings['menu_area']))
                    @php
                        $items = BBGetMenu($settings['menu_area'])
                    @endphp
                    @if(count($items))
                        <ul class="nav navbar-nav  navbar-right header-menu">
                            @foreach($items as $item)
                                <li><a href="{!! url($item->url) !!}"><i class="{!! $item->icon !!}"></i> {!! $item->title !!}</a></li>
                            @endforeach
                        </ul>
                    @endif
                @endif

            </div>
        </div>
    </nav>
</section>
<!-- Nav Menu Section End -->