<?php
$user = auth()->user();
?>
<div class="col-md-6">
    <h3>My Details</h3>
    <div class="my_details">
        {!! Form::open(['url'=>route('user_change_details'),'class'=>'form-horizontal']) !!}
        <div class="form-group">
            <label class="col-md-2 control-label">Username</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user-secret"></i>
                        </span>
                    <input type="text" class="form-control1 icon" name="username" placeholder="username" value="{{$user->username}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Email</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-at"></i>
                        </span>
                    <input type="email" class="form-control1 icon" name="email" placeholder="email" value="{{$user->email}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">First Name</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                    <input type="text" class="form-control1 icon" name="f_name" placeholder="first name" value="{{$user->f_name}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Last Name</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                    <input type="text" class="form-control1 icon" name="l_name" placeholder="last name" value="{{$user->l_name}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Address</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-address-card"></i>
                        </span>
                    <input type="text" class="form-control1 icon" name="address" placeholder="address" value="{{$user->address}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Phone Number</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                    <input type="tel" class="form-control1 icon" name="phone_number" placeholder="phone number" value="{{$user->phone_number}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label">Website</label>
            <div class="col-md-8">
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-globe"></i>
                        </span>
                    <input type="text" class="form-control1 icon" name="website" placeholder="website" value="{{$user->website}}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">About</label>
            <div class="col-sm-8">
                <textarea name="about" cols="50" rows="4" class="form-control1" title="Enter your text here..." placeholder="about">{{$user->about}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8">
                <input type="hidden" id="lat" value="{{(float)$user->lat}}" name="lat">
                <input type="hidden" id="lng" value="{{(float)$user->lng}}" name="lng">
            </div>
        </div>
        <div id="map"></div>
        <div class="form-group button">
            <a href="/my-account">Back</a>
            <button type="submit">Save</button>
        </div>
        {!! Form::close() !!}

        <script>
            var marker;
            function initMap() {
                var lat = parseFloat(document.getElementById('lat').value);
                var lng = parseFloat(document.getElementById('lng').value);

                if(!lat){
                    lat = 59.327;
                }
                if(!lng){
                    lng = -18.067;
                }
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

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}