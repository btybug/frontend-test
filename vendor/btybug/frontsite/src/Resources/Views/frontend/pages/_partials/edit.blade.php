@if(isset($bug))
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
                        {!! Form::open(['route'=>'front_page_social_bugit','id' => 'bugit_form']) !!}
                        <div class="head">
                            <div class="d-flex">
                                <div class="title-icon d-flex align-items-center">
                                    <i class="far fa-newspaper"></i>
                                    <span>Quick Bug</span>
                                </div>
                                <div class="daily d-flex align-items-center">
                                    @if($bug->type)
                                    <select id="bug_select_head" name="type">
                                            <option data-icon="far fa-calendar-alt" value="Daily" {{$bug->type == 'Daily'? 'selected' : ''}}>
                                                            <span class="icon">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </span>
                                                <span class="name">Daily</span>
                                            </option>
                                            <option data-icon="fas fa-cog" value="General" {{$bug->type == 'General'? 'selected' : ''}}>
                                                                <span class="icon">
                                                                    <i class="fas fa-cog"></i>
                                                                </span>
                                                <span class="title">General</span>
                                            </option>

                                            <option data-icon="fas fa-cog" value="Funny" {{$bug->type == 'Funny'? 'selected' : ''}}>
                                                            <span class="icon">
                                                                <i class="fas fa-cog"></i>
                                                            </span>
                                                <span class="title">Funny</span>
                                            </option>
                                            <option data-icon="fas fa-cog" value="News" {{$bug->type == 'News'? 'selected' : ''}}>
                                                            <span class="icon">
                                                                <i class="fas fa-cog"></i>
                                                            </span>
                                                <span class="title">News</span>
                                            </option>
                                    </select>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="main-content">


                            <div class="happy d-flex align-items-center">
                                <div class="title">
                                                <textarea name="bugit" id="bugit-text" cols="30" rows="10"
                                                          placeholder="Bug Sumething..." >{{$bug->bugit ?? null}}</textarea>
                                </div>
                                <!-- <div class="icon">
                                    <i class="far fa-smile"></i>
                                </div> -->
                            </div>
                            {{--------------------------Main Content------------------------------}}
                            <div id="added_costom_template" class="container-fluid">
                                @if(count($bug->tags))
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
                                                       value="@foreach($bug->tags as $tag){{$tag->name}},@endforeach"
                                                >

                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon" data-delgroup="del-hashtag"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                @endif
                                @if(count($bug->friends))
                                    <div data-group="at" class="form-group row align-items-center group-for-at-tags">
                                        <div class="left-group pl-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend red_gradient-cl">
                                                    <button class="btn btn-outline-secondary"
                                                            type="button">
                                                        <i class="fas fa-at"></i>
                                                    </button>

                                                </div>
                                                <input name="mention_friends" type="text" class="form-control mention-friends" value="@foreach($bug->friends as $friend) {{$friend->username}},@endforeach">
                                                <input type="hidden" name="user_id" class="mention-friends-id">
                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon" data-delgroup="del-at"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                @endif
                                @if(isset($bug->greenfield))
                                        <div data-group="sign" class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend green_gradient-cl">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button">
                                                            <i class="fas fa-lira-sign"></i>
                                                        </button>

                                                    </div>
                                                    <input name="greenfield" type="text" class="form-control" placeholder="With..." value="{{$bug->greenfield}}">
                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon" data-delgroup="del-sign"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                @endif
                                @if($bug->site_image && count(explode(',',$bug->site_image)))
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
                                                        {!! BBmediaButton('site_image',null,['version'=>4, 'tmp' => true,'html'=>'
                                                        <button class="btn btn-link btnsettingsModal  media-modal-open h-100"
                                                                type="button">
                                                            <i class="fas fa-plus"></i>
                                                            Upload Media
                                                        </button>']) !!}

                                                    </div>
                                                    <ul class="list-inline list-upload_img">
                                                        @foreach(explode(',',$bug->site_image) as $img)
                                                            <li class="list-inline-item">
                                                                <img src="{{$img}}" alt="">
                                                                <span class="del"><i class="fas fa-times"></i></span>
                                                            </li>
                                                        @endforeach
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon" data-delgroup="del-images"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                @endif
                                @if(isset($bug->gif))
                                        <div data-group="gif" class="form-group row align-items-center">
                                            <div class="left-group pl-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-secondary"
                                                                type="button">
                                                            <img src="{{$bug->gif}}" alt="gif">
                                                        </button>

                                                    </div>
                                                    <input type="text" class="form-control giphy-search" placeholder="Gif">
                                                    <input type="hidden" id="giphy-id">
                                                    <input type="hidden" id="giphy-title">
                                                    <input type="hidden" name="gif" id="giphy-url">

                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon" data-delgroup="del-star"><i class="fas fa-times"></i></a>
                                            </div>
                                            <div class="giphy-container w-100"></div>
                                        </div>
                                @endif
                                @if(isset($bug->youtube))
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
                                                    <input type="search" class="form-control search-youtube"
                                                           placeholder="Search Youtube">
                                                    <input type="hidden" name="youtube" id="youtube-video-key" value="{{$bug->youtube}}">
                                                </div>
                                            </div>
                                            <div class="right-group">
                                                <a href="" class="del-icon" data-delgroup="del-youtube"><i class="fas fa-times"></i></a>
                                            </div>
                                            <div class="youtube-videos-list">

                                            </div>
                                        </div>
                                @endif
                                @if($bug->location && count($bug->location))
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

                                                                {!! Form::text('location[name]',$bug->location['name'],['class' => 'controls form-control','placeholder' => 'Enter Location','id' => 'pac-input']) !!}
                                                                {!! Form::hidden('location[lang]',$bug->location['lang'],['class' => 'location_lang']) !!}
                                                                {!! Form::hidden('location[lat]',$bug->location['lat'],['class' => 'location_lat']) !!}
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
                                @endif
                            </div>
                            {{--------------------------End of main content------------------------------}}

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
                                        <select id="bug_select_bottom" name="privacy">
                                            <option data-icon="fas fa-user-lock" value="Only Me"  {{$bug->privacy == 'Only Me'? 'selected' : ''}}>
                                                <span class="name">Only Me</span>
                                            </option>
                                            <option data-icon="fas fa-user-secret" value="Guests" {{$bug->privacy == 'Guests'? 'selected' : ''}}>
                                                <span class="name">Guests</span>
                                            </option>

                                            <option data-icon="fas fa-user-friends" value="All Members" {{$bug->privacy == 'All Members'? 'selected' : ''}}>
                                                <span class="name">All Members</span>
                                            </option>
                                            <option data-icon="fas fa-user-cog" value="Custom Members" {{$bug->privacy == 'Custom Members'? 'selected' : ''}}>
                                                <span class="name">Custom Members</span>
                                            </option>
                                        </select>
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
                                    <input name="facebook_share" type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="" class="facebook-link"><i class="fab fa-facebook-f"></i></a>

                            </div>
                            <div class="twitter-share d-flex align-items-center">
                                <label class="container custom-checkbox">
                                    <input name="twitter_share" type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="" class="twitter-link"><i class="fab fa-twitter"></i></a>
                            </div>

                        </div>
                    </div>
                </div>


            </div>

        </div>
@endif