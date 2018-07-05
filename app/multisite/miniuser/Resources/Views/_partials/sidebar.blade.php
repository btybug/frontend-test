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
            <li><a href="{!! route('mini_page_lists') !!}"><i class="fa fa-pencil-alt"></i>Pages</a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>