@extends('btybug::layouts.static_pages')
@section('content')
    <div class="site-manage-content">
        <div class="content-pages container-fluid">
            <div class="row">
                <div class="col-md-2 pl-0">
                    <div class="menu">
                        <ul>
                            <li><a href="{!! url('profiles/social/general') !!}">
                                    <span><i class="fab fa-buromobelexperte"></i></span>General</a>
                            </li>
                            <li class="active"><a href="{!! url('profiles/social/quick-bugs') !!}">
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
                        <div class="bug-something">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="link-bug-something">
                                        <button type="button" class="btn btn-link " data-toggle="modal"
                                                data-target="#bugModalCenter">
                                            <i class="fas fa-marker"></i>
                                            <span>Bug Something</span>
                                        </button>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="formGroupExampleInput">
                                    </div>
                                </div>
                            </div>
                            <div class="bugsContent">
                                {{--@include('manage::frontend.pages._partials.bug_render')--}}
                                <div class="new_post d-flex">
                                    <div class="post">
                                        <div class="head-rania d-flex">
                                            <div class="aug">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <div class="reg-times d-flex flex-column align-items-center">
                                                                <span>21</span>
                                                                <span>Aug</span>
                                                                <i class="far fa-clock"></i>
                                                                <span>10:17</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 p-0">
                                                            <div class="images">
                                                                <img src="/public/images/girl2.png" alt="">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-9">
                                                            <h4>Rania Davan</h4>
                                                            <span>& Johan Smith , Jan Wim Jack Wilth ...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="travel d-flex flex-column justify-content-center">
                                                <div class="traveling">
                                                    <span class="d-flex"><i class="fas fa-globe-americas"></i>Traveling</span>
                                                    <hr>
                                                </div>
                                                <div class="by-train">
                                                    <span><i class="fas fa-train"></i>By Train</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="head-content">
                                            <p>
                                                I had a great time with you <br>
                                                I want to see you again <br>
                                                Thank you for your nice conversation with <br>
                                                me during your stay <br>
                                                Many many thanks
                                            </p>
                                            <div>
                                                <i class="fas fa-thumbtack"></i>
                                            </div>

                                        </div>
                                        <div class="post-content">
                                            <div class="at d-flex">
                                                <p><i class="fas fa-at"></i>
                                                    Johan Smith, Jack Wilth, Rania Dewell... </p>
                                            </div>

                                            <div class="hash d-flex">
                                                <p><i class="fas fa-hashtag"></i>
                                                    <span>Friendship</span>
                                                    <i class="fas fa-hashtag"></i>
                                                    <span>Friends</span>
                                                    <i class="fas fa-hashtag"></i>
                                                    <span>Love</span></p>
                                            </div>
                                        </div>
                                        <div class="post-map">
                                            <div class="post-slider">
                                                <div class="mySlides">
                                                    <img src="https://images.pexels.com/photos/46710/pexels-photo-46710.jpeg?auto=compress&cs=tinysrgb&h=350"
                                                         style="width:100%">
                                                </div>

                                                <div class="mySlides">
                                                    <div class="numbertext">2 / 6</div>
                                                    <img src="https://www.rencontres-arles.com/files/media_file_2106.jpg"
                                                         style="width:100%">
                                                </div>

                                                <div class="mySlides">
                                                    <div class="numbertext">3 / 6</div>
                                                    <img src="https://picjumbo.com/wp-content/uploads/alone-with-his-thoughts_free_stock_photos_picjumbo_HNCK9089-1080x720.jpg"
                                                         style="width:100%">
                                                </div>

                                                <div class="mySlides">
                                                    <div class="numbertext">4 / 6</div>
                                                    <img src="http://www.abc.net.au/news/image/9667872-3x2-700x467.jpg"
                                                         style="width:100%">
                                                </div>

                                                <div class="mySlides">
                                                    <div class="numbertext">5 / 6</div>
                                                    <img src="https://cdn4.techly.com.au/wp-content/uploads/2018/03/techly-smartphone-camera-noise-799x423.jpg"
                                                         style="width:100%">
                                                </div>

                                                <a class="prev" onclick="plusSlides(-1)">❮</a>
                                                <a class="next" onclick="plusSlides(1)">❯</a>

                                                <div class="caption-container">
                                                    <p id="caption"></p>
                                                </div>

                                                <div class="tumb-post-slider">
                                                    <div class="column">
                                                        <img class="demo cursor"
                                                             src="https://images.pexels.com/photos/46710/pexels-photo-46710.jpeg?auto=compress&cs=tinysrgb&h=350"
                                                             style="width:100%" onclick="currentSlide(1)"
                                                             alt="The Woods">
                                                    </div>
                                                    <div class="column">
                                                        <img class="demo cursor"
                                                             src="https://www.rencontres-arles.com/files/media_file_2106.jpg"
                                                             style="width:100%" onclick="currentSlide(2)"
                                                             alt="Cinque Terre">
                                                    </div>
                                                    <div class="column">
                                                        <img class="demo cursor"
                                                             src="https://picjumbo.com/wp-content/uploads/alone-with-his-thoughts_free_stock_photos_picjumbo_HNCK9089-1080x720.jpg"
                                                             style="width:100%" onclick="currentSlide(3)"
                                                             alt="Mountains and fjords">
                                                    </div>
                                                    <div class="column">
                                                        <img class="demo cursor"
                                                             src="http://www.abc.net.au/news/image/9667872-3x2-700x467.jpg"
                                                             style="width:100%" onclick="currentSlide(4)"
                                                             alt="Northern Lights">
                                                    </div>
                                                    <div class="column">
                                                        <img class="demo cursor"
                                                             src="https://cdn4.techly.com.au/wp-content/uploads/2018/03/techly-smartphone-camera-noise-799x423.jpg"
                                                             style="width:100%" onclick="currentSlide(5)"
                                                             alt="Nature and sunrise">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="post-foot">
                                            <div class="post-foot-carousel owl-carousel owl-theme">
                                                <div class="item"><a href="" class="blue-cl-icon active">
                                                        <div class="line"></div>
                                                        <i class="fas fa-map-marker-alt"></i></a></div>
                                                <div class="item"><a href="" class="purple-cl-icon">
                                                        <div class="line"></div>
                                                        <i class="far fa-images"></i></a></div>
                                                <div class="item"><a href="" class="purple-cl-icon">
                                                        <div class="line"></div>
                                                        <i class="far fa-images"></i></a></div>
                                                <div class="item"><a href="" class="purple-cl-icon">
                                                        <div class="line"></div>
                                                        <i class="far fa-images"></i></a></div>
                                                <div class="item"><a href="" class="green-cl-icon">
                                                        <div class="line"></div>
                                                        <img src="/public/images/gif-icon.png"
                                                             alt=""></a></div>
                                                <div class="item"><a href="" class="blue-cl-icon">
                                                        <div class="line"></div>
                                                        <i class="fas fa-map-marker-alt"></i></a></div>
                                                <div class="item"><a href="" class="purple-cl-icon">
                                                        <div class="line"></div>
                                                        <i class="far fa-images"></i></a></div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="open-page no_open">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-comments-tab"
                                                   data-toggle="tab"
                                                   href="#nav-comments" role="tab" aria-controls="nav-comments"
                                                   aria-selected="true">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="name">Comments</span><span class="count">63</span>
                                                    </div>

                                                </a>
                                                <a class="nav-item nav-link share-link" id="nav-share-tab"
                                                   data-toggle="tab"
                                                   href="#nav-share" role="tab" aria-controls="nav-share"
                                                   aria-selected="false">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="name">Share</span><span class="count">190</span>
                                                    </div>
                                                </a>


                                                <a class="nav-item nav-link" id="nav-score-tab" data-toggle="tab"
                                                   href="#nav-score" role="tab" aria-controls="nav-score"
                                                   aria-selected="false">
                                                    <div class="d-flex justify-content-between">
                                                        <span class="name">Score</span><span
                                                                class="count">125,365</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </nav>
                                        <div class="tab-content d-flex" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-comments" role="tabpanel"
                                                 aria-labelledby="nav-comments-tab">
                                                <div class="main-comments-content d-flex flex-column h-100">
                                                    <div class="content-comments">
                                                        <div class="message1">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img src="/public/images/boy1.jpg" alt="">
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="name">
                                                                            <span>Sam Black</span>
                                                                            <span style="color: #909090">17h</span>
                                                                        </div>
                                                                        <div class="text">
                                                                            <p>Enjoy your time!</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="message2">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img src="/public/images/boy2.jpg" alt="">
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="name">
                                                                            <span>Johan Smith</span>
                                                                            <span style="color: #909090">21h</span>
                                                                        </div>
                                                                        <div class="text">
                                                                            <p>I head a great time with you <br>
                                                                                I want to see you again <br>
                                                                                Thank you for your nice conver- <br>
                                                                                sation with me during your stay
                                                                            </p>
                                                                        </div>
                                                                        <div class="reply">
                                                                            <span style="margin-right: 22px">Reply</span>
                                                                            <span>Light</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="message3">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <img src="/public/images/girl2.png" alt="">
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="name">
                                                                            <span>Rania Dewell</span>
                                                                            <span style="color: #909090">22h</span>
                                                                        </div>
                                                                        <div class="text">
                                                                            <p>Enjoy your time!</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="foot-comments d-flex">
                                                        <div class="write">
                                                            <div class="d-flex">
                                                                <img src="/public/images/girl2.png" alt="">
                                                                <input class="form-control form-control-lg" type="text"
                                                                       placeholder="Write a Comment ...">
                                                                <i class="far fa-smile"></i>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-share" role="tabpanel"
                                                 aria-labelledby="nav-share-tab">
                                                <div class="main-share-content">
                                                    <div class="head d-flex justify-content-between align-items-center">
                                                        <div class="rebug red_gradient-cl">
                                                            <button class="btn btn-link"><img
                                                                        src="/public/images/mushroom-icon.png"
                                                                        alt="icon"><span>Rebug</span></button>
                                                        </div>
                                                        <div class="social-also d-flex align-items-center">
                                                            <span class="text">Share also on:</span>
                                                            <a href="" class="facebook-link"><i class="fab fa-facebook-f"></i></a>
                                                            <a href="" class="twitter-link"><i class="fab fa-twitter"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-score" role="tabpanel"
                                                 aria-labelledby="nav-score-tab">3
                                            </div>
                                        </div>


                                    </div>
                                    <div class="action-bar" style="align-items: center">
                                        <div class="open-close_tab">
                                            <i class="fas fa-ellipsis-v" style="margin-top: 10px"></i>
                                        </div>
                                        <div class="d-flex" style="flex-direction: column; align-items: center">
                                            <i class="fas fa-plus"></i>
                                            <span style="color: #ffffff">125</span>
                                            <span style="color: #ffffff">K</span>
                                            <i class="fas fa-minus"></i>
                                        </div>
                                        <div class="d-flex" style="flex-direction: column; align-items: center">
                                            <i class="fas fa-share" style="line-height: 1.2"></i>
                                            <span style="margin-bottom: 25px">190</span>
                                            <i class="far fa-comment-alt" style="line-height: 1.2"></i>
                                            <span style="margin-bottom: 10px">63</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="bugModalCenter" tabindex="-1" role="dialog" aria-labelledby="bugModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bugModalLongTitle">Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="quick_bug">
                        <div class="main-bug">
                            <div class="head">
                                <div class="d-flex">
                                    <div class="title-icon d-flex align-items-center">
                                        <i class="far fa-newspaper"></i>
                                        <span>Quick Bug</span>
                                    </div>

                                    <div class="daily d-flex align-items-center">
