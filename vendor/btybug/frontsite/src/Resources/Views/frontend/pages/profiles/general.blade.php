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
    <script src="{!!url('public/libs/tagsinput/bootstrap-tagsinput.min.js')!!}"></script>
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
                        <li class="active"><a href="{!! url('profiles/social/general') !!}">
                            <span><i class="fab fa-buromobelexperte"></i></span>General</a>
                        </li>
                        <li><a href="{!! url('profiles/social/quick-bugs') !!}">
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
                        {!! Form::model($social_profile,array('route' => 'front_page_account_profiles_save','files' => true )) !!}
                        {!! Form::hidden('id',null) !!}
                        <div class="manage-settings row ">
                            <div class="col-xl-6">
                                <div class="settings-left">

                                        <div class="form-group row align-items-center">
                                            <label for="display_name" class="col-sm-3 col-form-label">Display
                                                Name</label>
                                            <div class="col-sm-8 pl-0">
                                                <div class="input-group">
                                                    {!! Form::text('display_name',null,
                                            ['class' => 'form-control','id'=> 'display_name','aria-label' => 'Text input with dropdown button']) !!}
                                                    <div class="input-group-append blue-cl">
                                                        <button class="btn btn-outline-secondary" type="button">
                                                            <i class="fas fa-globe-asia"></i></button>
                                                    </div>
                                                </div>
                                                @if($errors->has('display_name'))
                                                    {{ $errors->first('display_name') }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            {{Form::label('email', 'Email', array('class' => 'col-sm-3 col-form-label'))}}
                                            <div class="col-sm-8 pl-0">
                                                <div class="input-group">
                                                    {!! Form::email('display_email',null,
                                                        ['class' => 'form-control','id'=> 'email','aria-label' => 'Text input with dropdown button']) !!}
                                                    <div class="input-group-append red-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i
                                                                    class="fas fa-lock"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Public</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Members</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">All Members</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Only Me</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has('display_email'))
                                                    {{ $errors->first('display_email') }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            {{Form::label('proffesion', 'Proffesion', array('class' => 'col-sm-3 col-form-label'))}}
                                            <div class="col-sm-8 pl-0">
                                                <div class="input-group">
                                                    {!! Form::text('proffesion',null,
                                            ['class' => 'form-control','id'=> 'proffesion','aria-label' => 'Text input with dropdown button']) !!}
                                                    <div class="input-group-append green-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i
                                                                    class="fas fa-user-friends"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Public</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Members</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">All Members</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Only Me</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 pl-0">
                                                <span class="view">View</span>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            {{Form::label('gender', 'Gender', array('class' => 'col-sm-3 col-form-label'))}}
                                            <div class="col-sm-6 pl-0">
                                                <div class="input-group flex-nowrap">
                                                    <div class="custom_select">
                                                        {!! Form::select('gender',['' => 'Select','f' => 'Female', 'm' => 'Male'],null,
                                                            ['class' => 'form-control','id'=> 'gender']) !!}
                                                    </div>

                                                    <div class="input-group-append blue-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i
                                                                    class="fas fa-globe-asia"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Public</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Members</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">All Members</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Only Me</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has('gender'))
                                                    {{ $errors->first('gender') }}
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            {{Form::label('country', 'Country', array('class' => 'col-sm-3 col-form-label'))}}
                                            <div class="col-sm-6 pl-0">
                                                <div class="input-group flex-nowrap">
                                                    <div class="custom_select">
                                                        {!! Form::select('country',['' => 'Select','UK' => 'UK', 'RU' => 'RU','IT' => 'UK'],null,
                                                         ['class' => 'form-control','id'=> 'country']) !!}
                                                    </div>

                                                    <div class="input-group-append blue-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i
                                                                    class="fas fa-globe-asia"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Public</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Members</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">All Members</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Only Me</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="col-sm-3 col-form-label">Data of Birth</label>

                                            <div class="col-sm-8 pl-0">
                                                <div class="d-flex">
                                                    <div class="col-2 p-0">
                                                        {!! Form::text('day',null,
                                           ['class' => 'form-control','id'=> 'day','placeholder' => 'DD']) !!}
                                                    </div>
                                                    <div class="col-3 p-0">
                                                        <div class="input-group">
                                                            {!! Form::text('month',null,
                                            ['class' => 'form-control','id'=> 'month','placeholder' => 'MM','aria-label' => 'Text input with dropdown button']) !!}
                                                            <div class="input-group-append green-cl">
                                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false"><i
                                                                            class="fas fa-user-friends"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">
                                                                        <i class="fas fa-globe-asia icon-blue"></i>
                                                                        <span class="name">Public</span>
                                                                    </a>
                                                                    <a class="dropdown-item active" href="#">
                                                                        <i class="fas fa-user-friends icon-green"></i>
                                                                        <span class="name">Members</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="#">
                                                                        <i class="fas fa-user-friends icon-purple"></i>
                                                                        <span class="name">All Members</span>
                                                                    </a>

                                                                    <a class="dropdown-item" href="#">
                                                                        <i class="fas fa-lock icon-red"></i>
                                                                        <span class="name">Only Me</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 align-self-center">
                                                        <span class="view">View</span>
                                                    </div>
                                                    <div class="col-5 p-0">
                                                        <div class="input-group">
                                                            {!! Form::text('year',null,
                                                                    ['class' => 'form-control','id'=> 'year','placeholder' => 'YYYY','aria-label' => 'Text input with dropdown button']) !!}
                                                            <div class="input-group-append red-cl">
                                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                                        type="button" data-toggle="dropdown"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false"><i
                                                                            class="fas fa-lock"></i></button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">
                                                                        <i class="fas fa-globe-asia icon-blue"></i>
                                                                        <span class="name">Public</span>
                                                                    </a>
                                                                    <a class="dropdown-item active" href="#">
                                                                        <i class="fas fa-user-friends icon-green"></i>
                                                                        <span class="name">Members</span>
                                                                    </a>
                                                                    <a class="dropdown-item" href="#">
                                                                        <i class="fas fa-user-friends icon-purple"></i>
                                                                        <span class="name">All Members</span>
                                                                    </a>

                                                                    <a class="dropdown-item" href="#">
                                                                        <i class="fas fa-lock icon-red"></i>
                                                                        <span class="name">Only Me</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center group-for-tags">
                                            {{Form::label('displaytags', 'Tags', array('class' => 'col-sm-3 col-form-label'))}}
                                            <div class="col-sm-8 pl-0">
                                                <div class="input-group">
                                                    {!! Form::text('tags',null,
                                                                    ['class' => 'form-control tags_custom','id'=> 'displaytags','data-role' => 'tagsinput','aria-label' => 'Text input with dropdown button']) !!}
                                                    <div class="input-group-append blue-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i
                                                                    class="fas fa-globe-asia"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Public</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Members</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">All Members</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Only Me</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            {{Form::label('socialMedia', 'Social Media', array('class' => 'col-sm-3 col-form-label'))}}
                                            <div class="col-sm-8 pl-0 social-medias-links">
                                                <div class="input-group">
                                                    <div class="input-group-append blue-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i
                                                                    class="fas fa-globe-asia"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Public</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Members</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">All Members</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Only Me</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    {!! Form::text('social_media[]', null, ['class' => 'form-control','id' => 'socialMedia','placeholder' => 'Profile URL','aria-label' => 'Text input with dropdown button']) !!}
                                                    <div class="input-group-append blue-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i
                                                                    class="fas fa-globe-asia"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Public</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Members</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">All Members</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Only Me</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="input-group mt-4">
                                                    <div class="input-group-append yellow-cl">
                                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i
                                                                    class="fas fa-user-secret"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-globe-asia icon-blue"></i>
                                                                <span class="name">Public</span>
                                                            </a>
                                                            <a class="dropdown-item active" href="#">
                                                                <i class="fas fa-user-friends icon-green"></i>
                                                                <span class="name">Members</span>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-user-friends icon-purple"></i>
                                                                <span class="name">All Members</span>
                                                            </a>

                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-lock icon-red"></i>
                                                                <span class="name">Only Me</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-sm-1 pl-0 align-self-end socialmedia-add">
                                                <span class="add-icon"><i class="fas fa-plus"></i></span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-xl-5 offset-xl-1">
                                <div class="settings-right">
                                    {!! BBmediaButton('site_image',null,['html'=>'<div class="images-name d-flex mb-4">
                                        <div class="col-11 pr-0">
                                            <div class="image">
                                                <img class="image-main" src="/public/images/girl-cover.jpg" alt="">
                                                <div class="site-image">
                                                    <span class="btnsettingsModal  media-modal-open">Site Image</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 p-0">
                                        </div>
                                    </div>
                                    ']) !!}

                                    <div class="maps d-flex">
                                        <div class="col-11 pr-0">
                                            <div class="map-search">
                                                <div>
                                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.72810776133!2d-0.24168051295924747!3d51.52877184056342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2s!4v1534333971160"
                                                            width="100%" height="350" frameborder="0"
                                                            style="border:0" allowfullscreen></iframe>
                                                </div>
                                                <div class="location-input">
                                                    <div class="input-group">
                                                        <div class="input-group-append none-cl">
                                                            <button class="btn btn-outline-secondary"
                                                                    type="button">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </button>

                                                        </div>
                                                        {{Form::search('location', $value = null, $attributes = array('class' => 'form-control','placeholder' => 'Enter Location'))}}
                                                        <div class="input-group-append blue-light-cl">
                                                            <button class="btn btn-outline-secondary" type="button">
                                                                <i class="fas fa-crosshairs"></i>
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-1 p-0">
                                            <div class="input-group-append blue-cl">
                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                        type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i
                                                            class="fas fa-lock"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-globe-asia icon-blue"></i>
                                                        <span class="name">Public</span>
                                                    </a>
                                                    <a class="dropdown-item active" href="#">
                                                        <i class="fas fa-user-friends icon-green"></i>
                                                        <span class="name">Members</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-user-friends icon-purple"></i>
                                                        <span class="name">All Members</span>
                                                    </a>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-lock icon-red"></i>
                                                        <span class="name">Only Me</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{Form::submit('Save',  array('class' => 'btn btn-success btn-block save_button'))}}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
{!! BBextraHtml() !!}
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
{!! BBscriptsHook() !!}
<!-- ================== END FOOTER PAGE LEVEL JS ================== -->
</body>
</html>