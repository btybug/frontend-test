@include('mini::_partials.footer')

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
    <link rel="stylesheet" href="{!!url('public/minicms/btybug.css')!!}">
    <!-- ================== END PAGE BASE STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
@yield('css')
<!-- ================== END PAGE LEVEL STYLE ================== -->
@stack('css')

<!-- ================== BEGIN HEADER BASE JS ================== -->
    <script src="{!!url('public/minicms/plugins/jquery/jquery-3.2.1.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/jquery/jquery-migrate-1.1.0.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/jquery-ui/jquery-ui.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/bootstrap/4/bootstrap.bundle.min.js')!!}"></script>
    <!--[if lt IE 9]>
    <script src="{!!url('public/minicms/js/crossbrowserjs/html5shiv.js')!!}"></script>
    <script src="{!!url('public/minicms/js/crossbrowserjs/respond.min.js')!!}"></script>
    <script src="{!!url('public/minicms/js/crossbrowserjs/excanvas.min.js')!!}"></script>
    <![endif]-->
    <!-- ================== END HEADER BASE JS ================== -->

    <!-- ================== BEGIN HEADER PAGE LEVEL JS ================== -->
@yield('header_js')
<!-- ================== END HEADER PAGE LEVEL JS ================== -->
    {!! getCss() !!}
    <title>Document</title>
</head>
<body>

<div id="top-navigation" class="container-fluid nopadding profile">
    <div class="row nopadding ident ui-bg-color01">
        <div class="col-md-3 vc-photo photo nopadding">
            <div class="h-100">
                <div class="d-block d-md-none social-photo">
                    <div class=" social-icons d-flex  align-items-center flex-column-reverse">
                        <a class="secret" href="javascript:void(0);"><i class="fas fa-user-secret"></i></a>
                        <a class="twitter" href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                        <a class="facebook" href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>

                    </div>
                </div>
                <img src="/public/images/girl-cover.jpg" alt="girl">
            </div>

        </div>

        <div class="col-md-9 main nopadding">
            <div class="h-100 d-flex flex-column">
                <div class="profile-top d-flex justify-content-between align-items-center flex-wrap">
                    <div class="title-profesion">
                        <div class="title d-flex align-items-center">
                            <h2>Rania Dewell</h2>
                            <div class="circle d-flex align-items-center justify-content-center">
                                <span></span>
                            </div>
                        </div>

                        <p class="profesion">Graphic Designer</p>
                    </div>
                    <div class="icons d-flex flex-wrap align-items-center">
                        <a class="reply" href="javascript:void(0);">
                            <span><i class="fas fa-share"></i></span>
                            <span class="count">207</span>
                        </a>
                        <a class="comment" href="javascript:void(0);"><span><i
                                        class="far fa-comment-alt"></i></span></a>
                        <a class="heart" href="javascript:void(0);"><span><i class="far fa-heart"></i></span></a>
                        <a class="ellipsis" href="javascript:void(0);">
                            <span class="d-none d-md-block"><i class="fas fa-ellipsis-v"></i></span>
                            <span class="caret-down d-block d-md-none"><i class="fas fa-caret-down"></i></span>
                        </a>

                    </div>
                </div>
                <div class="profile-bottom d-flex justify-content-between align-items-center ">
                    <div class="info">
                        <div class="desc d-flex">
                            <q class="quote"></q>
                            <p>Don’T Walk Behind Me; I May Not Lead. Don’T Walk In Front Of Me; I May Not Follow. Just
                                Walk Beside Me And Be My Friend.</p>
                        </div>
                    </div>
                    <div class="d-none d-md-block">
                        <div class=" social-icons d-flex  align-items-center ">
                            <a class="secret" href="javascript:void(0);"><i class="fas fa-user-secret"></i></a>
                            <a class="twitter" href="javascript:void(0);"><i class="fab fa-twitter"></i></a>
                            <a class="facebook" href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a>

                        </div>
                    </div>

                </div>
                <div class="ux-tabs">

                    <div class="row nopadding">
                        <div class="col-10 nopadding ">
                            <div class="stick-flex">
                                <div class="sticky-user d-none">
                                    <div class="img">
                                        <img src="/public/images/girl-cover.jpg" alt="girl">
                                    </div>
                                    <div class="info d-flex align-items-center">
                                        <h2>Rania Dewell</h2>
                                        <a href="#">
                                            <span class="share"><i class="fas fa-share"></i></span>
                                        </a>
                                        <a class="reply" href="javascript:void(0);" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret-down"><i class="fas fa-caret-down"></i></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="far fa-heart"></i>Add to Favorite</a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="far fa-comment-alt"></i> Message</a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i class="far fa-flag"></i> Report</a>
                                        </div>
                                    </div>


                                </div>
                                <ul class="ux-tabs__headers">
                                    <li class="ux-tabs__header active">
                                        <a href="#"
                                           class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                            <i class="fas fa-home"></i>
                                            <span>home</span>
                                        </a>
                                    </li>
                                    <li class="ux-tabs__header">
                                        <a href="#"
                                           class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100"><i
                                                    class="fas fa-clipboard"></i>
                                            <span>Board</span>
                                        </a>
                                    </li>
                                    <li class="ux-tabs__header">
                                        <a href="#"
                                           class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                            <i class="far fa-address-book"></i>
                                            <span>Resume</span>
                                        </a>
                                    </li>
                                    <li class="ux-tabs__header ">
                                        <a href="#"
                                           class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                            <i class="fas fa-briefcase"></i>
                                            <span>Portfolio</span></a>
                                    </li>
                                    <li class="ux-tabs__header">
                                        <a href="#"
                                           class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                            <i class="far fa-clone"></i>
                                            <span>About</span></a>
                                    </li>
                                    <li class="ux-tabs__header">
                                        <a href="#"
                                           class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                            <i class="fab fa-blogger"></i>
                                            <span>blog</span></a>
                                    </li>
                                    <li class="ux-tabs__header">
                                        <a href="#"
                                           class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                            <i class="fa fa-flag" aria-hidden="true"></i>
                                            <span>home</span>
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