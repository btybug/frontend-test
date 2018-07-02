{!! BBstyle($_this->path.DS.'css/main.css') !!}

{!! BBstyle($_this->path.DS.'css/intlTelInput.css') !!}

<form>
    <div class="{{isset($settings["flag_style"]) ? $settings["flag_style"] : ''}} {{isset($settings["input_style"]) ? $settings["input_style"] : ''}} {{isset($settings["list_style"]) ? $settings["list_style"] : ''}}">
        <input id="phone" type="tel">
    </div>
</form>

<style>
    .iti-flag {
        width: 20px;
        height: 15px;
        box-shadow: 0px 0px 1px 0px #888;
        background-image: url({{url('resources/units/field_phone_with_std_code/img/flags.png')}});
        background-repeat: no-repeat;
        background-color: #DBDBDB;
        background-position: 20px 0; }
    @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {
        .iti-flag {
            background-image: url({{url('resources/units/field_phone_with_std_code/img/flags@2x.png')}});
        }
    }
</style>

{!! BBscript($_this->path.DS.'js/intlTelInput.min.js') !!}
{!! BBscript($_this->path.DS.'js/utils.js') !!}

<script>
    $(document).ready(function () {
        $("#phone").intlTelInput({
            autoPlaceholder:'aggressive',
            utilsScript:'js/utils.js'
        });
    });

</script>