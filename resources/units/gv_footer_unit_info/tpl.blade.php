<img src="{{url(BBgetSiteLogo())}}" alt="" class="logoImg" >
<h5>{{BBgetSiteName()}}</h5>

@if(isset($settings["footer_unit_info_description"]))
    <p class="desc">{{ $settings["footer_unit_info_description"] }}</p>
@endif