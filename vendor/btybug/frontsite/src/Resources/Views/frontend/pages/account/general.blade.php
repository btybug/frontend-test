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
    <style>
        .site-manage-content a {
            text-decoration: none;
            -webkit-transition: 0.5s ease;
            -moz-transition: 0.5s ease;
            -ms-transition: 0.5s ease;
            -o-transition: 0.5s ease;
            transition: 0.5s ease;
        }

        .site-manage-content ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .site-manage-content .content-pages {
            padding-top: 25px;

        }

        .site-manage-content .content-pages .menu ul li {
            margin-bottom: 10px;
        }
        .site-manage-content .content-pages .menu ul li a {
            font-size: 22px;
            color: #5a5a5a;
            width: 85%;
            background-color: #e7e7e7;
            margin: 0 auto;
            padding: 15px 30px;
            border: 1px solid #c5c5c5;
            display: block;
        }
        .site-manage-content .content-pages .menu ul li a:hover {
            color: #4f4f4f;
        }

        .site-manage-content .content-pages .menu ul li a:hover i {
            color: #4f4f4f;
            background: -webkit-linear-gradient(#3a5fa3, #30a9bb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .site-manage-content .content-pages .menu ul li a span {
            margin-right: 24px;
        }

        .site-manage-content .content-pages .menu ul li a span i {
            font-size: 28px;
        }

        .site-manage-content .content-pages .menu ul li.active a {
            display: block;
            background-color: #fff;
            padding: 15px;
            padding-left: 50px;
            color: #4f4f4f;
            width: 100%;
        }

        .site-manage-content .content-pages .menu ul li.active a span i {
            background: -webkit-linear-gradient(#3a5fa3, #30a9bb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .site-manage-content .content-pages .right-content {
            border: 1px solid #c5c5c5;
            background-color: #fff;
            padding:35px;
        }


        /*dettings data*/

        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group label{
            font-size: 20px;
            color: #4f4f4f;
        }
        .site-manage-content .content-pages .right-content .manage-settings .form-control{
            height: 55px;
            border-radius: 0;
            border: 1px solid #d5d5d5;
            background-color: #f7f7f7;
            font-size: 20px;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group .input-group-append{
            border: 1px solid #d5d5d5;
            color: white;
        }
        .site-manage-content .content-pages .right-content .manage-settings .blue-cl {
            background: #3a5fa3;
            background: -moz-linear-gradient(left, #3a5fa3 0%, #30a9bb 100%);
            background: -webkit-linear-gradient(left, #3a5fa3 0%,#30a9bb 100%);
            background: linear-gradient(to right, #3a5fa3 0%,#30a9bb 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3a5fa3', endColorstr='#30a9bb',GradientType=1 );
        }
        .site-manage-content .content-pages .right-content .manage-settings .red-cl {
            background: #c6393b;
            background: -moz-linear-gradient(45deg, #c6393b 0%, #dd743a 100%);
            background: -webkit-linear-gradient(45deg, #c6393b 0%,#dd743a 100%);
            background: linear-gradient(45deg, #c6393b 0%,#dd743a 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#c6393b', endColorstr='#dd743a',GradientType=1 );
        }
        .site-manage-content .content-pages .right-content .manage-settings .green-cl {
            background: #93cd5e;
            background: -moz-linear-gradient(45deg, #93cd5e 1%, #44b074 100%);
            background: -webkit-linear-gradient(45deg, #93cd5e 1%,#44b074 100%);
            background: linear-gradient(45deg, #93cd5e 1%,#44b074 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cd5e', endColorstr='#44b074',GradientType=1 );
        }
        .site-manage-content .content-pages .right-content .manage-settings .yellow-cl {
            background: #d6c760;
            background: -moz-linear-gradient(45deg, #d6c760 0%, #b5a746 100%);
            background: -webkit-linear-gradient(45deg, #d6c760 0%,#b5a746 100%);
            background: linear-gradient(45deg, #d6c760 0%,#b5a746 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d6c760', endColorstr='#b5a746',GradientType=1 );
        }
        .site-manage-content .content-pages .right-content .manage-settings .blue-light-cl {
            background-color: #31a2b9;
        }
        .site-manage-content .content-pages .right-content .manage-settings .none-cl {
            background-color: #f7f7f7;
            border: 1px solid #ccc;
            border-right: none;
        }
        .site-manage-content .content-pages .right-content .manage-settings .none-cl+.form-control {
            border-left: none;
        }
        .site-manage-content .content-pages .right-content .manage-settings .none-cl .btn i{
            color: #31a2b9;
        }
        .site-manage-content .content-pages .right-content .manage-settings .input-group-append .btn{
            border: none;
            border-radius: 0;
            color: white;
            position: relative;
            min-width: 55px;
        }
        .site-manage-content .content-pages .right-content .manage-settings .input-group-append .btn:hover{
            background: none;
        }
        .site-manage-content .content-pages .right-content .manage-settings .input-group-append.show>.btn-outline-secondary.dropdown-toggle{
            background: none;
        }

        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group .socialmedia-add{
            margin-bottom: 5px;
            font-size: 29px;
            color: #d1573a;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group .custom_select select{
            -webkit-appearance: none;
            -moz-appearance: none;
            -ms-appearance: none;
            appearance: none;
            outline: 0;
            background: #f7f7f7;
            background-image: none;
            cursor: pointer;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group .custom_select select::-ms-expand{
            display: none;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group .custom_select{
            position: relative;
            display: block;
            width: 100%;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group .custom_select::after{
            position: absolute;
            content: "";
            bottom: 0;
            right: 0;
            width: 0;
            height: 0;
            border: 6px solid transparent;
            border-color: #a2a1a1 transparent transparent transparent;
            transform: rotate(-45deg);
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group{
            margin-bottom: 36px;
        }
        .site-manage-content .content-pages .right-content .manage-settings .input-group-append .btn.dropdown-toggle:after{
            border-top: 0.4em solid;
            border-right: .4em solid transparent;
            border-bottom: 0;
            border-left: .4em solid transparent;
            position: absolute;
            bottom: 4px;
            right: 2px;
            transform: rotate(-45deg);
        }
        .site-manage-content .content-pages .right-content .manage-settings .input-group-append .btn i{
            font-size: 22px;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group .view{

            background: -webkit-linear-gradient(#93cd5e, #44b074);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 20px;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group.group-for-tags .bootstrap-tagsinput{
            padding: 7px;
            min-height: 55px;
            border-radius: 0;
            border: 1px solid #d5d5d5;
            background-color: #f7f7f7;
            flex: auto;
            display: flex;
            flex-wrap: wrap;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-left .form-group.group-for-tags .tag{
            background-color: #555353;
            display: flex;
            align-items: center;
            padding: 5px;
            font-size: 20px;
            margin-bottom: 4px;
        }

        .site-manage-content .content-pages .right-content .manage-settings .settings-right .images-name .image{
            border: 1px solid #d5d5d5;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-right .images-name img{
            width: 100%;
            height: 266px;
            object-fit: cover;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-right .images-name .site-image{
            font-size: 20px;
            color: white;
            background: #3a5fa3;
            background: -moz-linear-gradient(left, #3a5fa3 0%, #30a9bb 100%);
            background: -webkit-linear-gradient(left, #3a5fa3 0%,#30a9bb 100%);
            background: linear-gradient(to right, #3a5fa3 0%,#30a9bb 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3a5fa3', endColorstr='#30a9bb',GradientType=1 );
            padding: 20px;
            text-align: center;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-right .maps .blue-cl .btn{
            width: 100%;
            padding: 14px;
        }
        .site-manage-content .content-pages .right-content .manage-settings .settings-right .maps .map-search{
            border: 1px solid #d5d5d5;
        }
        .site-manage-content .content-pages .right-content .manage-settings .icon-blue{
            color: #3296b5;
        }
        .site-manage-content .content-pages .right-content .manage-settings .icon-green{
            color: #61ba73;
        }
        .site-manage-content .content-pages .right-content .manage-settings .icon-purple{
            color: #7f5dc5;
        }
        .site-manage-content .content-pages .right-content .manage-settings .icon-red{
            color: #d2593a;
        }
        .site-manage-content .content-pages .right-content .manage-settings .dropdown-menu{
            margin: 0;
            padding: 0;
            border-radius: 0;
        }
        .site-manage-content .content-pages .right-content .manage-settings .dropdown-menu .dropdown-item{
            padding:12px 60px 12px 15px;
        }
        .site-manage-content .content-pages .right-content .manage-settings .dropdown-menu .dropdown-item.active{
            border-top:1px solid #d5d5d5;
            border-bottom:1px solid #d5d5d5;
            background-color: #f9f9f9;
        }
        .site-manage-content .content-pages .right-content .manage-settings .dropdown-menu .dropdown-item i{
            font-size: 22px;
            margin-right:15px;
        }
        .site-manage-content .content-pages .right-content .manage-settings .dropdown-menu .dropdown-item .name{
            color: #4f4f4f;
            font-size: 20px;
        }

        /*Responsive*/
        @media  (max-width:768px) {
            .site-manage-content .content-pages .menu ul li a{
                text-overflow: ellipsis;
                overflow: hidden;
                padding: 15px;
            }
            .site-manage-content .content-pages .menu ul li.active a{
                padding-left:15px;
            }
            .site-manage-content .content-pages .menu ul li a span{
                margin-right: 10px;
            }
            .site-manage-content .content-pages .right-content .manage-settings .settings-right .maps .blue-cl .btn{
                min-width: 100%;
            }

        }

    </style>
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
                            <h2>Account</h2>
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
                            <a href="{!! url('/account/general') !!}"
                               class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100">
                                <i class="fas fa-home"></i>
                                <span>General</span>
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
                        <li class="active"><a href="{!! url('account/general') !!}"><span><i class="fab fa-buromobelexperte"></i></span>My Details</a>
                        </li>
                        <li ><a href="{!! url('account/general/password') !!}"><span><i
                                            class="far fa-address-book"></i></span>Password</a></li>

                        <li ><a href="{!! url('account/general/preferances') !!}"><span><i
                                            class="far fa-address-book"></i></span>Preferances</a></li>
                        <li ><a href="{!! url('account/general/logs') !!}"><span><i
                                            class="far fa-address-book"></i></span>Logs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="right-content">
                    <div class="manage-settings row ">
                        <div class="col-xl-6">
                            <div class="settings-left">
                                {!! Form::model($user) !!}
                                    <div class="form-group row align-items-center">
                                        <label for="displayName" class="col-sm-3 col-form-label">Social site url</label>
                                        <div class="col-sm-8 pl-0">
                                            <div class="input-group">
                                                <input readonly type="text" class="form-control" id="displayName"
                                                    value="{!! $_SERVER['HTTP_HOST'] . '/' . $user->site_url !!}"   aria-label="Text input with dropdown button">
                                                <div class="input-group-append blue-cl">
                                                    <button class="btn btn-outline-secondary" type="button">
                                                        <i class="fas fa-globe-asia"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <div class="form-group row align-items-center">
                                    <label for="f_name" class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-8 pl-0">
                                        <div class="input-group">
                                            {!! Form::text('f_name',null,
                                            ['class' => 'form-control','id'=> 'f_name','aria-label' => 'Text input with dropdown button']) !!}
                                            <div class="input-group-append blue-cl">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-globe-asia"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="f_name" class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-8 pl-0">
                                        <div class="input-group">
                                            {!! Form::text('l_name',null,
                                            ['class' => 'form-control','id'=> 'l_name','aria-label' => 'Text input with dropdown button']) !!}
                                            <div class="input-group-append blue-cl">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-globe-asia"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="f_name" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-8 pl-0">
                                        <div class="input-group">
                                            {!! Form::email('email',null,
                                            ['class' => 'form-control','id'=> 'email','aria-label' => 'Text input with dropdown button']) !!}
                                            <div class="input-group-append blue-cl">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-globe-asia"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="display_name" class="col-sm-3 col-form-label">Display Name</label>
                                    <div class="col-sm-8 pl-0">
                                        <div class="input-group">
                                            {!! Form::text('display_name',null,
                                            ['class' => 'form-control','id'=> 'display_name','aria-label' => 'Text input with dropdown button']) !!}
                                            <div class="input-group-append blue-cl">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-globe-asia"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="f_name" class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-8 pl-0">
                                        <div class="input-group">
                                            {!! Form::text('phone_number',null,
                                            ['class' => 'form-control','id'=> 'phone_number','aria-label' => 'Text input with dropdown button']) !!}
                                            <div class="input-group-append blue-cl">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-globe-asia"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="f_name" class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-8 pl-0">
                                        <div class="input-group">
                                            {!! Form::text('address',null,
                                            ['class' => 'form-control','id'=> 'address','aria-label' => 'Text input with dropdown button']) !!}
                                            <div class="input-group-append blue-cl">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="fas fa-globe-asia"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <input type="submit" class="btn btn-success" value="Submit"/>
                                </div>
                                {!! Form::close() !!}
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