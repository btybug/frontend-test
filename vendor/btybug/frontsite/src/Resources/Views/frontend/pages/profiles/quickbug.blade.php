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
                            <div class="row">
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
                    @if(count($bugs))
                        @foreach($bugs as $bug)
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8 p-0">
                                            <div class="new_post d-flex mb-4">
                                                <div class="post">
                                                    <div class="head-rania d-flex">
                                                        <div class="aug">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-lg-1 col-md-2">
                                                                        <div class="reg-times d-flex flex-md-column align-items-center">
                                                                            <span>21</span>
                                                                            <span>Aug</span>
                                                                            <i class="far fa-clock"></i>
                                                                            <span>10:17</span>
                                                                        </div>
                                                                    </div>
                                                                    @if(count($curUser))
                                                                    <div class="col-lg-2 col-md-3 p-0">
                                                                        <div class="images">
                                                                            <img src="/public/images/@if(isset($curUser->avatar)){{$curUser->avatar}}@else{{'avatar.png'}}@endif" alt="">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-lg-9 col-md-7">
                                                                        <h4>{{$curUser->username}}</h4>
                                                                        <span>&  @foreach(explode(',',$bug->mention_friends) as $friends)
                                                                                {{$friends}},
                                                                            @endforeach
                                                                            ...
                                                                        </span>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="travel d-flex flex-column justify-content-center">
                                                            <div class="traveling">
                                                                <span class="d-flex flex-wrap"><i class="fas fa-globe-americas"></i>Traveling</span>
                                                                <hr>
                                                            </div>
                                                            <div class="by-train">
                                                                <span class="d-flex flex-wrap"><i class="fas fa-train"></i>By Train</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="head-content">
                                                        <p>
                                                            @if(isset($bug->bugit))
                                                                {{$bug->bugit}}
                                                            @endif
                                                        </p>
                                                        <div>
                                                            <i class="fas fa-thumbtack"></i>
                                                        </div>

                                                    </div>
                                                    <div class="post-content">
                                                        <div class="at d-flex">
                                                            <p><i class="fas fa-at"></i>
                                                                @foreach(explode(',',$bug->mention_friends) as $friends)
                                                                    {{$friends}},
                                                                @endforeach... </p>
                                                        </div>

                                                        <div class="hash d-flex">
                                                            <p>
                                                                @foreach(explode(',',$bug->tags) as $tag)
                                                                    <i class="fas fa-hashtag"></i>
                                                                    <span>{{$tag}}</span>
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="post-map">
                                                        @if(count(explode(',',$bug->site_image)))
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @foreach(explode(',',$bug->site_image) as $img)
                                                                <div id="post-image-{{$i++}}" class="">
                                                                    <img src="{{$img}}"
                                                                         alt="">
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                        <div id="post-gif" class="">
                                                            <img src="@if(isset($bug->gif)) @else https://media1.popsugar-assets.com/files/thumbor/sEsLflIEp_nfioQsE4aGa8zq9CY/fit-in/1024x1024/filters:format_auto-!!-:strip_icc-!!-/2018/01/03/278/n/1922398/addurlYAmgaN/i/Nope-Rat.gif @endif"
                                                                 alt="">
                                                        </div>
                                                        <div id="post-youtube" class="">
                                                            <iframe width="100%" height="350"
                                                                    src="@if(isset($bug->youtube))https://www.youtube.com/embed/{{$bug->youtube}}@endif" frameborder="0"
                                                                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                                        </div>
                                                        <div id="post-maps" class="active">
                                                            <iframe src="@if(isset($bug->location)){{$bug->location}} @endif"
                                                                    width="100%" height="350" frameborder="0" style="border:0"
                                                                    allowfullscreen></iframe>
                                                        </div>

                                                    </div>
                                                    <div class="post-foot">
                                                        <div class="post-foot-carousel owl-carousel owl-theme">
                                                            <div class="item"><a href="" data-view-post="post-maps"
                                                                                 class="blue-cl-icon active">
                                                                    <div class="line"></div>
                                                                    <i class="fas fa-map-marker-alt"></i></a></div>
                                                            @if(count(explode(',',$bug->site_image)))
                                                                @php
                                                                    $j = 1;
                                                                @endphp
                                                                @foreach(explode(',',$bug->site_image) as $img)
                                                                    <div class="item"><a href="" data-view-post="post-image-{{$j++}}"
                                                                                         class="purple-cl-icon">
                                                                            <div class="line"></div>
                                                                            <i class="far fa-images"></i></a></div>
                                                                @endforeach
                                                            @endif
                                                            <div class="item"><a href="" data-view-post="post-gif"
                                                                                 class="green-cl-icon">
                                                                    <div class="line"></div>
                                                                    <img src="/public/images/gif-icon.png"
                                                                         alt=""></a></div>
                                                            <div class="item"><a href="" data-view-post="post-youtube"
                                                                                 class="red-cl-icon">
                                                                    <div class="line"></div>
                                                                    <i class="fab fa-youtube"></i></a></div>
                                                            <div class="item"><a href="" data-view-post="post-image-3"
                                                                                 class="purple-cl-icon">
                                                                    <div class="line"></div>
                                                                    <i class="far fa-images"></i></a></div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="open-page no_open">
                                                    <div id="comment" class="">
                                                        <nav>
                                                            <div class="nav nav-tabs">
                                                                <a class="nav-item nav-link active">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Comments</span><span
                                                                                class="count">63</span>
                                                                    </div>

                                                                </a>
                                                                <a class="nav-item nav-link share-link">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Share</span><span
                                                                                class="count">190</span>
                                                                    </div>
                                                                </a>


                                                                <a class="nav-item nav-link">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Score</span><span
                                                                                class="count">125,365</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content ">
                                                            <div class="tab-pane">
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
                                                                                <input class="form-control form-control-lg"
                                                                                       type="text"
                                                                                       placeholder="Write a Comment ...">
                                                                                <i class="far fa-smile"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="share" class="">
                                                        <nav>
                                                            <div class="nav nav-tabs">
                                                                <a class="nav-item nav-link">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Comments</span><span
                                                                                class="count">63</span>
                                                                    </div>

                                                                </a>
                                                                <a class="nav-item nav-link active share-link">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Share</span><span
                                                                                class="count">190</span>
                                                                    </div>
                                                                </a>


                                                                <a class="nav-item nav-link">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Score</span><span
                                                                                class="count">125,365</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content ">
                                                            <div class="tab-pane">
                                                                <div class="main-share-content">
                                                                    <div class="head d-flex justify-content-between align-items-center">
                                                                        <div class="rebug red_gradient-cl">
                                                                            <button class="btn btn-link"><img
                                                                                        src="/public/images/mushroom-icon.png"
                                                                                        alt="icon"><span>Rebug</span></button>
                                                                        </div>
                                                                        <div class="social-also d-flex align-items-center">
                                                                            <span class="text">Share also on:</span>
                                                                            <a href="" class="facebook-link"><i
                                                                                        class="fab fa-facebook-f"></i></a>
                                                                            <a href="" class="twitter-link"><i
                                                                                        class="fab fa-twitter"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="share-content">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-md-6 pl-0">
                                                                                    <div class="sam d-flex">
                                                                                        <a href="" class="link-share facebook-link align-self-center"><i class="fab fa-facebook-f"></i></a>
                                                                                        <img class="sam"
                                                                                             src="/public/images/boy1.jpg" alt="">
                                                                                        <div class="margin-t"><span>Sam Black</span>
                                                                                            <span class="d-flex color">21h ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 pr-0">
                                                                                    <div class="sam d-flex">
                                                                                        <a href="" class="link-share other-link red_gradient-cl align-self-center">
                                                                                            <img src="/public/images/mushroom-icon.png" alt="icon">
                                                                                        </a>
                                                                                        <img class="sam"
                                                                                             src="/public/images/boy1.jpg" alt="">
                                                                                        <div class="margin-t"><span>Sam Black</span>
                                                                                            <span class="d-flex color">21h ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6 pl-0 mt-4">
                                                                                    <div class="johan d-flex">
                                                                                        <a href="" class="link-share other-link red_gradient-cl align-self-center">
                                                                                            <img src="/public/images/mushroom-icon.png" alt="icon">
                                                                                        </a>
                                                                                        <img class="johan"
                                                                                             src="/public/images/boy2.jpg" alt="">
                                                                                        <div class="margin-t">
                                                                                            <span>Johan Smith</span>
                                                                                            <span class="d-flex color">16h ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-md-6 pr-0 mt-4">
                                                                                    <div class="rania d-flex">
                                                                                        <a href="" class="link-share twitter-link align-self-center"><i class="fab fa-twitter"></i></a>
                                                                                        <img class="johan"
                                                                                             src="/public/images/girl-cover.jpg"
                                                                                             alt="">
                                                                                        <div class="margin-t">
                                                                                            <span>Rania Dewell</span>
                                                                                            <span class="d-flex color">5min ago</span>
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
                                                    <div id="score" class="">
                                                        <nav>
                                                            <div class="nav nav-tabs">
                                                                <a class="nav-item nav-link">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Comments</span><span
                                                                                class="count">63</span>
                                                                    </div>

                                                                </a>
                                                                <a class="nav-item nav-link share-link">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Share</span><span
                                                                                class="count">190</span>
                                                                    </div>
                                                                </a>


                                                                <a class="nav-item nav-link active">
                                                                    <div class="d-flex justify-content-between">
                                                                        <span class="name">Score</span><span
                                                                                class="count">125,365</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </nav>
                                                        <div class="tab-content ">
                                                            <div class="tab-pane">
                                                                <div class="main-score-content">
                                                                    <div class="score-content1">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="globus col-md-6">
                                                                                    <img src="/public/images/klorik.png" alt="">
                                                                                </div>
                                                                                <div class="total col-md-6">
                                                                                    <p class="margin"><i class="fas fa-plus"></i>
                                                                                        <span>126,885</span></p>
                                                                                    <p class="margin"><i class="fas fa-minus"></i>
                                                                                        <span>1,520</span></p>
                                                                                    <p>Total: <span class="color">125,365</span></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="score-content2">
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="people1 col-md-6">
                                                                                    <div class="sam d-flex">
                                                                                        <p class="margin"><i
                                                                                                    class="fas fa-minus"></i></p>
                                                                                        <img class="sam"
                                                                                             src="/public/images/boy1.jpg" alt="">
                                                                                        <div class="margin-t"><span>Sam Black</span>
                                                                                            <span class="d-flex color">21h ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="johan d-flex">
                                                                                        <p class="margin"><i
                                                                                                    class="fas fa-minus"></i></p>
                                                                                        <img class="johan"
                                                                                             src="/public/images/boy2.jpg" alt="">
                                                                                        <div class="margin-t">
                                                                                            <span>Johan Smith</span>
                                                                                            <span class="d-flex color">16h ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="people2 col-md-6">
                                                                                    <div class="sam d-flex">
                                                                                        <p class="margin"><i
                                                                                                    class="fas fa-plus"></i></p>
                                                                                        <img class="sam"
                                                                                             src="/public/images/boy1.jpg" alt="">
                                                                                        <div class="margin-t"><span>Sam Black</span>
                                                                                            <span class="d-flex color">21h ago</span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="rania d-flex">
                                                                                        <p class="margin"><i
                                                                                                    class="fas fa-plus"></i></p>
                                                                                        <img class="johan"
                                                                                             src="/public/images/girl-cover.jpg"
                                                                                             alt="">
                                                                                        <div class="margin-t">
                                                                                            <span>Rania Dewell</span>
                                                                                            <span class="d-flex color">5min ago</span>
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
                                                </div>
                                                <div class="action-bar d-flex align-items-center justify-content-between flex-md-column">
                                                    <div class="open-close_tab">
                                                        <button type="button" class="btn btn-link " data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v" style="margin-top: 10px"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button">Edit post</button>
                                                            <button class="dropdown-item" type="button">Embed</button>
                                                            <button class="dropdown-item" type="button">Show in tab</button>
                                                            <div class="dropdown-divider"></div>
                                                            <button class="dropdown-item" type="button">Delete post</button>
                                                            <button class="dropdown-item" type="button">Change Privacy</button>
                                                        </div>

                                                    </div>
                                                    <div class="d-flex flex-md-column align-items-center">
                                                        <i class="fas fa-plus"></i>
                                                        <a href="" data-barlink="score">
                                                            <span style="color: #ffffff">125</span>
                                                        </a>

                                                        <span style="color: #ffffff">K</span>
                                                        <i class="fas fa-minus"></i>
                                                    </div>
                                                    <div class="d-flex flex-md-column align-items-center share-coment-icon">
                                                        <a href="" data-barlink="share">
                                                            <i class="fas fa-share" style="line-height: 1.2"></i>
                                                        </a>
                                                        <span style="margin-bottom: 25px">190</span>
                                                        <a href="" data-barlink="comment">
                                                            <i class="far fa-comment-alt" style="line-height: 1.2"></i>
                                                        </a>

                                                        <span style="margin-bottom: 10px">63</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 pl-lg-4 p-0">
                                            <div class="head3 user-widget no-show">
                                                <div class="name-icon">
                                                    <div class="span"><span>Rania Davan</span></div>
                                                    <div class="icon">
                                                        <div class="share-number">
                                                            <i class="fas fa-share"></i>
                                                            <div class="number"><i>207</i></div>
                                                        </div>
                                                        <a href="" class="comment-icon"><i class="far fa-comment-alt"></i></a>
                                                        <a href="" class="fav-icon"><i class="far fa-heart"></i></a>
                                                        <a href="" class="dawn-icon"><i class="fas fa-caret-down"></i></a>
                                                    </div>
                                                </div>
                                                <div class="wed-developer">
                                                    <span class="align-self-center">Wed Developer</span>
                                                    <img src="/public/images/uk-flag.jpg" alt="flag">
                                                </div>
                                                <div class="content-image">
                                                    <div class="info-photo d-flex flex-wrap">
                                                        <div class="col-lg-6 p-0">
                                                            <div class="photo">
                                                                <img src="/public/images/girl2.png" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 p-0">
                                                            <div class="info">
                                                                <div class="content d-flex">

                                                                    <p>
                                                                        <q class="qoutes"></q>Don’T Walk Behind Me; I May Not
                                                                        Lead. Don’T Walk In Front Of Me; I May Not Follow. Just Walk Beside Me And
                                                                        Be My Friend.</p>

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
                        </div>
                        @endforeach
                    @endif
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
                                                        class="title">General</span></a>
                                            <a class="dropdown-item active d-flex align-items-center" href="#"><i
                                                        class="fas fa-cog"></i><span
                                                        class="title">Funny</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="#"><i
                                                        class="fas fa-cog"></i><span
                                                        class="title">News</span></a>
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
                        <div class="location-input">
                            <div class="input-group">
                                <div class="input-group-prepend blue_gradient-cl">
                                    <button class="btn btn-outline-secondary"
                                            type="button">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </button>

                                </div>

                                {!! Form::text('location[name]',null,['class' => 'controls form-control','placeholder' => 'Enter Location','id' => 'pac-input']) !!}
                                {!! Form::hidden('location[lang]',null,['class' => 'location_lang']) !!}
                                {!! Form::hidden('location[lat]',null,['class' => 'location_lat']) !!}
                                <div class="input-group-prepend blue-grad-cl">
                                    <button class="btn btn-outline-secondary"
                                            type="button">
                                        <i class="fas fa-crosshairs"></i>
                                    </button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex justify-content-between">
                            <div class="left-group">
                                <div class="map-custom">
                                    <div class="map-box">
                                        <div id="map">
                                        </div>
                                    </div>
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
    <script src="{!!url('public/minicms/js/new-post.js')!!}"></script>



    <script>

        $('#bugModalCenter').on('shown.bs.modal', function () {
            initAutocomplete();
        });
            function initAutocomplete() {

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: $(".location_lat").val() ?  Number($(".location_lat").val()): 40.7929026,
                        lng: $(".location_lang").val() ? Number($(".location_lang").val()): 43.84649710000008

                    },
                    zoom: 13,
                    mapTypeId: 'roadmap',
                });

                var marker = new google.maps.Marker({
                    position: {
                        lat: $(".location_lat").val() ?  Number($(".location_lat").val()): 40.7929026,
                        lng: $(".location_lang").val() ? Number($(".location_lang").val()): 43.84649710000008

                    },
                    map: map,
                    title: $("#pac-input").val()
                });
                if($(".location_lang").val() || $(".location_lat").val()  ){
                    $(".map-box").show()
                }
                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);
                // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function(event) {
                    searchBox.setBounds(map.getBounds());
                });

                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function(event) {
                    $(".map-box").show()
                    var places = searchBox.getPlaces();
                    if (places.length == 0) {
                        return;
                    }



                    // Clear out the old markers.
                    markers.forEach(function(marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function(place) {
                        if (!place.geometry) {
                            console.log("Returned place contains no geometry");
                            return;
                        }
                        // var icon = {
                        //   url: place.icon,
                        //   size: new google.maps.Size(71, 71),
                        //   origin: new google.maps.Point(0, 0),
                        //   anchor: new google.maps.Point(17, 34),
                        //   scaledSize: new google.maps.Size(25, 25)
                        // };

                        // Create a marker for each place.
                        $(".location_lang").val(place.geometry.location.lng())
                        $(".location_lat").val(place.geometry.location.lat())
                        markers.push(new google.maps.Marker({
                            map: map,
                            // icon: icon,
                            title: place.name,
                            position: place.geometry.location
                        }));

                        if (place.geometry.viewport) {
                            // Only geocodes have viewport.
                            bounds.union(place.geometry.viewport);
                        } else {
                            bounds.extend(place.geometry.location);
                        }
                    });
                    map.fitBounds(bounds);

                });
            }

    </script>
    <script src="{!!url('https://maps.googleapis.com/maps/api/js?key=AIzaSyCVyIau4tPD0XGRT6ANMUfhYzdv6G79SI0&libraries=places&callback=initAutocomplete" async defer')!!}"></script>

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