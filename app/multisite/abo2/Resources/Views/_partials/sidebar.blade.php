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
            <li><a href="{!! url('/my-account') !!}"><i class="fa fa-th-large"></i>Dashboard</a></li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-medkit"></i>
                    <span>My Account</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('mini_account_settings') !!}">Settings</a></li>
                    <li><a href="{!! route('mini_account_general') !!}">General</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-image"></i>
                    <span>Media</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('mini_media') !!}">Drive</a></li>
                    <li><a href="{!! route('mini_media_settings') !!}">Settings</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-gem"></i>
                    <span>Extra</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('mini_account_forms') !!}">Forms <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="{!! route('mini_extra_gears') !!}">Gear <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="{!! route('mini_extra_plugins') !!}">Plugins <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                </ul>
            </li>
            {{--New added--}}{{--
            <li class="has-sub">
                <a href="{!! route('mini_account_forms') !!}">
                    <b class="caret"></b>
                    <i class="fa fa-align-justify"></i>
                    <span>Forms</span>
                </a>
            </li>--}}

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-sitemap"></i>
                    <span>My Site</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('mini_my_site_btybug') !!}">Bty bug <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="{!! route('mini_my_site_more_sites') !!}">More sites <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="far fa-comments"></i>
                    <span>Communications </span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('mini_communications_messages') !!}">Messages <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="{!! route('mini_communications_notifications') !!}">Notifications <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="{!! route('mini_communications_reviews') !!}">Reviews <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fas fa-cookie-bite"></i>
                    <span>Btybug</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{!! route('mini_btybug_cv') !!}">CV <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="{!! route('mini_btybug_jobs') !!}">Jobs <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="{!! route('mini_btybug_market') !!}">Market <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="{!! route('mini_btybug_blog') !!}">Blog <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                </ul>
            </li>

            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>