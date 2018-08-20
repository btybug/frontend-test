@include('btybug::layouts._partials.frontend.front_footer')
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{!! BBstyle(base_path('vendor'.DS.'btybug'.DS.'mini'.DS.'src'.DS.'Resources'.DS.'Units'.DS.'btybug_unit_cover'.DS.'css'.DS.'style.css')) !!}
<!-- ================== BEGIN PAGE BASE STYLE ================== -->
    <link rel="stylesheet" href="{!!url('public/minicms/plugins/jquery-ui/jquery-ui.min.css')!!}">
    <link rel="stylesheet" href="{!!url('public/minicms/plugins/bootstrap/4/bootstrap.min.css')!!}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="{!!url('public/minicms/plugins/animate/animate.min.css')!!}">
    <link rel="stylesheet" href="{!!url('public/minicms/css/style.css')!!}">
    <link rel="stylesheet" href="{!!url('public/minicms/css/style-responsive.css')!!}">
    <link rel="stylesheet" href="{!!url('public/minicms/css/default.css')!!}">
    <link rel="stylesheet" href="{!!url('public/libs/tagsinput/bootstrap-tagsinput.css')!!}">
    <link rel="stylesheet" href="{!!url('public/minicms/btybug.css?v='.rand(111,999))!!}">
    <!-- ================== END PAGE BASE STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
@yield('css')
<!-- ================== END PAGE LEVEL STYLE ================== -->
@stack('css')
    <link rel="stylesheet" href="{!!url('public/minicms/css/social.css?v='.rand(111,999))!!}">
<!-- ================== BEGIN HEADER BASE JS ================== -->
    <script src="{!!url('public/minicms/plugins/jquery/jquery-3.2.1.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/jquery/jquery-migrate-1.1.0.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/jquery-ui/jquery-ui.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/bootstrap/4/bootstrap.bundle.min.js')!!}"></script>
    <!--[if lt IE 9]>
    <![endif]-->
    <!-- ================== END HEADER BASE JS ================== -->

    <!-- ================== BEGIN HEADER PAGE LEVEL JS ================== -->
@yield('header_js')
<!-- ================== END HEADER PAGE LEVEL JS ================== -->
    {!! getCss() !!}
    <title>Document</title>
