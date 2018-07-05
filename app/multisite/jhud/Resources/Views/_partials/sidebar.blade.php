<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="{!!url('public/minicms/images/user-13.jpg')!!}" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        {!! $user->username !!}
                        <small>Front end developer</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                    <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                    <li><a href="{!! url('/logout') !!}"><i class="fa fa-sing-out"></i>Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Dashboard v1</a></li>
                    <li><a href="#">Dashboard v2</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-th-large"></i>
                    <span>Pages</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('mini_page_lists') !!}">Lists</a></li>
                    <li><a href="#">Create</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-hdd"></i>
                    <span>Email</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Inbox</a></li>
                    <li><a href="#">Compose</a></li>
                    <li><a href="#">Detail</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fab fa-simplybuilt"></i>
                    <span>Widgets <span class="label label-theme m-l-5">NEW</span></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-gem"></i>
                    <span>UI Elements <span class="label label-theme m-l-5">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">General <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="#">Typography</a></li>
                    <li><a href="#">Tabs & Accordions</a></li>
                    <li><a href="#">Unlimited Nav Tabs</a></li>
                    <li><a href="#">Modal & Notification <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="#">Widget Boxes</a></li>
                    <li><a href="#">Media Object</a></li>
                    <li><a href="#">Buttons  <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="#">Icons</a></li>
                    <li><a href="#">Simple Line Icons</a></li>
                    <li><a href="#">Ionicons</a></li>
                    <li><a href="#">Tree View</a></li>
                    <li><a href="#">Language Bar & Icon</a></li>
                    <li><a href="#">Social Buttons</a></li>
                    <li><a href="#">Intro JS</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fab fa-simplybuilt"></i>
                    <span>Bootstrap 4 <span class="label label-theme m-l-5">NEW</span></span>
                </a>
            </li>
            <li class="has-sub active">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-list-ol"></i>
                    <span>Form Stuff <span class="label label-theme m-l-5">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Form Elements <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li class="active"><a href="#">Form Plugins <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="#">Form Slider + Switcher</a></li>
                    <li><a href="#">Form Validation</a></li>
                    <li><a href="#">Wizards</a></li>
                    <li><a href="#">Wizards + Validation</a></li>
                    <li><a href="#">WYSIWYG</a></li>
                    <li><a href="#">X-Editable</a></li>
                    <li><a href="#">Multiple File Upload</a></li>
                    <li><a href="#">Summernote</a></li>
                    <li><a href="#">Dropzone</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-table"></i>
                    <span>Tables</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Basic Tables</a></li>
                    <li class="has-sub">
                        <a href="javascript:;"><b class="caret pull-right"></b> Managed Tables</a>
                        <ul class="sub-menu">
                            <li><a href="#">Default</a></li>
                            <li><a href="#">Autofill</a></li>
                            <li><a href="#">Buttons</a></li>
                            <li><a href="#">ColReorder</a></li>
                            <li><a href="#">Fixed Column</a></li>
                            <li><a href="#">Fixed Header</a></li>
                            <li><a href="#">KeyTable</a></li>
                            <li><a href="#">Responsive</a></li>
                            <li><a href="#">RowReorder</a></li>
                            <li><a href="#">Scroller</a></li>
                            <li><a href="#">Select</a></li>
                            <li><a href="#">Extension Combination</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-star"></i>
                    <span>Front End</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#" target="_blank">One Page Parallax</a></li>
                    <li><a href="#" target="_blank">Blog</a></li>
                    <li><a href="#" target="_blank">Forum</a></li>
                    <li><a href="#" target="_blank">E-Commerce</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-envelope"></i>
                    <span>Email Template</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">System Template</a></li>
                    <li><a href="#">Newsletter Template</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-chart-pie"></i>
                    <span>Chart</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Flot Chart</a></li>
                    <li><a href="#">Morris Chart</a></li>
                    <li><a href="#">Chart JS</a></li>
                    <li><a href="#">d3 Chart</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-map"></i>
                    <span>Map</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Vector Map</a></li>
                    <li><a href="#">Google Map</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-image"></i>
                    <span>Gallery</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Gallery v1</a></li>
                    <li><a href="#">Gallery v2</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-cogs"></i>
                    <span>Page Options</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Blank Page</a></li>
                    <li><a href="#">Page with Footer</a></li>
                    <li><a href="#">Page without Sidebar</a></li>
                    <li><a href="#">Page with Right Sidebar</a></li>
                    <li><a href="#">Page with Minified Sidebar</a></li>
                    <li><a href="#">Page with Two Sidebar</a></li>
                    <li><a href="#">Page with Line Icons</a></li>
                    <li><a href="#">Page with Ionicons</a></li>

                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-gift"></i>
                    <span>Extra</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Timeline</a></li>
                    <li><a href="#">Coming Soon Page</a></li>
                    <li><a href="#">Search Results</a></li>
                    <li><a href="#">Invoice</a></li>
                    <li><a href="#">404 Error Page</a></li>
                    <li><a href="#">Profile Page</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-key"></i>
                    <span>Login & Register</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register v3</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-cubes"></i>
                    <span>Version <span class="label label-theme m-l-5">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="javascript:;">HTML</a></li>
                    <li><a href="#">AJAX</a></li>
                    <li><a href="#">ANGULAR JS</a></li>
                    <li><a href="#">ANGULAR JS 6 <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>

                    <li><a href="#">MATERIAL DESIGN</a></li>
                    <li><a href="#">APPLE DESIGN</a></li>
                    <li><a href="#">TRANSPARENT DESIGN <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-medkit"></i>
                    <span>Helper</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Predefined CSS Classes</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-align-left"></i>
                    <span>Menu Level</span>
                </a>
                <ul class="sub-menu">
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            Menu 1.1
                        </a>
                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    Menu 2.1
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="javascript:;">Menu 3.1</a></li>
                                    <li><a href="javascript:;">Menu 3.2</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:;">Menu 2.2</a></li>
                            <li><a href="javascript:;">Menu 2.3</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">Menu 1.2</a></li>
                    <li><a href="javascript:;">Menu 1.3</a></li>
                </ul>
            </li>
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>