
<div class="d-flex flex-column profiles-navbar">
    <div class="footerTabs">
        <div class="row">
            <div class="col-md-9 p-0 order-2 order-md-1">
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
                    <div class="tab-pane fade" id="business3" role="tabpanel" aria-labelledby="business3-tab">3</div>
                    <div class="tab-pane fade" id="business4" role="tabpanel" aria-labelledby="business4-tab">4</div>
                </div>
            </div>
            <div class="col-md-3 p-0 order-1 order-md-2">
                <div class="user-footer">
                    <ul class="head row align-items-center">
                        <li class="col-8"><span class="user-name">Rania Dewel</span></li>
                        <li class="log_out col-4"><a href="{!! url('logout') !!}">Log out</a></li>
                    </ul>
                    <div class="user-img-links row">
                        <div class="col-7 pl-0">
                            <div class="img">
                                <img src="/public/images/girl-cover.jpg" alt="girl">
                            </div>
                        </div>
                        <div class="col-5">
                            <ul class="links">
                                <li><a href="{!! url('my-account') !!}"><i class="fas fa-user"></i><span>Account</span></a></li>
                                <li><a href=""><i class="far fa-heart"></i><span>Favorite</span></a></li>
                                <li><a href="{!! url('my-account/media') !!}"><i class="fab fa-hubspot"></i><span>Media</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="profile-favorite">
        <div class="nav nav-tabs" id="myTabFavorite" role="tablist">
            <div class="col-xl-5 col-sm-12 pl-0">
                <div class="favoritetabs-carousel owl-carousel owl-theme">
                    <div class="nav-item">
                        <a class="nav-link active" id="socialfav-tab" data-toggle="tab" href="#socialfav" role="tab"
                           aria-controls="socialfav" aria-selected="true"><span class="mr-4"><i class="fas fa-user"></i></span>Social</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" id="businessfav-tab" data-toggle="tab" href="#businessfav" role="tab"
                           aria-controls="businessfav" aria-selected="false"><span class="mr-4"><i
                                        class="fas fa-briefcase"></i></span>Business</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" id="businessfav3-tab" data-toggle="tab" href="#businessfav3" role="tab"
                           aria-controls="businessfav" aria-selected="false"><span class="mr-4"><i
                                        class="fas fa-briefcase"></i></span>Item3</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" id="businessfav4-tab" data-toggle="tab" href="#businessfav4" role="tab"
                           aria-controls="businessfav" aria-selected="false"><span class="mr-4"><i
                                        class="fas fa-briefcase"></i></span>Item4</a>
                    </div>
                </div>
            </div>
            <div class="search">
                <input type="search" class="form-control" placeholder="Search">
            </div>

        </div>
        <div class="tab-content" id="myTabFavoriteContent">
            <div class="tab-pane fade show active" id="socialfav" role="tabpanel" aria-labelledby="socialfav-tab">
                <div class="row ">
                    <div class="col-11">
                        <div class="favorite-users">
                            <div class="favorite-carousel owl-carousel owl-theme">
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/fav-user-img.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="item text-center">
                                    <img src="/public/images/favorite-user.png" alt="">
                                    <div class="name d-flex align-items-center">
                                        <span>Trevor Hansens</span>
                                        <span class="icon">
                                       <i class="fas fa-times"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="favorite-icon col-1">
                        <div class="heart-icon">
                            <span><i class="fas fa-heartbeat"></i></span>
                        </div>
                    </div>
                </div>


            </div>
            <div class="tab-pane fade" id="businessfav" role="tabpanel" aria-labelledby="businessfav-tab">2</div>
            <div class="tab-pane fade" id="businessfav3" role="tabpanel" aria-labelledby="businessfav3-tab">33</div>
            <div class="tab-pane fade" id="businessfav4" role="tabpanel" aria-labelledby="businessfav4-tab">44</div>
        </div>
    </div>

    <div class="profile-footer d-flex justify-content-end">
        <div class="left justify-content-between align-items-center">
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
