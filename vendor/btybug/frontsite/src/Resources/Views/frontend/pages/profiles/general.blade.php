@extends('btybug::layouts.static_pages')
@section('content')
    <div class="site-manage-content">
        <div class="content-pages container-fluid">
            <div class="row">
                <div class="col-md-2 pl-0">
                    <div class="menu">
                        <ul>
                            <li class="active"><a href="{!! url('profiles/social/general') !!}">
                                    <span><i class="fab fa-buromobelexperte"></i></span>General</a>
                            </li>
                            <li><a href="{!! url('profiles/social/quick-bugs') !!}">
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
                        {!! Form::model($social_profile,array('route' => 'front_page_account_profiles_save','files' => true )) !!}
                        {!! Form::hidden('id',null) !!}
                        <div class="manage-settings row ">
                            <div class="col-xl-6">
                                <div class="settings-left">

                                    <div class="form-group row align-items-center">
                                        <label for="site_name" class="col-sm-3 col-form-label">Site
                                            Name</label>
                                        <div class="col-sm-8 pl-0">
                                            <div class="input-group">
                                                {!! Form::text('site_name',null,
                                        ['class' => 'form-control','id'=> 'site_name','aria-label' => 'Text input with dropdown button']) !!}
                                                <div class="input-group-append blue-cl">
                                                    <button class="btn btn-outline-secondary" type="button">
                                                        <i class="fas fa-globe-asia"></i></button>
                                                </div>
                                            </div>
                                            @if($errors->has('display_name'))
                                                {{ $errors->first('display_name') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        {{Form::label('email', 'Email', array('class' => 'col-sm-3 col-form-label'))}}
                                        <div class="col-sm-8 pl-0">
                                            <div class="input-group">
                                                {!! Form::email('display_email',null,
                                                    ['class' => 'form-control','id'=> 'email','aria-label' => 'Text input with dropdown button']) !!}
                                                <div class="input-group-append red-cl">
                                                    <button class="btn btn-outline-secondary dropdown-toggle"
                                                            type="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fas fa-lock"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-globe-asia icon-blue"></i>
                                                            <span class="name">Public</span>
                                                        </a>
                                                        <a class="dropdown-item active" href="#">
                                                            <i class="fas fa-user-friends icon-green"></i>
                                                            <span class="name">Members</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-user-friends icon-purple"></i>
                                                            <span class="name">All Members</span>
                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-lock icon-red"></i>
                                                            <span class="name">Only Me</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($errors->has('display_email'))
                                                {{ $errors->first('display_email') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        {{Form::label('proffesion', 'Proffesion', array('class' => 'col-sm-3 col-form-label'))}}
                                        <div class="col-sm-8 pl-0">
                                            <div class="input-group">
                                                {!! Form::text('proffesion',null,
                                        ['class' => 'form-control','id'=> 'proffesion','aria-label' => 'Text input with dropdown button']) !!}
                                                <div class="input-group-append green-cl">
                                                    <button class="btn btn-outline-secondary dropdown-toggle"
                                                            type="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fas fa-user-friends"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-globe-asia icon-blue"></i>
                                                            <span class="name">Public</span>
                                                        </a>
                                                        <a class="dropdown-item active" href="#">
                                                            <i class="fas fa-user-friends icon-green"></i>
                                                            <span class="name">Members</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-user-friends icon-purple"></i>
                                                            <span class="name">All Members</span>
                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-lock icon-red"></i>
                                                            <span class="name">Only Me</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 pl-0">
                                            <span class="view">View</span>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        {{Form::label('gender', 'Gender', array('class' => 'col-sm-3 col-form-label'))}}
                                        <div class="col-sm-6 pl-0">
                                            <div class="input-group flex-nowrap">
                                                <div class="custom_select">
                                                    {!! Form::select('gender',['' => 'Select','f' => 'Female', 'm' => 'Male'],null,
                                                        ['class' => 'form-control','id'=> 'gender']) !!}
                                                </div>

                                                <div class="input-group-append blue-cl">
                                                    <button class="btn btn-outline-secondary dropdown-toggle"
                                                            type="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fas fa-globe-asia"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-globe-asia icon-blue"></i>
                                                            <span class="name">Public</span>
                                                        </a>
                                                        <a class="dropdown-item active" href="#">
                                                            <i class="fas fa-user-friends icon-green"></i>
                                                            <span class="name">Members</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-user-friends icon-purple"></i>
                                                            <span class="name">All Members</span>
                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-lock icon-red"></i>
                                                            <span class="name">Only Me</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($errors->has('gender'))
                                                {{ $errors->first('gender') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        {{Form::label('country', 'Country', array('class' => 'col-sm-3 col-form-label'))}}
                                        <div class="col-sm-6 pl-0">
                                            <div class="input-group flex-nowrap">
                                                <div class="custom_select">
                                                    {!! Form::select('country',['' => 'Select','UK' => 'UK', 'RU' => 'RU','IT' => 'UK'],null,
                                                     ['class' => 'form-control','id'=> 'country']) !!}
                                                </div>

                                                <div class="input-group-append blue-cl">
                                                    <button class="btn btn-outline-secondary dropdown-toggle"
                                                            type="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fas fa-globe-asia"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-globe-asia icon-blue"></i>
                                                            <span class="name">Public</span>
                                                        </a>
                                                        <a class="dropdown-item active" href="#">
                                                            <i class="fas fa-user-friends icon-green"></i>
                                                            <span class="name">Members</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-user-friends icon-purple"></i>
                                                            <span class="name">All Members</span>
                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-lock icon-red"></i>
                                                            <span class="name">Only Me</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-sm-3 col-form-label">Data of Birth</label>

                                        <div class="col-sm-8 pl-0">
                                            <div class="d-flex">
                                                <div class="col-2 p-0">
                                                    {!! Form::text('day',null,
                                       ['class' => 'form-control','id'=> 'day','placeholder' => 'DD']) !!}
                                                </div>
                                                <div class="col-3 p-0">
                                                    <div class="input-group">
                                                        {!! Form::text('month',null,
                                        ['class' => 'form-control','id'=> 'month','placeholder' => 'MM','aria-label' => 'Text input with dropdown button']) !!}
                                                        <div class="input-group-append green-cl">
                                                            <button class="btn btn-outline-secondary dropdown-toggle"
                                                                    type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="fas fa-user-friends"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-globe-asia icon-blue"></i>
                                                                    <span class="name">Public</span>
                                                                </a>
                                                                <a class="dropdown-item active" href="#">
                                                                    <i class="fas fa-user-friends icon-green"></i>
                                                                    <span class="name">Members</span>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-user-friends icon-purple"></i>
                                                                    <span class="name">All Members</span>
                                                                </a>

                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-lock icon-red"></i>
                                                                    <span class="name">Only Me</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2 align-self-center">
                                                    <span class="view">View</span>
                                                </div>
                                                <div class="col-5 p-0">
                                                    <div class="input-group">
                                                        {!! Form::text('year',null,
                                                                ['class' => 'form-control','id'=> 'year','placeholder' => 'YYYY','aria-label' => 'Text input with dropdown button']) !!}
                                                        <div class="input-group-append red-cl">
                                                            <button class="btn btn-outline-secondary dropdown-toggle"
                                                                    type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="fas fa-lock"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-globe-asia icon-blue"></i>
                                                                    <span class="name">Public</span>
                                                                </a>
                                                                <a class="dropdown-item active" href="#">
                                                                    <i class="fas fa-user-friends icon-green"></i>
                                                                    <span class="name">Members</span>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-user-friends icon-purple"></i>
                                                                    <span class="name">All Members</span>
                                                                </a>

                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-lock icon-red"></i>
                                                                    <span class="name">Only Me</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center group-for-tags">
                                        {{Form::label('displaytags', 'Tags', array('class' => 'col-sm-3 col-form-label'))}}
                                        <div class="col-sm-8 pl-0">
                                            <div class="input-group">
                                                {!! Form::text('tags',null,
                                                                ['class' => 'form-control tags_custom','id'=> 'displaytags','data-role' => 'tagsinput','aria-label' => 'Text input with dropdown button']) !!}
                                                <div class="input-group-append blue-cl">
                                                    <button class="btn btn-outline-secondary dropdown-toggle"
                                                            type="button" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false"><i
                                                                class="fas fa-globe-asia"></i></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-globe-asia icon-blue"></i>
                                                            <span class="name">Public</span>
                                                        </a>
                                                        <a class="dropdown-item active" href="#">
                                                            <i class="fas fa-user-friends icon-green"></i>
                                                            <span class="name">Members</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-user-friends icon-purple"></i>
                                                            <span class="name">All Members</span>
                                                        </a>

                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-lock icon-red"></i>
                                                            <span class="name">Only Me</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        {{Form::label('socialMedia', 'Social Media', array('class' => 'col-sm-3 col-form-label'))}}
                                        <div class="col-sm-9 pl-0 social-medias-links">
                                            <div class="d-flex">
                                                <div class="col-sm-11 pl-0">
                                                    <div class="input-group">
                                                        <div class="input-group-append blue-cl">
                                                            <button class="btn btn-outline-secondary dropdown-toggle"
                                                                    type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"><i
                                                                        class="fas fa-globe-asia"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fab fa-facebook-f icon-blue"></i>
                                                                    <span class="name">Facebook</span>
                                                                </a>
                                                                <a class="dropdown-item active" href="#">
                                                                    <i class="fab fa-twitter icon-green"></i>
                                                                    <span class="name">Twitter</span>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fab fa-yahoo icon-purple"></i>
                                                                    <span class="name">Yahoo</span>
                                                                </a>

                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fab fa-google icon-red"></i>
                                                                    <span class="name">Google</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        {!! Form::text('social_media[]', null, ['class' => 'form-control','id' => 'socialMedia','placeholder' => 'Profile URL','aria-label' => 'Text input with dropdown button']) !!}
                                                        <div class="input-group-append blue-cl">
                                                            <button class="btn btn-outline-secondary dropdown-toggle"
                                                                    type="button" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false"><i
                                                                        class="fas fa-globe-asia"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-globe-asia icon-blue"></i>
                                                                    <span class="name">Public</span>
                                                                </a>
                                                                <a class="dropdown-item active" href="#">
                                                                    <i class="fas fa-user-friends icon-green"></i>
                                                                    <span class="name">Members</span>
                                                                </a>
                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-user-friends icon-purple"></i>
                                                                    <span class="name">All Members</span>
                                                                </a>

                                                                <a class="dropdown-item" href="#">
                                                                    <i class="fas fa-lock icon-red"></i>
                                                                    <span class="name">Only Me</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1 pl-0 align-self-center">
                                                    <div class="pl-0 align-self-end socialmedia-add">
                                                        <span class="add-icon"><i class="fas fa-plus"></i></span>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 offset-xl-1">
                                <div class="settings-right">
                                    {!! BBmediaButton('site_image',$social_profile,['version'=>4,'html'=>'<div class="images-name d-flex mb-4">
                                        <div class="col-11 pr-0">
                                            <div class="image">
                                                <img class="image-main" src="/public/images/girl-cover.jpg" alt="">
                                                <div class="site-image">
                                                    <span class="btnsettingsModal  media-modal-open">Site Image</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1 p-0">
                                        </div>
                                    </div>
                                    ']) !!}

                                    <div class="maps d-flex">
                                        <div class="col-11 pr-0">
                                            <div class="map-search">
                                                <div class="map-box" style="display: none">
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
                                                            <button class="btn btn-outline-secondary get-geolocation" type="button">
                                                                <i class="fas fa-crosshairs"></i>
                                                            </button>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-1 p-0">
                                            <div class="input-group-append blue-cl">
                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                        type="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"><i
                                                            class="fas fa-lock"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-globe-asia icon-blue"></i>
                                                        <span class="name">Public</span>
                                                    </a>
                                                    <a class="dropdown-item active" href="#">
                                                        <i class="fas fa-user-friends icon-green"></i>
                                                        <span class="name">Members</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-user-friends icon-purple"></i>
                                                        <span class="name">All Members</span>
                                                    </a>

                                                    <a class="dropdown-item" href="#">
                                                        <i class="fas fa-lock icon-red"></i>
                                                        <span class="name">Only Me</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{Form::submit('Save',  array('class' => 'btn btn-lg btn-warning save_button'))}}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
        {!! BBextraHtml() !!}
    </div>
@stop
@section('menu')
    @include('btybug::_partials.front_user_menu',['items'=>[
    ['title'=>'Social','url'=>'profiles/social/genera'],
    ],'active'=>'Social'])
@stop

@section('css')
    <link rel="stylesheet" href="{!!url('public/libs/tagsinput/bootstrap-tagsinput.css')!!}">
    <link rel="stylesheet" href="{!!url('public/minicms/css/social.css?v='.rand(111,999))!!}">
@stop
@section('js')
    <script src="{!!url('public/libs/tagsinput/bootstrap-tagsinput.min.js')!!}"></script>

    <script>

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