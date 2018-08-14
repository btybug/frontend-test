<div class="d-flex flex-column profiles-navbar">
    <div class="footerTabs">
        <div class="row">
            <div class="col-md-12 col-lg-9 pr-0 order-2 order-md-2 order-lg-1">
                <div class=" nav nav-tabs left " id="myTab" role="tablist">
                    <div class=" row">
                        <div class="nav-item col-3">
                            <a class="nav-link active" id="social-tab" data-toggle="tab" href="#social" role="tab"
                               aria-controls="social" aria-selected="true"><span class="mr-4"><i
                                            class="fas fa-home"></i></span>My Sites</a>
                        </div>
                        <div class="nav-item col-3">
                            <a class="nav-link" id="business-tab" data-toggle="tab" href="#business" role="tab"
                               aria-controls="business" aria-selected="false"><span class="mr-4"><i class="fas fa-cube"></i></span>Manage</a>
                        </div>
                        <div class="nav-item col-3">
                            <a class="nav-link" id="business3-tab" data-toggle="tab" href="#business3" role="tab"
                               aria-controls="business3" aria-selected="false"><span class="mr-4"><i class="fas fa-cube"></i></span>Extra</a>
                        </div>
                        <div class="nav-item col-3">
                            <a class="nav-link" id="business4-tab" data-toggle="tab" href="#business4" role="tab"
                               aria-controls="business" aria-selected="false"><span class="mr-4"><i class="fas fa-cube"></i></span>More</a>
                        </div>
                    </div>
                    <div class="search">
                        <a href="#">
                            <span>Search</span>
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="social" role="tabpanel" aria-labelledby="social-tab">
                        <ul class="d-flex flex-wrap ">
                            <li class="active"><a href="#" class="d-flex flex-column justify-content-center align-items-center">
                                    <span><i class="fas fa-user"></i></span>
                                    <span class="name">Social</span>
                                </a>
                            </li>
                            <li><a href="#"
                                   class="d-flex flex-column justify-content-center align-items-center"><span><i class="fas fa-briefcase"></i></span><span class="name">Business</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="business" role="tabpanel" aria-labelledby="business-tab">2</div>
                    <div class="tab-pane fade" id="business3" role="tabpanel" aria-labelledby="business3-tab">
                        <ul class="d-flex flex-wrap ">
                            <li class="active"><a href="{!! route('mini_account_forms') !!}" class="d-flex flex-column justify-content-center align-items-center">
                                    <span><i class="fa fa-align-left"></i></span>
                                    <span class="name">Forms</span>
                                </a>
                            </li>
                            <li class="active"><a href="{!! route('mini_extra_gears') !!}" class="d-flex flex-column justify-content-center align-items-center">
                                    <span><i class="fa fa-columns"></i></span>
                                    <span class="name">Gear</span>
                                </a>
                            </li>
                            <li class="active"><a href="{!! route('mini_extra_plugins') !!}" class="d-flex flex-column justify-content-center align-items-center">
                                    <span><i class="fa fa-plug"></i></span>
                                    <span class="name">Plugins</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="business4" role="tabpanel" aria-labelledby="business4-tab">4</div>
                </div>
            </div>
            <div class="col-md-12 col-lg-3 pl-0 order-1 order-md-1">
                <div class="user-footer">
                    <ul class="head row align-items-center">
                        <li class="col-8"><span class="user-name">Rania Dewel</span></li>
                        <li class="log_out col-4"><a href="{!! url('logout') !!}">Log out</a></li>
                    </ul>
                    <div class="user-img-links row">
                        <div class="col-md-7 col-lg-12 col-xl-7 col-7 pl-0">
                            <div class="img">
                                <img src="/public/images/girl-cover.jpg" alt="girl">
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-12 col-xl-5 col-5">
                            <ul class="links">
                                <li><a href="{!! url('my-account') !!}"><i class="fas fa-user"></i><span>Account</span></a></li>
                                <li><a href="{!! url('my-account/favourites') !!}"><i class="far fa-heart"></i><span>Favorite</span></a></li>
                                <li><a href="{!! url('my-account/media') !!}"><i class="fab fa-hubspot"></i><span>Media</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="profile-footer d-flex justify-content-end">
        <div class="left justify-content-between align-items-center d-flex">
            <div class="create d-flex align-items-center">
                <span class="add-icon"><i class="fas fa-plus"></i></span>
                <span class="heart"><i class="fas fa-search"></i></span>
            </div>
            <div class="logo-name">
                <div>
                    <img src="/public/images/profile-footer-logo.png" alt="logo" class="black-logo">
                    <img src="/public/images/profile-footer-logo-white.png" alt="logo" class="white-logo">
                </div>

            </div>
            <div class="icons d-flex">
                <a href="#" class="user-mobile"><span class="user-mobile-icon d-flex justify-content-center align-items-center"><i class="far fa-user"></i></span></a>
                <a href="{!! url('/my-account/communications/messages') !!}" class="message">

                    <span class="count d-flex justify-content-center align-items-center">3</span>
                </a>
            </div>
        </div>
        <div class="right d-flex align-items-center">
            <div class="icon d-flex align-items-center">
            <span>
                <i class="fas fa-angle-left"></i>
            </span>

            </div>
            <div class="image" id="click-image">
                <a href="javscript:void(0);">
                    <img src="/public/images/girl-cover.jpg" alt="user">
                </a>

            </div>
        </div>
    </div>
</div>






{!! BBstyle($_this->path.DS.'css'.DS.'owl.carousel.min.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'owl.theme.default.min.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}


{!! BBscript($_this->path.DS.'js'.DS.'owl.carousel.min.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}
