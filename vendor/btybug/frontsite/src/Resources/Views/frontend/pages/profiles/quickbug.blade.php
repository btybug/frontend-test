@extends('btybug::layouts.static_pages')
@section('content')
<div class="site-manage-content">
    <div class="content-pages container-fluid">
        <div class="row">
            <div class="col-md-2 pl-0">
                <div class="menu">
                    <ul>
                        <li ><a href="{!! url('profiles/social/general') !!}">
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
                                            <button type="button" class="btn btn-link " data-toggle="modal" data-target="#bugModalCenter">
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
                                <div class="all-content">
                                    <div class="daily">

                    <span> <img src="/public/images/girl2.png" alt=""><span
                                style="margin-left: 20px">Rania Davan</span></span>
                                        <div><span style="margin-right: 40px; letter-spacing: 1px"><i class="fas fa-calendar-alt"
                                                                                                      style="padding-right: 10px"></i> Daily</span>
                                            <i class="fas fa-caret-down"></i></div>
                                    </div>
                                    <div class="pm">
                                        <span>Yesterday At 06:17 PM</span>
                                        <i class="fas fa-thumbtack"></i>
                                    </div>
                                    <div class="text">
                                        <p>
                                            I had a great time with you <br>
                                            I want to see you again <br>
                                            Thank you for your nice conversation with me during your stay <br>
                                            Many many thanks
                                        </p>
                                    </div>
                                    <div class="button1 d-flex align-items-center">
                                        <i class="fas fa-at"></i>
                                        <button type="button" class="btn btn-primary">Johan Smith</button>
                                        <button type="button" class="btn btn-primary">Jack Wilth</button>
                                        <button type="button" class="btn btn-primary">Rania Dewell</button>
                                        <button type="button" class="btn btn-primary">...</button>
                                    </div>
                                    <div class="button2 d-flex align-items-center">
                                        <i class="fas fa-hashtag"></i>
                                        <button type="button" class="btn btn-primary">Friendship</button>
                                        <button type="button" class="btn btn-primary">Friends</button>
                                        <button type="button" class="btn btn-primary">Love</button>
                                    </div>
                                    <div class="img-friend">
                                        <img src="/public/images/layer12.jpg" alt="">
                                    </div>
                                    <div class="container-fluid foot">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <i class="far fa-comment-alt" style="color: #cb473b"></i>
                                                <span style="margin-left: 30px">Comment</span>
                                                <span style="margin-left: 30px">63</span>
                                            </div>
                                            <div class="col-md-1 d-flex justify-content-center">
                                                <i class="fas fa-plus" style="color: #6ebf69"></i>
                                            </div>
                                            <div class="col-md-2 d-flex justify-content-center">
                                                <span style="color: #3488b0">125,850</span>
                                            </div>
                                            <div class="col-md-1 d-flex justify-content-center">
                                                <i class="fas fa-minus" style="color: #d45f3a"></i>
                                            </div>
                                            <div class="col-md-4 d-flex justify-content-end">
                                                <i class="fas fa-bug" style="color: #5db96d; margin-right: 30px"></i>
                                                <span>Rebug</span>
                                                <span style="margin-left: 30px">190</span>
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
<div class="modal fade" id="bugModalCenter" tabindex="-1" role="dialog" aria-labelledby="bugModalCenterTitle" aria-hidden="true">
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
                                    <a class="more" href="javascript:void(0);" id="dropdownBugHead" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <span class="caret-down"><i class="fas fa-caret-down"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownBugHead">
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                                    class="title">Item1</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                                    class="title">Item2</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog"></i><span
                                                    class="title">Item3</span></a>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="main-content">
                            <div class="happy d-flex align-items-center">
                                <div class="title">
                                    <textarea name="" id="" cols="30" rows="10" placeholder="Bug Sumething..."></textarea>
                                </div>
                                <div class="icon">
                                    <i class="far fa-smile"></i>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <form action="">
                                    <div data-group="hashtag" hidden class="form-group row align-items-center group-for-tags">
                                        <div class="left-group pl-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend blue-cl">
                                                    <button class="btn btn-outline-secondary"
                                                            type="button">
                                                        <i class="fas fa-hashtag"></i>
                                                    </button>

                                                </div>
                                                <input type="text" class="form-control tags_bug_custom"
                                                       value="Freindship" data-role="tagsinput">

                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                                    <div data-group="at" hidden class="form-group row align-items-center">
                                        <div class="left-group pl-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend red-cl">
                                                    <button class="btn btn-outline-secondary"
                                                            type="button">
                                                        <i class="fas fa-at"></i>
                                                    </button>

                                                </div>
                                                <input type="text" class="form-control" placeholder="Mention Friends">
                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                    <div data-group="sign" hidden class="form-group row align-items-center">
                                        <div class="left-group pl-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend green-cl">
                                                    <button class="btn btn-outline-secondary"
                                                            type="button">
                                                        <i class="fas fa-lira-sign"></i>
                                                    </button>

                                                </div>
                                                <input type="text" class="form-control" placeholder="With...">
                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                    <div data-group="youtube" hidden class="form-group row align-items-center">
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
                                                <input type="search" class="form-control" placeholder="Search Youtube">
                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>


                                    <div data-group="images" hidden class="form-group row align-items-center">
                                        <div class="left-group pl-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend purple-cl">

                                                    {!! BBmediaButton('site_image',null,['version'=>4,'html'=>'
                                       <button class="btn btn-outline-secondary btnsettingsModal  media-modal-open h-100"
                                                            type="button">
                                                        <i class="far fa-images"></i>
                                                    </button>']) !!}




                                                </div>
                                                <input type="text" class="form-control" placeholder="Url">
                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                    <div data-group="music" hidden class="form-group row align-items-center">
                                        <div class="left-group pl-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend blue-cl">
                                                    <button class="btn btn-outline-secondary"
                                                            type="button">
                                                        <i class="fas fa-music"></i>
                                                    </button>

                                                </div>
                                                <input type="text" class="form-control" placeholder="Mention Friends">
                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                    <div data-group="star" hidden class="form-group row align-items-center">
                                        <div class="left-group pl-0">
                                            <div class="input-group">
                                                <div class="input-group-prepend red-cl">
                                                    <button class="btn btn-outline-secondary"
                                                            type="button">
                                                        <i class="far fa-star"></i>
                                                    </button>

                                                </div>
                                                <input type="text" class="form-control" placeholder="Mention Friends">
                                            </div>
                                        </div>
                                        <div class="right-group">
                                            <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>

                                    <div data-group="location" hidden class="form-group row align-items-center">
                                        <div class="left-group pl-0">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend blue-cl">
                                                            <button class="btn btn-outline-secondary"
                                                                    type="button">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </button>

                                                        </div>
                                                        <input type="text" class="form-control" placeholder="With...">
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
                                                            <a href="" class="del-icon"><i class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="right-group">
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                        <div class="bottom">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="icons">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="" class="hashtag"><span class="blue-cl-icon"><i class="fas fa-hashtag"></i></span></a></li>
                                        <li class="list-inline-item"><a href="" class="at"><span class="red-cl-icon"><i class="fas fa-at"></i></span></a></li>
                                        <li class="list-inline-item"><a href="" class="sign"><span class="green-cl-icon"><i class="fas fa-lira-sign"></i></span></a></li>
                                        <li class="list-inline-item"><a href="" class="youtube"><span class="orange-cl-icon"><i class="fab fa-youtube"></i></span></a></li>
                                        <li class="list-inline-item"><a href="" class="images"><span class="purple-cl-icon"><i class="far fa-images"></i></span></a></li>
                                        <li class="list-inline-item"><a href="" class="music"><span class="blue-cl-icon"><i class="fas fa-music"></i></span></a></li>
                                        <li class="list-inline-item"><a href="" class="star"><span class="red-light-cl-icon"><i class="far fa-star"></i></span></a></li>
                                        <li class="list-inline-item"><a href="" class="location"><span class="orange-cl-icon"><i class="fas fa-map-marker-alt"></i></span></a></li>
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
                                        <button class="btn btn-link">Bug It</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
@stop
@section('js')
    <script src="{!!url('public/libs/tagsinput/bootstrap-tagsinput.min.js')!!}"></script>
@stop