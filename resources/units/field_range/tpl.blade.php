{!! BBstyle($_this->path.DS.'css/main.css',$_this) !!}

@if(isset($settings['range_inp']))
        <input type="range" class="range {{$settings['range_inp']}}" {{isset($settings['range_min'])?'min='.$settings['range_min']:''}}
        {{isset($settings['range_max'])?'max='.$settings['range_max']:''}} {{isset($settings['range_start'])?'value='.$settings['range_start']:''}} >
@endif