<span class="icon">
                    <i class="far fa-calendar-alt"></i>
                </span>
                                        <span class="name">Daily</span>
                                        <a class="more" href="javascript:void(0);" id="dropdownBugHead"
                                           data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <span class="caret-down"><i class="fas fa-caret-down"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right"
                                             aria-labelledby="dropdownBugHead">
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                        class="fas fa-cog"></i><span
                                                        class="title">Item1</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                        class="fas fa-cog"></i><span
                                                        class="title">Item2</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                        class="fas fa-cog"></i><span
                                                        class="title">Item3</span></a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            {!! Form::open(['route'=>'front_page_social_bugit','id' => 'bugit_form']) !!}
                            <div class="main-content">
                                <div class="happy d-flex align-items-center">
                                    <div class="title">
                                        <textarea name="bugit" id="" cols="30" rows="10"
                                                  placeholder="Bug Sumething..."></textarea>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-smile"></i>
                                    </div>
                                </div>
                                <div id="added_costom_template" class="container-fluid">

                                </div>

                            </div>
                            <div class="bottom">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="icons">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="" class="hashtag-link active"><span
                                                            class="blue-cl-icon"><i
                                                                class="fas fa-hashtag"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="at-link active"><span
                                                            class="red-cl-icon"><i class="fas fa-at"></i></span></a>
                                            </li>
                                            <li class="list-inline-item"><a href="" class="sign-link active"><span
                                                            class="green-cl-icon"><i
                                                                class="fas fa-lira-sign"></i></span></a></li>
                                            <li class="list-inline-item"><a href="" class="youtube-link active"><span
                                                            class="orange-cl-icon"><i class="fab fa-youtube"></i></span></a>
                                            </li>
                                            <li class="list-inline-item"><a href="" class="images-link active"><span
                                                            class="purple-cl-icon"><i class="far fa-images"></i></span></a>
                                            </li>
                                            <li class="list-inline-item"><a href="" class="music-link active"><span
                                                            class="blue-cl-icon"><i class="fas fa-music"></i></span></a>
                                            </li>
                                            <li class="list-inline-item"><a href="" class="gif-link active"><span
                                                            class="red-light-cl-icon">
                                                    <img src="/public/images/gif-icon.png" alt="gif">
                                                </span>
                                                </a></li>
                                            <li class="list-inline-item"><a href="" class="location-link active"><span
                                                            class="blue-cl-icon"><i
                                                                class="fas fa-map-marker-alt"></i></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="right-col d-flex">
                                        <div class="d-flex align-items-center align-self-stretch bg-white">
                                            <div class="button">
                                                <button class="btn btn-link dropdown-toggle"
                                                        type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-lock"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-globe-asia icon-blue"></i>
                                                        <span class="name">Item1</span>
                                                    </a>
                                                    <a class="dropdown-item active" href="#">
                                                        <i class="fas fa-user-friends icon-green"></i>
                                                        <span class="name">Item2</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-user-friends icon-purple"></i>
                                                        <span class="name">Item3</span>
                                                    </a>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-lock icon-red"></i>
                                                        <span class="name">Item4</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="name">
                                                <span>Only Me</span>
                                            </div>


                                        </div>
                                        <div class="bug-it d-flex align-items-center align-self-stretch">
                                            <button class="btn btn-link bugit" data-dismiss="modal">Bug It</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="share-bug">
                            <div class="d-flex justify-content-end">
                                <div class="share-also">
                                    Share also on
                                </div>
                                <div class="facebook-share d-flex align-items-center">

                                    <label class="container custom-checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="" class="facebook-link"><i class="fab fa-facebook-f"></i></a>

                                </div>
                                <div class="twitter-share d-flex align-items-center">
                                    <label class="container custom-checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="" class="twitter-link"><i class="fab fa-twitter"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@stop
