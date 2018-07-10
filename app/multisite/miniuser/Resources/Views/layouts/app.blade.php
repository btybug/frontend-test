<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- ================== BEGIN PAGE BASE STYLE ================== -->
        <link rel="stylesheet" href="{!!url('public/minicms/plugins/jquery-ui/jquery-ui.min.css')!!}">
        <link rel="stylesheet" href="{!!url('public/minicms/plugins/bootstrap/4/bootstrap.min.css')!!}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="{!!url('public/minicms/plugins/animate/animate.min.css')!!}">
        <link rel="stylesheet" href="{!!url('public/minicms/css/style.css')!!}">
        <link rel="stylesheet" href="{!!url('public/minicms/css/style-responsive.css')!!}">
        <link rel="stylesheet" href="{!!url('public/minicms/css/default.css')!!}">
        <link rel="stylesheet" href="{!!url('public/minicms/main.css')!!}">
    <!-- ================== END PAGE BASE STYLE ================== -->



    {{--<link rel="stylesheet" href="{!!url('public/minicms/plugins/jquery-jvectormap/jquery-jvectormap.css')!!}">--}}
    {{--<link rel="stylesheet" href="{!!url('public/minicms/plugins/bootstrap-datepicker/bootstrap-datepicker.css')!!}">--}}
    {{--<link rel="stylesheet" href="{!!url('public/minicms/plugins/gritter/jquery.gritter.css')!!}">--}}

    <title>Document</title>
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
        @yield('css')
    <!-- ================== END PAGE LEVEL STYLE ================== -->
    @stack('css')
</head>
<body>
<div id="page-container" class=" page-sidebar-fixed page-header-fixed page-content-full-height">
    <!-- begin #sidebar -->
    @include('mini::_partials.header')
    @include('mini::_partials.sidebar')
    <div class="sidebar-bg"></div>
    <!-- end #sidebar -->

    <!-- begin #content -->
    <div id="content" class="content">
        @yield('content')
    </div>
</div>
@include('resources::assests.magicModal')

<!-- ================== BEGIN BASE JS ================== -->
    <script src="{!!url('public/minicms/plugins/jquery/jquery-3.2.1.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/jquery/jquery-migrate-1.1.0.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/jquery-ui/jquery-ui.min.js')!!}"></script>
    <script src="{!!url('public/minicms/plugins/bootstrap/4/bootstrap.bundle.min.js')!!}"></script>

    <!--[if lt IE 9]>
        <script src="{!!url('public/minicms/js/crossbrowserjs/html5shiv.js')!!}"></script>
        <script src="{!!url('public/minicms/js/crossbrowserjs/respond.min.js')!!}"></script>
        <script src="{!!url('public/minicms/js/crossbrowserjs/excanvas.min.js')!!}"></script>
    <![endif]-->

    <script src="{!!url('public/minicms/jquery.slimscroll.min.js')!!}"></script>
    <script src="{!!url('public/minicms/js.cookie.js')!!}"></script>
    <script src="{!!url('public/minicms/js/default.js')!!}"></script>
    <script src="{!!url('public/minicms/apps.min.js')!!}"></script>
<!-- ================== END BASE JS ================== -->

{{--<script src="{!!url('public/minicms/plugins/gritter/jquery.gritter.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/plugins/flot/jquery.flot.min.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/plugins/flot/jquery.flot.time.min.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/plugins/flot/jquery.flot.resize.min.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/plugins/flot/jquery.flot.pie.min.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/plugins/sparkline/jquery.sparkline.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/plugins/jquery-jvectormap/jquery-jvectormap.min.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/plugins/jquery-jvectormap/jquery-jvectormap-world-mill-en.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/plugins/bootstrap-datepicker/bootstrap-datepicker.js')!!}"></script>--}}

{{--<script src="{!!url('public/minicms/js/dashboard.js')!!}"></script>--}}
{{--<script src="{!!url('public/minicms/main.js')!!}"></script>--}}
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
    @yield('js')
<!-- ================== END PAGE LEVEL JS ================== -->

@stack('javascript')
</body>
</html>