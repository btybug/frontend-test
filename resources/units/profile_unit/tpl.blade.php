@php
    $pages = $page->author->frontPages()->orderBy('sorting')->get();
@endphp
<div id="header" class="header navbar-default">
    <!-- begin navbar-header -->
    <div class="navbar-header">
        <a href="#" class="navbar-brand">
            <i class="fas fa-bars"></i> <span class="navbar-logo"></span> <b>BtyBug</b>
        </a>
    </div>
    <div class="head-left-menu">
        <a href="javascript:void(0);" class="close"><i class="fas fa-times"></i></a>
        <div class="content">
            <ul class="menu-item">
                <li class="item"><a href="#">item 1</a></li>
                <li class="item"><a href="#">item 2</a></li>
                <li class="item"><a href="#">item 3</a></li>
            </ul>
        </div>

    </div>
    <!-- end navbar-header -->

    <!-- begin header-nav -->
    <ul class="navbar-nav navbar-right">
        <li>
            <form class="navbar-form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter keyword" />
                    <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </li>

        <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                <i class="fas fa-envelope"></i>
                <span class="label">5</span>
            </a>
            <ul class="dropdown-menu media-list dropdown-menu-right">
                <li class="dropdown-header">MESSAGES (5)</li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <i class="fa fa-bug media-object bg-silver-darker"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
                            <div class="text-muted f-s-11">3 minutes ago</div>
                        </div>
                    </a>
                </li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <img src="/public/minicms/images/user-1.jpg" class="media-object" alt="" />
                            <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading">John Smith</h6>
                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                            <div class="text-muted f-s-11">25 minutes ago</div>
                        </div>
                    </a>
                </li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <img src="/public/minicms/images/user-2.jpg" class="media-object" alt="" />
                            <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading">Olivia</h6>
                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                            <div class="text-muted f-s-11">35 minutes ago</div>
                        </div>
                    </a>
                </li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <i class="fa fa-plus media-object bg-silver-darker"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading"> New User Registered</h6>
                            <div class="text-muted f-s-11">1 hour ago</div>
                        </div>
                    </a>
                </li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <i class="fa fa-envelope media-object bg-silver-darker"></i>
                            <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading"> New Email From John</h6>
                            <div class="text-muted f-s-11">2 hour ago</div>
                        </div>
                    </a>
                </li>
                <li class="dropdown-footer text-center">
                    <a href="#">View more</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                <i class="fa fa-bell"></i>
                <span class="label">5</span>
            </a>
            <ul class="dropdown-menu media-list dropdown-menu-right">
                <li class="dropdown-header">NOTIFICATIONS (5)</li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <i class="fa fa-bug media-object bg-silver-darker"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
                            <div class="text-muted f-s-11">3 minutes ago</div>
                        </div>
                    </a>
                </li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <img src="/public/minicms/images/user-1.jpg" class="media-object" alt="" />
                            <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading">John Smith</h6>
                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                            <div class="text-muted f-s-11">25 minutes ago</div>
                        </div>
                    </a>
                </li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <img src="/public/minicms/images/user-2.jpg" class="media-object" alt="" />
                            <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading">Olivia</h6>
                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                            <div class="text-muted f-s-11">35 minutes ago</div>
                        </div>
                    </a>
                </li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <i class="fa fa-plus media-object bg-silver-darker"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading"> New User Registered</h6>
                            <div class="text-muted f-s-11">1 hour ago</div>
                        </div>
                    </a>
                </li>
                <li class="media">
                    <a href="javascript:;">
                        <div class="media-left">
                            <i class="fa fa-envelope media-object bg-silver-darker"></i>
                            <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading"> New Email From John</h6>
                            <div class="text-muted f-s-11">2 hour ago</div>
                        </div>
                    </a>
                </li>
                <li class="dropdown-footer text-center">
                    <a href="{!! route('mini_communications_notifications') !!}">View more</a>
                </li>
            </ul>
        </li>
        <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/public/minicms/images/user-13.jpg" alt="" />
                <span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
                <a href="javascript:;" class="dropdown-item">Calendar</a>
                <a href="javascript:;" class="dropdown-item">Setting</a>
                <div class="dropdown-divider"></div>
                <a href="javascript:;" class="dropdown-item">Log Out</a>
            </div>
        </li>
    </ul>
    <!-- end header navigation right -->
</div>
    <section id="top-navigation" class="container-fluid nopadding">
            <div class="row nopadding ident ui-bg-color01">
                <div class="col-md-4 vc-photo photo nopadding">
                    <div>
                        <a href="index.html">
                            <img src="https://neuethemes.net/preview/html/gridus/html/assets/custom/2.2.2/images/layouts/samuel/userpics/userpic01.jpg" alt="">
                        </a>
                    </div>

                </div>

                <div class="col-md-8 vc-name nopadding">
                    <div>
                        <div class="row nopadding name position">
                            <div class="col-md-10" >
                                <div class="name-title">
                                    <h1 class="font-accident-two-extralight">Samuel Anderson</h1>
                                </div>
                                <div class="col-md-10 position-title">

                                    <section class="cd-intro">
                                        <h2 class="cd-headline clip is-full-width font-accident-two-light d-flex align-items-center">
                                            <span>The experienced </span>
                                            <span class="cd-words-wrapper">
                           <b class="is-visible">UI/UX Designer</b>
                           <b>Web Designer</b>
                           <b>Photographer</b>
                        </span>
                                        </h2>
                                    </section>

                                </div>
                            </div>
                            <div class="col-md-2 nopadding name-pdf">
                                <div class="d-flex flex-column justify-content-around">
                                    <div class="name-pdf d-flex">
                                        <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 ">
                                            <i class="fas fa-user-plus"></i></i>
                                        </a>

                                        <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 ">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                    </div>
                                    <div class="pdf d-flex">
                                        <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 ">
                                            <i class="fas fa-user-friends"></i>
                                        </a>
                                        <a href="#" class="hvr-sweep-to-right d-flex justify-content-center align-items-center w-100 ">
                                            <i class="fas fa-chart-line"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="ux-tabs">
                            <div class="row nopadding">
                                <div class="col-10 nopadding">
                                    <ul class="ux-tabs__headers">
                                        @if(count($pages))
                                            @php $color = 1; @endphp
                                            @foreach($pages as $k => $p)
                                                @if($color > 6)
                                                    @php $color = 1; @endphp
                                                @endif

                                                <li class="ux-tabs__header ui-menu-color0{{ $color }}">
                                                    <a href="{!! url($p->url) !!}" class="hvr-sweep-to-bottom d-flex justify-content-center align-items-center w-100 flex-column">
                                                        @if($p->icon)
                                                            <i class="{{ $p->icon }}" aria-hidden="true"></i>
                                                        @else
                                                            <i class="fas fa-align-justify" aria-hidden="true"></i>
                                                        @endif
                                                        <span>{{ $p->title }}</span>
                                                    </a>
                                                </li>
                                                @php $color++; @endphp
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="col-2 nopadding">
                                    <div class="ux-tabs__dropdown">
                                        More tabs <i class="fas fa-caret-down"></i><strong>(<span class="ux-tabs__dropdown-count"></span>)</strong>
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
        </section>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'headlines.min.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}