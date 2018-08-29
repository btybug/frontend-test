@php
 $ident = 0;
@endphp
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
                                            <div class="head-post-times">
                                                <div class="reg-times d-flex flex-column align-items-center">
                                                    <span>{{ BBgetDateFormat($bug->created_at,'d') }}</span>
                                                    <span>{{ BBgetDateFormat($bug->created_at,'M') }}</span>
                                                    <span><i class="far fa-clock"></i></span>
                                                    <span>{{ str_replace(' ', '', BBgetTimeFormat($bug->created_at)) }}</span>
                                                </div>
                                            </div>
                                            @if(count($curUser))
                                                <div class="head-post-img">
                                                    <div class="images">
                                                        <img src="/public/images/@if(isset($curUser->avatar)){{$curUser->avatar}}@else{{'avatar.png'}}@endif" alt="" data-id="{{$ident}}">
                                                    </div>

                                                </div>
                                                <div class="head-post-info">
                                                    <h4>{{$curUser->username}}</h4>
                                                    @if($bug->mention_friends)
                                                        <span>&
                                                            @foreach(explode(',',$bug->mention_friends) as $friends)
                                                                {{$friends}},
                                                            @endforeach
                                                            ...
                                                        </span>
                                                    @endif
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
                                    @if($bug->bugit)
                                        {{$bug->bugit}}
                                    @endif
                                </p>
                                <div>
                                    <i class="fas fa-thumbtack"></i>
                                </div>

                            </div>
                            <div class="post-content">
                                @if($bug->mention_friends)
                                    <div class="at d-flex">
                                        <p><i class="fas fa-at"></i>
                                            @foreach(explode(',',$bug->mention_friends) as $friends)
                                                {{$friends}},
                                            @endforeach... </p>
                                    </div>
                                @endif
                                @if($bug->tags)
                                    <div class="hash d-flex">
                                        <p>
                                            @foreach(explode(',',$bug->tags) as $tag)
                                                <a href="{{route('front_page_social_bug_tags_show',$tag)}}"><i class="fas fa-hashtag"></i>
                                                    <span>{{$tag}}</span></a>
                                            @endforeach
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <div class="post-map">
                                @if(count(explode(',',$bug->site_image)))
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach(explode(',',$bug->site_image) as $img)
                                        <div class="post-image-{{$i++}}">
                                            <img src="{{$img}}"
                                                 alt="">
                                        </div>
                                    @endforeach
                                @endif
                                @if(isset($bug->gif))
                                    <div class="post-gif">
                                        <img src="{!! $bug->gif !!}" alt="GIF">
                                    </div>
                                @endif

                                @if(isset($bug->youtube))
                                    <div class="post-youtube">
                                        <iframe width="100%" height="350"
                                                src="https://www.youtube.com/embed/{{ $bug->youtube }}" frameborder="0"
                                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                @endif

                                @if($bug->location && count($bug->location))
                                    <div class="post-maps active">
                                        <iframe src="https://maps.google.com/maps?q={{ $bug->location['lat'] }},{{ $bug->location['lang'] }}&z=10&output=embed"
                                                width="100%" height="350" frameborder="0" style="border:0"
                                                allowfullscreen></iframe>
                                    </div>
                                @endif

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
                            <div class="comment">
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
                                                                    <span>{{$curUser->username}}</span>
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
                            <div class="share">
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
                            <div class="score">
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
                                    <button class="dropdown-item delete_bug" data-id="{{$bug->id}}" type="button">Delete post</button>
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
                    <div class="head3 user-widget no-show" data-id="{{$ident++}}">
                        <div class="name-icon">
                            <div class="span"><span>{{$curUser->username}}</span></div>
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
                            <span class="align-self-center">{{$user->proffesion}}</span>
                            <img src="/public/images/uk-flag.jpg" alt="flag">
                        </div>
                        <div class="content-image">
                            <div class="info-photo d-flex flex-wrap">
                                <div class="col-lg-6 p-0">
                                    <div class="photo">
                                        <img src="/public/images/{{$curUser->avatar}}" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-6 p-0">
                                    <div class="info">
                                        <div class="content d-flex">
                                            <p>
                                                <q class="qoutes"></q>{{$bug->bugit}}
                                            </p>

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