@section('menu')
    @include('btybug::_partials.front_user_menu',['items'=>[
    ['title'=>'Social','url'=>'profiles/social/genera'],
    ],'active'=>'Profiles'])
@stop

@section('css')
    <link rel="stylesheet" href="{!!url('public/libs/tagsinput/bootstrap-tagsinput.css')!!}">
    <link rel="stylesheet" href="{!!url('public/minicms/css/social.css?v='.rand(111,999))!!}">
    <link rel="stylesheet" href="{!!url('public/libs/owlcarousel/owl.carousel.css')!!}">
    <link rel="stylesheet" href="{!!url('public/libs/owlcarousel/owl.theme.default.css')!!}">
@stop
@section('js')

    <script src="{!!url('public/libs/tagsinput/bootstrap-tagsinput.min.js')!!}"></script>
    <script id="hidden-template-hashtag" type="text/x-custom-template">
        <div data-group="hashtag" class="form-group row align-items-center group-for-tags">
            <div class="left-group pl-0">
                <div class="input-group">
                    <div class="input-group-prepend blue_gradient-cl">
                        <button class="btn btn-outline-secondary"
                                type="button">
                            <i class="fas fa-hashtag"></i>
                        </button>
                    </div>
                    <input name="tags" type="text" class="form-control tags_bug_custom"
                           data-role="tagsinput" id="autocomplete">

                </div>
            </div>
            <div class="right-group">
                <a href="" class="del-icon" data-delgroup="del-hashtag"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </script>
    <script id="hidden-template-at" type="text/x-custom-template">
        <div data-group="at" class="form-group row align-items-center">
            <div class="left-group pl-0">
                <div class="input-group">
                    <div class="input-group-prepend red_gradient-cl">
                        <button class="btn btn-outline-secondary"
                                type="button">
                            <i class="fas fa-at"></i>
                        </button>

                    </div>
                    <input name="mention_friends" type="text" class="form-control" placeholder="Mention Friends">
                </div>
            </div>
            <div class="right-group">
                <a href="" class="del-icon" data-delgroup="del-at"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </script>
    <script id="hidden-template-sign" type="text/x-custom-template">
        <div data-group="sign" class="form-group row align-items-center">
            <div class="left-group pl-0">
                <div class="input-group">
                    <div class="input-group-prepend green_gradient-cl">
                        <button class="btn btn-outline-secondary"
                                type="button">
                            <i class="fas fa-lira-sign"></i>
                        </button>

                    </div>
                    <input name="greenfield" type="text" class="form-control" placeholder="With...">
                </div>
            </div>
            <div class="right-group">
                <a href="" class="del-icon" data-delgroup="del-sign"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </script>
    <script id="hidden-template-youtube" type="text/x-custom-template">
        <div data-group="youtube" class="form-group row align-items-center">
            <div class="left-group pl-0">
                <div class="input-group">
                    <div class="input-group-prepend red-cl">
                        <button class="btn btn-outline-secondary dropdown-toggle"
                                type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            <i class="fab fa-youtube"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-globe-asia icon-blue"></i>
                                <span class="name">Item1</span>
                            </a>
                            <a class="dropdown-item active" href="#">
                                <i class="fas fa-user-friends icon-green"></i>
                                <span class="name">Item2</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user-friends icon-purple"></i>
                                <span class="name">Item3</span>
                            </a>

                            <a class="dropdown-item" href="#">
                                <i class="fas fa-lock icon-red"></i>
                                <span class="name">Item4</span>
                            </a>
                        </div>

                    </div>
                    <input type="search " name="youtube" class="form-control search-youtube"
                           placeholder="Search Youtube">
                    <input type="hidden" id="youtube-video-key">
                </div>
            </div>
            <div class="right-group">
                <a href="" class="del-icon" data-delgroup="del-youtube"><i class="fas fa-times"></i></a>
            </div>
            <div class="youtube-videos-list">

            </div>
        </div>
    </script>
    <script id="hidden-template-images" type="text/x-custom-template">
        <div data-group="images" class="form-group row align-items-center">
            <div class="left-group pl-0">
                <div class="input-group">
                    <div class="input-group-prepend purple_gradient-cl">
                        <button class="btn btn-outline-secondary"
                                type="button">
                            <i class="far fa-images"></i>
                        </button>
                    </div>
                    <div class="btn-upload_img">
                        {!! BBmediaButton('site_image',null,['version'=>4,'html'=>'
            <button class="btn btn-link btnsettingsModal  media-modal-open h-100"
                                 type="button">
                             <i class="fas fa-plus"></i>
                             Upload Media
                         </button>']) !!}

                    </div>
                    <ul class="list-inline list-upload_img">
                        <li class="list-inline-item">
                            <img src="/public/images/girl2.png" alt="">
                            <span class="del"><i class="fas fa-times"></i></span>
                        </li>
                        <li class="list-inline-item">
                            <img src="/public/images/girl2.png" alt="">
                            <span class="del"><i class="fas fa-times"></i></span>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="right-group">
                <a href="" class="del-icon" data-delgroup="del-images"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </script>
    <script id="hidden-template-music" type="text/x-custom-template">
        <div data-group="music" class="form-group row align-items-center">
            <div class="left-group pl-0">
                <div class="input-group">
                    <div class="input-group-prepend blue_gradient-cl">
                        <button class="btn btn-outline-secondary"
                                type="button">
                            <i class="fas fa-music"></i>
                        </button>

                    </div>
                    <input name="sound_cloude" type="text" class="form-control" placeholder="Sound cloude">
                </div>
            </div>
            <div class="right-group">
                <a href="" class="del-icon" data-delgroup="del-music"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </script>
    <script id="hidden-template-gif" type="text/x-custom-template">
        <div data-group="gif" class="form-group row align-items-center">
            <div class="left-group pl-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary"
                                type="button">
                            <img src="/public/images/gif-icon.png" alt="gif">
                        </button>

                    </div>
                    <input name="gif" type="text" class="form-control" placeholder="Gif">
                </div>
            </div>
            <div class="right-group">
                <a href="" class="del-icon" data-delgroup="del-star"><i class="fas fa-times"></i></a>
            </div>
        </div>
    </script>
    <script id="hidden-template-location" type="text/x-custom-template">
        <div data-group="location" class="form-group row align-items-center">
            <div class="left-group pl-0">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <div class="input-group-prepend blue_gradient-cl">
                                <button class="btn btn-outline-secondary"
                                        type="button">
                                    <i class="fas fa-map-marker-alt"></i>
                                </button>

                            </div>
                            <input name="location" type="text" class="form-control" placeholder="Address">
                            <div class="input-group-prepend blue-grad-cl">
                                <button class="btn btn-outline-secondary"
                                        type="button">
                                    <i class="fas fa-crosshairs"></i>
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-between">
                            <div class="left-group">
                                <div class="map-custom">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.72810776133!2d-0.24168051295924747!3d51.52877184056342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2s!4v1534333971160"
                                            width="100%" height="195" frameborder="0"
                                            style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>

                            <div class="right-group">
                                <a href="" class="del-icon" data-delgroup="del-location"><i
                                            class="fas fa-times"></i></a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="right-group">
            </div>
        </div>
    </script>

    <script src="{!!url('public/libs/owlcarousel/owl.carousel.js')!!}"></script>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
//            var slides = document.querySelector(".new_post .post .post-map .mySlides");
//            var dots = document.querySelector(".new_post .post .post-map .demo");
//            var captionText = document.querySelector(".new_post .post .post-map #caption");
            var slides = document.querySelectorAll(".new_post .post .post-map .mySlides");

            var dots = document.querySelectorAll(".new_post .post .post-map .demo");
            var captionText = document.querySelector(".new_post .post .post-map #caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }

        $(function () {
            $('body').on('click', '.new_post .action-bar .open-close_tab', function () {
                $('.new_post .open-page').toggleClass('d-flex');
            });
            $('.post-foot-carousel').owlCarousel({
                nav: true,
                dots: false,
                responsiveClass: true,
                navText: ["<i class=\"fas fa-caret-left\"></i>", "<i class=\"fas fa-caret-right\"></i>"],
                responsive: {
                    0: {
                        items: 5
                    },
                    600: {
                        items: 5
                    },
                    1000: {
                        items: 5
                    },
                    1600: {
                        items: 5
                    }
                }
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.bugit').on('click', function (e) {
                e.preventDefault();
                var form = $('#bugit_form').serialize();
                $.ajax({
                    type: 'POST',
                    url: "/profiles/social/bugit",
                    datatype: 'json',
                    data: form,
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    cache: false,
                    success: function (data) {
                        if (!data.error) {
                            $('.bugsContent').html(data.html);

                        }
                    }
                });
            })
        })

    </script>
    <script>
        $(function () {
            $("body").on("keyup", ".search-youtube", function (e) {
                $(".youtube-videos-list").show()

                e.preventDefault();
                // prepare the request
                var request = gapi.client.youtube.search.list({
                    part: "snippet",
                    type: "video",
                    q: encodeURIComponent($(".search-youtube").val()).replace(/%20/g, "+"),
                    maxResults: 3,
                    order: "viewCount",
                    publishedAfter: "2015-01-01T00:00:00Z"
                });
                // execute the request
                request.execute(function (response) {
                    var results = response.result;
                    $(".youtube-videos-list").empty();
                    $.each(results.items, function (index, item) {
                        $(".youtube-videos-list").append(youtubeHtml(item.id.videoId, item.snippet.thumbnails.default.url, item.snippet.title, item.snippet.description, item.snippet.channelTitle))
                    });
                });
            });

        });


        function youtubeHtml(id, imgUrl, title, description, author) {
            return `<div class="youtube-videos-list-item" id="${id}">
        <div>
            <img src="${imgUrl}" alt="${title}">
            <h4 class="youtube-videos-list-item-title">${title}</h4>
        </div>
        <div>
            <p>${description}</p>
        </div>
        <div>
            <span>Posted by: ${author}</span>
        </div>
    </div>`
        }


        function init() {
            gapi.client.setApiKey("AIzaSyCVyIau4tPD0XGRT6ANMUfhYzdv6G79SI0");
            gapi.client.load("youtube", "v3", function () {
                // yt api is ready
            });
        }

        $("body").on("click", ".youtube-videos-list-item-title", function () {
            let id = $(this).closest(".youtube-videos-list-item").attr("id")
            console.log(id)
            console.log($(this))
            $("#youtube-video-key").val(id)
            $(".search-youtube").val($(this).text())
            $(".youtube-videos-list").hide()
            $(".youtube-videos-list").empty();

        })

        /*$(function() {
            function split(val) {
                return val.split(/,\s*!/);
            }

            function extractLast(term) {
                return split(term).pop();
            }

            $(document)
            // don't navigate away from the field on tab when selecting an item
                .on("keydown","#autocomplete",function( event ) {
                    if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).autocomplete( "instance" ).menu.active ) {
                        event.preventDefault();
                    }
                })
                .autocomplete({
                    source: function( request, response ) {
                        $.getJSON( "/profiles/social/tags/search", {
                            term: extractLast( request.term )
                        }, response );
                    },
                    search: function() {
                        // custom minLength
                        console.log($(this).find('#autocomplete').val());
                        var term = extractLast( $(this).find('#autocomplete').val());
                        if ( term.length < 2 ) {
                            return false;
                        }
                    },
                    focus: function() {
                        // prevent value inserted on focus
                        return false;
                    },
                    select: function( event, ui ) {
                        var terms = split( this.value );
                        // remove the current input
                        terms.pop();
                        // add the selected item
                        terms.push( ui.item.value );
                        // add placeholder to get the comma-and-space at the end
                        terms.push( "" );
                        this.value = terms.join( ", " );
                        return false;
                    }
                });
        });*/


    </script>
    <script src="{!!url('https://apis.google.com/js/client.js?onload=init')!!}"></script>
@stop