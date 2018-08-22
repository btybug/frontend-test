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
                            <li><a href="{!! url('profiles/social/quick-bugs') !!}">
                                    <span><i class="fab fa-buromobelexperte"></i></span>Quick Bugs</a>
                            </li>
                            <li class="active"><a href="{!! url('profiles/social/travel') !!}">
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
                                                data-target="#bugModalTravel">
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="bugModalTravel" tabindex="-1" role="dialog" aria-labelledby="bugModalCenterTitle"
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
                    <div class="quick_bug travel_bug_form">
                        <div class="main-bug">
                            <div class="head">
                                <div class="d-flex">
                                    <div class="title-icon d-flex align-items-center">
                                        <i class="fas fa-globe-africa"></i>
                                        <span>Traveling</span>
                                    </div>

                                    <div class="daily d-flex align-items-center">
<span class="icon">
                    <i class="fas fa-train"></i>
                </span>
                                        <span class="name">By Train</span>
                                        <a class="more" href="javascript:void(0);" id="dropdownBugHead"
                                           data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            <span class="caret-down"><i class="fas fa-caret-down"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownBugHead">
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

                                <div id="added_costom_template" class="container-fluid">
                                    <div data-group="location" class="form-group row align-items-center">
                                        <div class="left-group pl-0">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="travel_loc_from">
                                                            <span>From</span>
                                                        </div>

                                                        <div class="maps">
                                                            <div class="map-search">
                                                                <div class="map-box" >
                                                                    <div id="map">
                                                                    </div>
                                                                </div>
                                                                <div class="location-input">
                                                                    <div class="input-group">
                                                                        <div class="input-group-append none-cl">
                                                                            <button class="btn btn-outline-secondary"
                                                                                    type="button">
                                                                                <i class="fas fa-map-marker-alt"></i>
                                                                            </button>

                                                                        </div>

                                                                        {!! Form::text('location[name]',null,['class' => 'controls form-control','placeholder' => 'Enter Location','id' => 'pac-input']) !!}
                                                                        {!! Form::hidden('location[lang]',null,['class' => 'location_lang']) !!}
                                                                        {!! Form::hidden('location[lat]',null,['class' => 'location_lat']) !!}
                                                                        <div class="input-group-append blue-light-cl">
                                                                            <button class="btn btn-outline-secondary get-geolocation"
                                                                                    type="button">
                                                                                <i class="fas fa-crosshairs"></i>
                                                                            </button>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>


                                                        <div class="left-group">
                                                            <div class="input-group">
                                                                <div class="input-group-prepend green_gradient-cl">
                                                                    <button class="btn btn-outline-secondary"
                                                                            type="button">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                    </button>

                                                                </div>
                                                                <input name="location" type="text" class="form-control"
                                                                       placeholder="Enter location">
                                                                <div class="input-group-prepend green_gradient-cl">
                                                                    <button class="btn btn-outline-secondary"
                                                                            type="button">
                                                                        <i class="fas fa-crosshairs"></i>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                            {{--<div class="map-custom">--}}
                                                                {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.72810776133!2d-0.24168051295924747!3d51.52877184056342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2s!4v1534333971160"--}}
                                                                        {{--width="100%" height="195" frameborder="0"--}}
                                                                        {{--style="border:0" allowfullscreen></iframe>--}}
                                                            {{--</div>--}}
                                                        </div>
                                                    </div>

                                                </div>
                                                {{--<div class="col-6">--}}
                                                    {{--<div class="d-flex justify-content-between">--}}
                                                        {{--<div class="travel_loc_from">--}}
                                                            {{--<span>To</span>--}}
                                                        {{--</div>--}}

                                                        {{--<div class="left-group">--}}
                                                            {{--<div class="input-group">--}}
                                                                {{--<div class="input-group-prepend blue_gradient-cl">--}}
                                                                    {{--<button class="btn btn-outline-secondary"--}}
                                                                            {{--type="button">--}}
                                                                        {{--<i class="fas fa-map-marker-alt"></i>--}}
                                                                    {{--</button>--}}

                                                                {{--</div>--}}
                                                                {{--<input name="location" type="text" class="form-control"--}}
                                                                       {{--placeholder="Enter location">--}}
                                                                {{--<div class="input-group-prepend blue-grad-cl">--}}
                                                                    {{--<button class="btn btn-outline-secondary"--}}
                                                                            {{--type="button">--}}
                                                                        {{--<i class="fas fa-crosshairs"></i>--}}
                                                                    {{--</button>--}}

                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="map-custom">--}}
                                                                {{--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.72810776133!2d-0.24168051295924747!3d51.52877184056342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z0JvQvtC90LTQvtC9LCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2s!4v1534333971160"--}}
                                                                        {{--width="100%" height="195" frameborder="0"--}}
                                                                        {{--style="border:0" allowfullscreen></iframe>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            </div>

                                        </div>
                                    </div>
                                    <div class="happy row align-items-center">
                                        <div class="title">
                                        <textarea name="bugit" id="" cols="30" rows="10"
                                                  placeholder="Bug Sumething..."></textarea>
                                        </div>
                                        <div class="icon">
                                            <i class="far fa-smile"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="bottom">
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <div class="icons">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="" class="hashtag-link active"><span
                                                            class="blue-cl-icon"><i class="fas fa-hashtag"></i></span></a>
                                            </li>
                                            <li class="list-inline-item"><a href="" class="at-link active"><span
                                                            class="red-cl-icon"><i class="fas fa-at"></i></span></a></li>
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
                           data-role="tagsinput">

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
                    <input type="search " name="youtube" class="form-control search-youtube" placeholder="Search Youtube">
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
                    <input name="favorites" type="text" class="form-control" placeholder="Gif">
                </div>
            </div>
            <div class="right-group">
                <a href="" class="del-icon" data-delgroup="del-star"><i class="fas fa-times"></i></a>
            </div>
        </div>
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

        $(function () {
            $("#q").autocomplete({
                source: "search/autocomplete",
                minLength: 3,
                select: function (event, ui) {
                    $('#q').val(ui.item.value);
                }
            });
        });

    </script>
    <script src="{!!url('https://apis.google.com/js/client.js?onload=init')!!}"></script>

    <script>

            function initAutocomplete() {

                var map = new google.maps.Map(document.getElementById('map'), {

                    center: {
                        lat: $(".location_lat").val() ? Number($(".location_lat").val()) : 40.7929026,
                        lng: $(".location_lang").val() ? Number($(".location_lang").val()) : 43.84649710000008

                    },
                    zoom: 13,
                    mapTypeId: 'roadmap',
                });

                var marker = new google.maps.Marker({
                    position: {
                        lat: $(".location_lat").val() ? Number($(".location_lat").val()) : 40.7929026,
                        lng: $(".location_lang").val() ? Number($(".location_lang").val()) : 43.84649710000008

                    },
                    map: map,
                    title: $("#pac-input").val()
                });
                if ($(".location_lang").val() || $(".location_lat").val()) {
                    $(".map-box").show()
                }
                // Create the search box and link it to the UI element.
                var input = document.getElementById('pac-input');
                var searchBox = new google.maps.places.SearchBox(input);

                // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                console.log(55);
                // Bias the SearchBox results towards current map's viewport.
                map.addListener('bounds_changed', function (event) {
                    searchBox.setBounds(map.getBounds());

                });

                var markers = [];
                // Listen for the event fired when the user selects a prediction and retrieve
                // more details for that place.
                searchBox.addListener('places_changed', function (event) {
                    $(".map-box").show()
                    var places = searchBox.getPlaces();
                    if (places.length == 0) {
                        return;
                    }


                    // Clear out the old markers.
                    markers.forEach(function (marker) {
                        marker.setMap(null);
                    });
                    markers = [];

                    // For each place, get the icon, name and location.
                    var bounds = new google.maps.LatLngBounds();
                    places.forEach(function (place) {
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



        // $("body").on("click", ".get-geolocation", getLocation)


        // function getLocation() {
        //     if (navigator.geolocation) {
        //         navigator.geolocation.getCurrentPosition(showPosition);
        //     } else {
        //         x.innerHTML = "Geolocation is not supported by this browser.";
        //     }
        // }

        // function showPosition(position) {
        //     console.log(position);
        //     // x.innerHTML = "Latitude: " + position.coords.latitude +
        //     // "<br>Longitude: " + position.coords.longitude;
        // }

    </script>
    <script src="{!!url('https://maps.googleapis.com/maps/api/js?key=AIzaSyCVyIau4tPD0XGRT6ANMUfhYzdv6G79SI0&libraries=places&callback=initAutocomplete" async defer')!!}"></script>
@stop