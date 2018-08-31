@php
    $ident = 0;
@endphp
@if(count($bugs))
    @foreach($bugs as $bug)
        @php
            $score = $bug->scores()->where('user_id',Auth::id())->where('bugs_id',$bug->id)->first();
            $descored = $bug->scores()->where('bugs_id',$bug->id)->where('like_or_dislike','<',0)->count();
            $scored = $bug->scores()->where('bugs_id',$bug->id)->where('like_or_dislike','>',0)->count();
            $averageScore = $bug->scores()->where('bugs_id',$bug->id)->sum('like_or_dislike');
            $comments=$bug->comments;
        @endphp
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-0">
                    <div class="new_post d-flex mb-4">
                        <div class="post" data-ident="{{$ident}}" data-scored="{{$scored}}" data-descored="{{$descored}}">
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
                                            @if(isset($user))
                                                <div class="head-post-img">
                                                    <div class="images">
                                                        <img src="/public/images/@if(isset($user->avatar)){{$user->avatar}}@else{{'avatar.png'}}@endif"
                                                             class="user_widget_link" data-ident="{{$ident}}"
                                                             data-userid="{{$user->id}}" alt="" data-id="{{$ident}}">
                                                    </div>

                                                </div>
                                                <div class="head-post-info">
                                                    <h4>{{$user->username}}</h4>

                                                    @if(count($bug->friends))
                                                        <span>&
                                                            @foreach($bug->friends as $friend)
                                                                {{ $friend->username }},
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
                                        <span class="d-flex flex-wrap"><i
                                                    class="fas fa-globe-americas"></i>{{ $bug->type }}</span>
                                        <hr>
                                    </div>
                                    <div class="by-train">
                                        <span class="d-flex flex-wrap"><i class="fas fa-train"></i>Quick Bug</span>
                                    </div>
                                </div>
                            </div>
                            <div class="head-content">
                                <p>
                                    @if($bug->bugit)
                                        {!!  \Emojione\Emojione::shortnameToImage($bug->bugit)!!}
                                    @endif
                                </p>
                                <div>
                                    <i class="fas fa-thumbtack"></i>
                                </div>

                            </div>
                            <div class="post-content">
                                @if(count($bug->friends))
                                    <div class="at d-flex">
                                        <p> @foreach($bug->friends as $friend)
                                                <a href="#" style="color: #cc493b" data-ident="{{$ident}}"
                                                   data-userid="{{$friend->id}}" class="user_widget_link">
                                                    <i class="fas fa-at"></i>
                                                    {{ $friend->username }},
                                                </a>
                                            @endforeach... </p>
                                    </div>
                                @endif
                                @if(count($bug->tags))
                                    <div class="hash d-flex">
                                        <p>
                                            @foreach($bug->tags as $tag)
                                                <a href="{{route('front_page_social_bug_tags_show',$tag->id)}}"><i
                                                            class="fas fa-hashtag"></i>
                                                    <span>{{ $tag->name }}</span></a>
                                            @endforeach
                                        </p>
                                    </div>
                                @endif
                            </div>
                            <div class="post-map">
                                @if($bug->location && count($bug->location))
                                    <div class="posted post-maps active">
                                        <iframe src="https://maps.google.com/maps?q={{ $bug->location['lat'] }},{{ $bug->location['lang'] }}&z=10&output=embed"
                                                width="100%" height="100%" frameborder="0" style="border:0"
                                                allowfullscreen></iframe>
                                    </div>
                                @endif
                                @if(count(explode(',',$bug->site_image)))
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach(explode(',',$bug->site_image) as $img)
                                        <div class="posted post-image-{{$i++}}">
                                            <img src="{{$img}}"
                                                 alt="">
                                        </div>
                                    @endforeach
                                @endif
                                @if(isset($bug->gif))
                                    <div class="posted post-gif">
                                        <img src="{!! $bug->gif !!}" alt="GIF">
                                    </div>
                                @endif

                                @if(isset($bug->youtube))
                                    <div class="posted post-youtube">
                                        <iframe width="100%" height="100%"
                                                src="https://www.youtube.com/embed/{{ $bug->youtube }}" frameborder="0"
                                                allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                @endif


                            </div>
                            <div class="post-foot">
                                <div class="post-foot-carousel owl-carousel owl-theme">
                                    @if($bug->location && count($bug->location))
                                        <div class="item" data-pi="1"><a href="" data-view-post="post-maps"
                                                             class="blue-cl-icon iccon">
                                                <div class="line"></div>
                                                <i class="fas fa-map-marker-alt"></i></a></div>
                                    @endif
                                    @if($bug->site_image && count(explode(',',$bug->site_image)))
                                        @php
                                            $j = 1;
                                        @endphp
                                        @foreach(explode(',',$bug->site_image) as $img)
                                            <div class="item" data-pi="2"><a href="" data-view-post="post-image-{{$j++}}"
                                                                 class="purple-cl-icon iccon">
                                                    <div class="line"></div>
                                                    <i class="far fa-images"></i></a></div>
                                        @endforeach
                                    @endif
                                    @if(isset($bug->gif))
                                        <div class="item" data-pi="3"><a href="" data-view-post="post-gif"
                                                             class="green-cl-icon iccon">
                                                <div class="line"></div>
                                                <img src="/public/images/gif-icon.png"
                                                     alt=""></a></div>
                                    @endif
                                    @if(isset($bug->youtube))
                                        <div class="item" data-pi="4"><a href="" data-view-post="post-youtube"
                                                             class="red-cl-icon iccon">
                                                <div class="line"></div>
                                                <i class="fab fa-youtube"></i></a></div>
                                    @endif

                                </div>

                            </div>
                        </div>
                        <div class="open-page no_open">
                            <nav>
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-comment-tab" data-toggle="tab"
                                       href="#nav-comment-{{$ident}}" role="tab" aria-controls="nav-comment" aria-selected="true">
                                        <div class="d-flex justify-content-between">
                                            <span class="name">Comments</span><span
                                                    class="count">63</span>
                                        </div>

                                    </a>
                                    <a class="nav-item nav-link share-link" id="nav-share-tab" data-toggle="tab"
                                       href="#nav-share-{{$ident}}" role="tab" aria-controls="nav-share" aria-selected="false">
                                        <div class="d-flex justify-content-between">
                                            <span class="name">Share</span><span
                                                    class="count">190</span>
                                        </div>
                                    </a>


                                    <a class="nav-item nav-link" id="nav-score-tab" data-toggle="tab" href="#nav-score-{{$ident}}"
                                       role="tab" aria-controls="nav-score" aria-selected="false">
                                        <div class="d-flex justify-content-between">
                                            <span class="name">Score</span><span
                                                    class="count">{{ $averageScore }}</span>
                                        </div>
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="nav-comment-{{$ident}}" role="tabpanel"
                                     aria-labelledby="nav-comments-tab">
                                    <div class="comment">
                                        <div class="main-comments-content d-flex flex-column h-100">
                                            <div class="content-comments bug-comments-{!! $bug->id !!}">
                                                @foreach($comments as $comment)
                                                <div class="message1">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <img src="{!! $comment->author->socialProfile->site_image !!}" alt="">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="name">
                                                                    <span>{!! $comment->author->f_name.' '.$comment->author->l_name !!}</span>
                                                                    <span style="color: #909090">{!! timeago($comment->creted_at) !!}</span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>{!! $comment->comment !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @if(0)
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
                                                                    <span>{{ $user->username }}</span>
                                                                    <span style="color: #909090">22h</span>
                                                                </div>
                                                                <div class="text">
                                                                    <p>Enjoy your time!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    @endif
                                            </div>
                                            <div class="foot-comments d-flex">
                                                <div class="write">
                                                    <div class="d-flex">
                                                        <img src="{!! Auth::user()->avatar !!}" alt="">
                                                        {!! Form::open() !!}
                                                        {!! Form::hidden('bug_id',$bug->id) !!}
                                                        <input class="form-control form-control-lg comment-atea"
                                                               type="text"
                                                               name="comment"
                                                               placeholder="Write a Comment ...">
                                                        {!! Form::close() !!}
                                                        <i class="far fa-smile"></i>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="nav-share-{{$ident}}" role="tabpanel"
                                     aria-labelledby="nav-share-tab">
                                    <div class="share">
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
                                                                <a href=""
                                                                   class="link-share facebook-link align-self-center"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                <img class="sam"
                                                                     src="/public/images/boy1.jpg" alt="">
                                                                <div class="margin-t"><span>Sam Black</span>
                                                                    <span class="d-flex color">21h ago</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 pr-0">
                                                            <div class="sam d-flex">
                                                                <a href=""
                                                                   class="link-share other-link red_gradient-cl align-self-center">
                                                                    <img src="/public/images/mushroom-icon.png"
                                                                         alt="icon">
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
                                                                <a href=""
                                                                   class="link-share other-link red_gradient-cl align-self-center">
                                                                    <img src="/public/images/mushroom-icon.png"
                                                                         alt="icon">
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
                                                                <a href=""
                                                                   class="link-share twitter-link align-self-center"><i
                                                                            class="fab fa-twitter"></i></a>
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


                                <div class="tab-pane fade" id="nav-score-{{$ident}}" role="tabpanel"
                                     aria-labelledby="nav-score-tab">
                                    <div class="score">
                                        <div class="main-score-content">
                                            <div class="score-content1">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="globus col-md-6">
                                                            <div class="canvas-holder h-100 w-100">
                                                                <canvas id="chart-area-{{$ident}}" height="300"></canvas>
                                                            </div>

                                                        </div>
                                                        <div class="total col-md-6">
                                                            <p class="margin"><i class="fas fa-plus"></i>
                                                                <span>{{ $scored }} </span></p>
                                                            <p class="margin"><i class="fas fa-minus"></i>
                                                                <span>{{ $descored }}</span></p>
                                                            <p>Total: <span class="color">{{ $averageScore }}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="score-content2">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        @php
                                                            $lastScoredPeople = $bug->scores()->orderBy('created_at','DESC')->take(4)->get();
                                                        @endphp

                                                        @if(count($lastScoredPeople))
                                                            @foreach($lastScoredPeople as $lastScoredPerson)
                                                                <div class="col-md-6">
                                                                    <div class="d-flex">
                                                                        @if($lastScoredPerson->like_or_dislike > 0)
                                                                            <p class="margin"><i
                                                                                        class="fas fa-plus"></i></p>
                                                                        @else
                                                                            <p class="margin"><i
                                                                                        class="fas fa-minus"></i></p>
                                                                        @endif

                                                                        @if($lastScoredPerson->user && $lastScoredPerson->user->socialProfile && $lastScoredPerson->user->socialProfile->site_image)
                                                                            <img class="sam"
                                                                                 src="{!! url($lastScoredPerson->user->socialProfile->site_image) !!}"
                                                                                 alt="">
                                                                        @else
                                                                            <img class="sam"
                                                                                 src="/public/images/girl2.png" alt="">
                                                                        @endif
                                                                        <div class="margin-t">
                                                                            <span>{!! $lastScoredPerson->user->username !!}</span>
                                                                            <span class="d-flex color">{!! timeago($lastScoredPerson->created_at) !!}</span>
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
                                    <button class="dropdown-item delete_bug" data-id="{{$bug->id}}" type="button">Delete
                                        post
                                    </button>
                                    <button class="dropdown-item" type="button">Change Privacy</button>
                                </div>

                            </div>

                            <div class="d-flex flex-md-column align-items-center">
                                <i class="fas fa-plus {!! ($score && $score->like_or_dislike == 1) ? 'score-plus-active' : 'score-plus' !!}"
                                   data-bugid="{{$bug->id}}"></i>
                                <a href="" data-barlink="score">
                                    <span style="color: #ffffff">{{ thousandsCurrencyFormat($averageScore) }}</span>
                                </a>
                                <i class="fas fa-minus {!! ($score && $score->like_or_dislike == -1) ? 'score-minus-active' : 'score-minus' !!}"
                                   data-bugid="{{$bug->id}}"></i>
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
                            <div class="span"><span>{{$user->username}}</span></div>
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
                            <span class="align-self-center">{{$user->socialProfile->proffesion}}</span>
                            <img src="/public/images/uk-flag.jpg" alt="flag">
                        </div>
                        <div class="content-image">
                            <div class="info-photo d-flex flex-wrap">
                                <div class="col-lg-6 p-0">
                                    <div class="photo">
                                        <img src="/public/images/{{$user->avatar}}" alt="">
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