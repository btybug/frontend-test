<div class="custom_for_google {{isset($settings["container_style"])?$settings["container_style"]:''}} {{isset($settings["label_style"])?$settings["label_style"]:''}}">
    {!! Form::open(['url'=>route('save_shipping_address')]) !!}

    <div id="locationField">
        <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" name="general">
    </div>
    <table id="address">
        <tr>
            <td class="label">Street address</td>
            <td class="slimField">
                <input class="field" id="street_number" disabled="true" name="street_number">
            </td>
            <td class="wideField" colspan="2">
                <input class="field" id="route" disabled="true" name="street_address">
            </td>
        </tr>
        <tr>
            <td class="label">City</td>
            <td class="wideField" colspan="3">
                <input class="field" id="locality" disabled="true" name="city">
            </td>
        </tr>
        <tr>
            <td class="label">State</td>
            <td class="slimField">
                <input class="field" id="administrative_area_level_1" disabled="true" name="state">
            </td>
            <td class="label">Zip code</td>
            <td class="wideField">
                <input class="field" id="postal_code" disabled="true" name="zip_code">
            </td>
        </tr>
        <tr>
            <td class="label">Country</td>
            <td class="wideField" colspan="3">
                <input class="field" id="country" disabled="true" name="country">
            </td>
        </tr>
    </table>
    {!! Form::close() !!}
</div>

<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>

<script>
    window.onload = function (){
        $("body").delegate(".edit_address","click",function(){
            var token = $("input[name=_token]").val();
            var url = $(this).data("url");
            var key = $(this).data('key');

            var full_url = window.location.origin + '/admin/payments/user-payments/edit/save/'+key;
            $("form.remove_values input").not("input[name='_token']").val("");
            $("form.remove_values").attr("action",full_url);

            $.ajax({
                type:'post',
                url:url,
                data:{_token:token},
                success:function(data){
                    var key = data.key;
                    var arr = data.data;
                    $("#general").val(arr.general);
                    $("#street_numb").val(arr.street_number);
                    $("#rout").val(arr.street_address);
                    $("#city").val(arr.city);
                    $("#state").val(arr.state);
                    $("#zip_code").val(arr.zip_code);
                    $("#countr").val(arr.country);

                    $(".custom_for_google").addClass("custom_hide");
                    $(".main_lay_cont").removeClass("custom_hide");
                }
            });
        });
        $("body").delegate(".custom_add_new_address","click",function(){
            $(".main_lay_cont").addClass("custom_hide");
            $(".custom_for_google").removeClass("custom_hide");
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP5WutMrM_j9ubit8CT9xocuxTvULEXSI&libraries=places&callback=initAutocomplete" async defer></script>
{!! BBstyle($_this->path.DS.'css/main.css') !!}