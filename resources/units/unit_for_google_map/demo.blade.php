<style>
    #map {
        height: @if(isset($settings['height'])) {{$settings['height']}} @else {{'400px'}} @endif;
        width: @if(isset($settings['width'])) {{$settings['width']}} @else {{'100%'}} @endif;
        margin: auto;
        background-color: grey;
    }
    h3{
        width: 100%;
        text-align: center;
    }
</style>
<h3>@if(isset($settings['header'])) {{$settings['header']}} @else {{'My Google Maps'}} @endif </h3>

<div id="map"></div>
<div style="display: none" id="main_function">@if(isset($settings['main_function'])) {{$settings['main_function']}} @else 1 @endif</div>
<div style="display: none" id="lat">@if(isset($settings['lat'])) {{$settings['lat']}} @else {{10}} @endif</div>
<div style="display: none" id="lng">@if(isset($settings['lng'])) {{$settings['lng']}} @else {{10}} @endif</div>
<div style="display: none" id="from_lat">@if(isset($settings['from_lat'])) {{$settings['from_lat']}} @else {{41.85}} @endif</div>
<div style="display: none" id="from_lng">@if(isset($settings['from_lng'])) {{$settings['from_lng']}} @else {{-87.65}} @endif</div>
<div style="display: none" id="to_lat">@if(isset($settings['to_lat'])) {{$settings['to_lat']}} @else {{39.79}} @endif</div>
<div style="display: none" id="to_lng">@if(isset($settings['to_lng'])) {{$settings['to_lng']}} @else {{-86.14}} @endif</div>
<div style="display: none" id="styles">@if(isset($settings['style'])) {{$settings['style']}} @else {{'roadmap'}} @endif</div>
<div style="display: none" id="zoom">@if(isset($settings['zoom'])) {{$settings['zoom']}} @else {{0}} @endif</div>
<div style="display: none" id="mapType">@if(isset($settings['mapType'])) {{$settings['mapType']}} @else {{0}} @endif</div>
<div style="display: none" id="scale">@if(isset($settings['scale'])) {{$settings['scale']}} @else {{0}} @endif</div>
<div style="display: none" id="street">@if(isset($settings['street'])) {{$settings['street']}} @else {{0}} @endif</div>
<div style="display: none" id="rotate">@if(isset($settings['rotate'])) {{$settings['rotate']}} @else {{0}} @endif</div>
<div style="display: none" id="fullscreen">@if(isset($settings['fullscreen'])) {{$settings['fullscreen']}} @else {{0}} @endif</div>
<div style="display: none" id="icon">@if(isset($settings['icon'])) {{$settings['icon']}} @else {{0}} @endif</div>
<div style="display: none" id="icon_width">@if(isset($settings['icon_width'])) {{$settings['icon_width']}} @else {{20}} @endif</div>
<div style="display: none" id="icon_height">@if(isset($settings['icon_height'])) {{$settings['icon_height']}} @else {{20}} @endif</div>
<div style="display: none" id="drawing_manager">@if(isset($settings['drawing_manager'])) {{$settings['drawing_manager']}} @else {{0}} @endif</div>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var main_function = Number($('#main_function').text());
        var styles = Number($('#styles').text());
        var zoom;
        var mapType;
        var scale;
        var streetView;
        var rotate;
        var fullscreen;
        var draw_manager;
        if(Number($('#zoom').text()) == 1) zoom = true; else zoom = false;
        if(Number($('#mapType').text()) == 1) mapType = true; else mapTupe = false;
        if(Number($('#scale').text()) == 1) scale = true; else scaleControl = false;
        if(Number($('#street').text()) == 1) streetView = true; else streetView= false;
        if(Number($('#rotate').text()) == 1) rotate = true; else rotate = false;
        if(Number($('#fullscreen').text()) == 1) fullscreen = true; else fullscreen = false;
        if(Number($('#drawing_manager').text()) == 1) draw_manager = true; else draw_manager = false;
        if(isNaN(main_function)) main_function = 1;

        if(main_function == 1) {
            var lat = Number($('#lat').text());
            var lng = Number($('#lng').text());

            var uluru = {lat: lat, lng: lng};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 4, center: uluru,
                    mapTypeId: "roadmap",
                    disableDefaultUI: true,
                    zoomControl: zoom,
                    mapTypeControl: mapType,
                    scaleControl: scale,
                    streetViewControl: streetView,
                    rotateControl: rotate,
                    fullscreenControl: fullscreen});
            // The marker, positioned at Uluru
            var url = null;
            var icon_width = Number($('#icon_width').text());
            var icon_height = Number($('#icon_height').text());
            if(Number($("#icon").text()) !== 0) url = $("#icon").text();
            var icon = {
                url: url,
                scaledSize: new google.maps.Size(icon_width, icon_height),
                //origin: new google.maps.Point(0,0),
                //anchor: new google.maps.Point(0, 0)
            };
            var marker = new google.maps.Marker({position: uluru, map: map, icon: icon});
        }
        else if(main_function == 2){
            var from = {lat: Number($('#from_lat').text()), lng: Number($('#from_lng').text())};
            var to = {lat: Number($('#to_lat').text()), lng: Number($('#to_lng').text())};

            var map = new google.maps.Map(document.getElementById('map'), {
                center: from,
                zoom: 7,
                mapTypeId: "satellite",
                disableDefaultUI: true,
                zoomControl: zoom,
                mapTypeControl: mapType,
                scaleControl: scale,
                streetViewControl: streetView,
                rotateControl: rotate,
                fullscreenControl: fullscreen
            });
            var directionsDisplay = new google.maps.DirectionsRenderer({
                map: map
            });
            // Set destination, origin and travel mode.
            var request = {
                destination: to,
                origin: from,
                travelMode: "DRIVING",

            };
            // Pass the directions request to the directions service.
            var directionsService = new google.maps.DirectionsService();
            directionsService.route(request, function(response, status) {
                if (status == 'OK') {
                    // Display the route on the map.
                    directionsDisplay.setDirections(response);
                }
            });
        }
        if(styles == 0)
            map.setMapTypeId('roadmap');
        else if(styles == 1)
            map.setMapTypeId('satellite');
        else if(styles == 2)
            map.setMapTypeId('hybrid');
        else if(styles == 3)
            map.setMapTypeId('terrain');
        if(draw_manager) {
            var drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.MARKER,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: ['marker', 'circle', 'polygon', 'polyline', 'rectangle']
                },
                markerOptions: {icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'},
                circleOptions: {
                    fillColor: '#ffff00',
                    fillOpacity: 1,
                    strokeWeight: 5,
                    clickable: false,
                    editable: true,
                    zIndex: 1
                }
            });
            drawingManager.setMap(map);
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAud3CAgSUNCWBRlSZQjKz8a7M0RV7R_IA&callback=initMap&libraries=drawing"></script>


