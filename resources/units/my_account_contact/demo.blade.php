<div class="col-md-9">
    <div class="profile-main">
        <div class="profile-contact">
            <div class="contact-head">
                <h3>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    contact me
                </h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus, aliquid corporis
                    deserunt dignissimos dolore dolorum ex excepturi fugit harum itaque magni maiores,
                    nostrum numquam quasi qui reprehenderit repudiandae temporibus?
                </p>
            </div>
            <div class="contact-bottom">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="contact-left">

                            <div class="cont-item phone">
                                <h4>phone</h4>
                                <div class="cont-numbers">
                                    <p>
                                        <span>Mob.</span>{{Auth::user()->phone_number}}
                                    </p>
                                    <p>
                                        <span>Home</span>+0 123456789
                                    </p>
                                    <p>
                                        <span>Skype</span>lorem
                                    </p>
                                </div>
                            </div>

                            <div class="cont-item email">
                                <h4>email</h4>
                                <div class="cont-numbers">
                                    <p>{{Auth::user()->email}}</p>
                                    <p>mail@example.com</p>
                                </div>
                            </div>

                            <div class="cont-item address">
                                <h4>address</h4>
                                <div class="cont-numbers">
                                    <p>{{Auth::user()->address}}</p>
                                    <p><a href="#" class="website">{{Auth::user()->website}}</a></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="contact-right">
                            <input type="hidden" id="lat" value="{{(float)Auth::user()->lat}}">
                            <input type="hidden" id="lng" value="{{(float)Auth::user()->lng}}">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var marker;
            function initMap() {
                var lat = parseFloat(document.getElementById("lat").value);
                var lng = parseFloat(document.getElementById("lng").value);
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: {lat: lat, lng: lng}
                });

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    position: {lat: lat, lng: lng}
                });
                marker.addListener('click', toggleBounce);
                marker.addListener('dragend', function(event) {
                    var lat = event.latLng.lat();
                    var lng = event.latLng.lng();
                    document.getElementById('lat').value = lat;
                    document.getElementById('lng').value = lng;
                });
            }

            function toggleBounce() {
                if (marker.getAnimation() !== null) {
                    marker.setAnimation(null);
                } else {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                }
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP5WutMrM_j9ubit8CT9xocuxTvULEXSI&callback=initMap">
        </script>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}