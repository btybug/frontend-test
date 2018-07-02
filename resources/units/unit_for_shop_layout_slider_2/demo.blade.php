@if(isset($settings["images"]) && is_array($settings["images"]))
    <div id="{{isset($settings["type"]) ? $settings['type'] : 'nbullet-pagination'}}" class="gallery {{(isset($settings["type"]) && $settings['type'] == 'show-three-slides') ? 'custum_image_size' : '' }}">
        @foreach($settings["images"] as $key => $setting)
            @if($setting['path'] != null)
                <img src="{{$setting['path']}}" alt="">
            @endif
        @endforeach
    </div>
@endif



<script type="text/javascript" src="http://cdn.jsdelivr.net/hammerjs/2.0.3/hammer.min.js"></script>

{!! BBscript($_this->path.DS.'js'.DS.'FlameViewportScale.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'jquery.tosrus.all.min.js',$_this) !!}

{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'jquery.tosrus.all.css') !!}


{!! BBstyle($_this->path.DS.'css'.DS.'styles.css') !!}