</head>
<body>
<div class="container-fluid nopadding profile-sticky">
    <div class="ux-tabs ">
        <div class="row nopadding">
            <div class="col-10 nopadding ">
                <div class="stick-flex">
                    <div class="sticky-user">
                        <div class="img">
                            <img src="/public/images/girl-cover.jpg" alt="girl">
                        </div>
                        <div class="info d-flex align-items-center">
                            <h2>Profiles</h2>
                            {{--<a href="#">--}}
                                {{--<span class="share"><i class="fas fa-share"></i></span>--}}
                            {{--</a>--}}

                            {{--<a href="#">--}}
                                {{--<span class="favorite"><i class="far fa-heart"></i></span>--}}
                            {{--</a>--}}
                            {{--<a class="reply" href="javascript:void(0);" id="dropdownMenuLink"--}}
                               {{--data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                {{--<span class="caret-down"><i class="fas fa-caret-down"></i></span>--}}
                            {{--</a>--}}
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item d-flex align-items-center" href="/home"><i
                                            class="fas fa-home"></i>Home</a>
                                <a class="dropdown-item d-flex align-items-center" href="/dashboard"><i
                                            class="fas fa-archway"></i> Dashboards</a>
                                <a class="dropdown-item d-flex align-items-center" href="/notifications"><i
                                            class="far fa-comment-alt"></i> Communications</a>
                            </div>
                        </div>


                    </div>
                    <ul class="ux-tabs__headers">
                        <li class="ux-tabs__header active">
                            <a href="{!! url('/profiles/social/general') !!}"
                               class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                <i class="fas fa-newspaper"></i>
                                <span>Social</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-2 nopadding">
                <div class="ux-tabs__dropdown">
                    <span class="icon"><i class="far fa-clone"></i></span>
                    <span class="more">More</span>
                    <i class="fas fa-angle-down"></i>

                    <ul class="ux-tabs__dropdown-items">
                        <li class="ux-tabs__dropdown-item">Item 1</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-manage-content">
    <div class="content-pages container-fluid">
        <div class="row">
            <div class="col-md-2 pl-0">
                <div class="menu">
                    <ul>
                        <li ><a href="{!! url('profiles/social/general') !!}">
                            <span><i class="fab fa-buromobelexperte"></i></span>General</a>
                        </li>
                        <li class="active"><a href="{!! url('profiles/social/quick-bugs') !!}">
                            <span><i class="fab fa-buromobelexperte"></i></span>Quick Bugs</a>
                        </li>
                        <li><a href="{!! url('profiles/social/travel') !!}">
                            <span><i class="fab fa-buromobelexperte"></i></span>Travel</a>
                        </li>
                        <li><a href="{!! url('profiles/social/places') !!}">
                            <span><i class="fab fa-buromobelexperte"></i></span>Places</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="right-content">
                    <div class="quick_bug">
                        <div class="main-bug">
                            <div class="head">
                                <div class="d-flex">
                                    <div class="title-icon d-flex align-items-center">
                                        <i class="far fa-newspaper"></i>
                                        <span>Quick Bug</span>
                                    </div>

                                    <div class="daily d-flex align-items-center">
<span class="icon">
                    <i class="far fa-calendar-alt"></i>
                </span>
                                        <span class="name">Daily</span>
                                        <a class="more" href="javascript:void(0);" id="dropdownBugHead" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <span class="caret-down"><i class="fas fa-caret-down"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownBugHead">
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                                        class="title">Item1</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                                        class="title">Item2</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                                        class="title">Item3</span></a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="main-content">
                                <div class="happy d-flex align-items-center">
                                    <div class="title">
                                        <textarea name="" id="" cols="30" rows="10" placeholder="Bug Sumething..."></textarea>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-smile"></i>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <form action="">
                                        <div data-group="hashtag" hidden class="form-group row align-items-center group-for-tags">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend blue-cl">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button">
                                                            <i class="fas fa-hashtag"></i>
                                                        </button>

                                                    </div>
                                                    <input type="text" class="form-control tags_bug_custom"
                                                           value="Freindship" data-role="tagsinput">

                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <div data-group="at" hidden class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend red-cl">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button">
                                                            <i class="fas fa-at"></i>
                                                        </button>

                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Mention Friends">
                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>

                                        <div data-group="sign" hidden class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend green-cl">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button">
                                                            <i class="fas fa-lira-sign"></i>
                                                        </button>

                                                    </div>
                                                    <input type="text" class="form-control" placeholder="With...">
                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>

                                        <div data-group="youtube" hidden class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend red-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                            <i class="fab fa-youtube"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Item1</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Item2</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">Item3</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Item4</span>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    <input type="search" class="form-control" placeholder="Search Youtube">
                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>


                                        <div data-group="images" hidden class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend purple-cl">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button">
                                                            <i class="far fa-images"></i>
                                                        </button>

                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Mention Friends">
                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>

                                        <div data-group="music" hidden class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend blue-cl">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button">
                                                            <i class="fas fa-music"></i>
                                                        </button>

                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Mention Friends">
                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>

                                        <div data-group="star" hidden class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend red-cl">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button">
                                                            <i class="far fa-star"></i>
                                                        </button>

                                                    </div>
                                                    <input type="text" class="form-control" placeholder="Mention Friends">
                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>

                                        <div data-group="location" hidden class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend blue-cl">
                                                                <button class="btn btn-outline-secondary"
                                                                        type="button">
                                                                    <i class="fas fa-map-marker-alt"></i>
                                                                </button>

                                                            </div>
                                                            <input type="text" class="form-control" placeholder="With...">
                                                            <div class="input-group-prepend blue-grad-cl">
                                                                <button class="btn btn-outline-secondary"
                                                                        type="button">
                                                                    <i class="fas fa-crosshairs"></i>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="left-group">
                                                                <div class="map-custom">
                                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.72810776133!2d-0.24168051295924747!3d51.52877184056342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2s!4v1534333971160"
                                                                            width="100%" height="195" frameborder="0"
                                                                            style="border:0" allowfullscreen></iframe>
                                                                </div>
                                                            </div>

                                                            <div class="right-group">
                                                                <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="right-group">
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                            <div class="bottom">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="icons">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="" class="hashtag"><span class="blue-cl-icon"><i class="fas fa-hashtag"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="at"><span class="red-cl-icon"><i class="fas fa-at"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="sign"><span class="green-cl-icon"><i class="fas fa-lira-sign"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="youtube"><span class="orange-cl-icon"><i class="fab fa-youtube"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="images"><span class="purple-cl-icon"><i class="far fa-images"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="music"><span class="blue-cl-icon"><i class="fas fa-music"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="star"><span class="red-light-cl-icon"><i class="far fa-star"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="location"><span class="orange-cl-icon"><i class="fas fa-map-marker-alt"></i></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="right-col d-flex">
                                        <div class="d-flex align-items-center align-self-stretch bg-white">
                                            <div class="button">
                                                <button class="btn btn-link dropdown-toggle"
                                                        type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-lock"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-globe-asia icon-blue"></i>
                                                        <span class="name">Item1</span>
                                                    </a>
                                                    <a class="dropdown-item active" href="#">
                                                        <i class="fas fa-user-friends icon-green"></i>
                                                        <span class="name">Item2</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-user-friends icon-purple"></i>
                                                        <span class="name">Item3</span>
                                                    </a>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-lock icon-red"></i>
                                                        <span class="name">Item4</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="name">
                                                <span>Only Me</span>
                                            </div>


                                        </div>
                                        <div class="bug-it d-flex align-items-center align-self-stretch">
                                            <button class="btn btn-link">Bug It</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="share-bug">
                            <div class="d-flex justify-content-end">
                                <div class="share-also">
                                    Share also on
                                </div>
                                <div class="facebook-share d-flex align-items-center">

                                    <label class="container custom-checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="" class="facebook-link"><i class="fab fa-facebook-f"></i></a>

                                </div>
                                <div class="twitter-share d-flex align-items-center">
                                    <label class="container custom-checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="" class="twitter-link"><i class="fab fa-twitter"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@yield('footer')
{{--<div id="page-container" class=" page-sidebar-fixed page-header-fixed page-content-full-height">--}}
{{--<!-- begin #content -->--}}
{{--<div id="content" class="content">--}}
{{--@yield('content')--}}
{{--</div>--}}
{{--</div>--}}
<!-- ================== BEGIN FOOTER BASE JS ================== -->
<script src="{!!url('public/minicms/jquery.slimscroll.min.js')!!}"></script>
<script src="{!!url('public/minicms/js.cookie.js')!!}"></script>
<script src="{!!url('public/minicms/js/default.js')!!}"></script>
<script src="{!!url('public/minicms/apps.min.js')!!}"></script>
<script src="{!!url('public/libs/tagsinput/bootstrap-tagsinput.min.js')!!}"></script>
<script src="{!!url('public/minicms/home.js')!!}"></script>
<script src="{!!url('public/minicms/main.js')!!}"></script>
<!-- ================== END FOOTER BASE JS ================== -->


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
@yield('js')
<!-- ================== END PAGE LEVEL JS ================== -->

@stack('javascript')

<!-- ================== BEGIN FOOTER PAGE LEVEL JS ================== -->
{!! getFooterJs() !!}
<!-- ================== END FOOTER PAGE LEVEL JS ================== -->
</body>
</html>