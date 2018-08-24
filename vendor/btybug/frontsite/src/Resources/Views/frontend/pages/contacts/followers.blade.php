@extends('btybug::layouts.static_pages')
@section('content')
    <div class="site-manage-content">
        <div class="content-pages container-fluid">
            <div class="row">
                <div class="col-md-2 pl-0">
                    <div class="menu">
                        {{--<ul>
                            <li class="active"><a href="{{route('front_page_social_contacts_followers')}}">
                                    <span><i class="fas fa-people-carry"></i></span>Followers</a>
                            </li>
                            <li><a href="{{route('front_page_social_contacts_following')}}">
                                    <span><i class="fas fa-shoe-prints"></i></span>Following</a>
                            </li>
                            <li><a href="{{route('front_page_social_contacts_networks')}}">
                                    <span><i class="fab fa-buromobelexperte"></i></span>Networks</a>
                            </li>
                        </ul>--}}
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="right-content">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('menu')
    @include('btybug::_partials.front_user_menu',['items'=>[
    ['title'=>'Followers','url'=> route('front_page_social_contacts_followers')],
    ['title'=>'Following','url'=> route('front_page_social_contacts_following')],
    ['title'=>'Networks','url'=> route('front_page_social_contacts_networks')]
    ],'active'=>'Followers'])
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