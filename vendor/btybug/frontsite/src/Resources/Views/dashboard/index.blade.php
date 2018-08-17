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
    <link rel="stylesheet" href="{!!url('public/minicms/btybug.css?v='.rand(111,999))!!}">
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
                            <h2>{!! BBGetUser() !!}</h2>
                            <a href="#">
                                <span class="share"><i class="fas fa-share"></i></span>
                            </a>

                            <a href="#">
                                <span class="favorite"><i class="far fa-heart"></i></span>
                            </a>
                            <a class="reply" href="javascript:void(0);" id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret-down"><i class="fas fa-caret-down"></i></span>
                            </a>
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
                        <li class="ux-tabs__header">
                            <a href="#"
                               class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100"><i
                                        class="fas fa-clipboard"></i>
                                <span>Main</span>
                            </a>
                        </li>
                        <li class="ux-tabs__header">
                            <a href="#"
                               class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100"><i
                                        class="fas fa-clipboard"></i>
                                <span>Main</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="list-inline " style="display: inline-block">
                        <li class="list-inline-item add" id="add-new-page"><a>
                        <span class="icon"><i class="fas fa-plus"></i></span>
                        <span class="name">New Page</span></a>
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




<div class="container-fluid" style="margin-top: 20px;">
        <div class="add-unit text-right mb-2">
            <button type="button" class="btn btn-outline-dark btn-lg save-unit ml-3" style="float: right; opacity: 1; display: block" >Save</button>
            <button type="button" class="btn btn-outline-dark btn-lg add-unit-btn">Add unit<i class="fas fa-plus"></i></button>
        </div>
        <!-- begin #content -->

        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Dashboard <small>header small text goes here...</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div class="row">
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-red">
                    <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                    <div class="stats-info">
                        <h4>TOTAL VISITORS</h4>
                        <p>3,291,922</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-orange">
                    <div class="stats-icon"><i class="fa fa-link"></i></div>
                    <div class="stats-info">
                        <h4>BOUNCE RATE</h4>
                        <p>20.44%</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-grey-darker">
                    <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4>UNIQUE VISITORS</h4>
                        <p>1,291,922</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-lg-3 col-md-6">
                <div class="widget widget-stats bg-black-lighter">
                    <div class="stats-icon"><i class="fa fa-clock"></i></div>
                    <div class="stats-info">
                        <h4>AVG TIME ON SITE</h4>
                        <p>00:12:23</p>
                    </div>
                    <div class="stats-link">
                        <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
        <!-- begin row -->
        <div class="row" id="droppable">
            <!-- begin col-8 -->
            <div id="sortable1" class="col-lg-8 droppable1 connectedSortable">
                <!-- begin panel -->

            </div>
            <!-- end col-8 -->
            <!-- begin col-4 -->
            <div id="sortable2" class="col-lg-4 droppable2 connectedSortable">

                <!-- begin panel -->

                <!-- end panel -->

                <!-- begin panel -->

                <!-- end panel -->

                <!-- begin panel -->

                <!-- end panel -->
            </div>
            <!-- end col-4 -->
        </div>
        <ul class="right-side" >

        </ul>

        <!-- end row -->
        <!-- end #content -->
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
<script src="{!!url('public/minicms/home.js')!!}"></script>
<script src="{!!url('public/minicms/main.js')!!}"></script>
<script>
//  $(".ux-tabs__headers")
//                 .sortable({
//                     cursor: "move",
//                     revert: true,
//                     stop: function (e, ui) {

//                         let sorted = $(".ux-tabs__headers").sortable("toArray");

//                         $.ajax({
//                             url: '{!! route('mini_page_sorting') !!}',
//                             dataType: 'json',
//                             type: 'POST',
//                             data: {data: sorted},
//                             headers: {
//                                 'X-CSRF-TOKEN': $("input[name='_token']").val()
//                             },
//                             success: function(data){

//                             },
//                             error: function(data){
//                                 console.log(data);
//                             }
//                         });
//                     }
//                 })
//                 .find(".Item[class~=ui-sortable-helper]")
//                 .on("transitionend", function (e) {
//                     $(this).css("transform", "rotate(0deg)");
//                 });



                $("#add-new-page").click(function(e){
                e.preventDefault()
                
                           let html = `<li class="ux-tabs__header">
                            <a href="#" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100"><i class="fas fa-clipboard"></i>
                                <span>Default Item</span>
                            </a>
                        </li>`;
                            $(".ux-tabs__headers").append(html)
               
                
            })
</script>
<script src="{!!url('public/minicms/js/dashboard.js')!!}"></script>
<script src="{!!url('public/minicms/js/pages/dashboard.js')!!}"></script>
<script src="{!!url('public/js/add-unit.js')!!}"></script>
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