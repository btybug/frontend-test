<div class="bty-panel-collapse">
    <div>
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseunitbanner" aria-expanded="true">
            <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            <span class="title">Slider</span>
        </a>
    </div>
    <div class="form-group">
        <div>
            <input id="first" class="bty-input-radio-1" type="radio" value="nbullet-pagination" name="type" {{!isset($settings['type']) ? 'checked' : ''}} {{(isset($settings['type']) && $settings['type'] == 'nbullet-pagination') ? 'checked' : ''}}>
            <label for="first">Bullet pagination</label>
        </div>
        <div>
            <input id="second" class="bty-input-radio-1" type="radio" value="show-three-slides" name="type" {{(isset($settings['type']) && $settings['type'] == 'show-three-slides') ? 'checked' : ''}}>
            <label for="second">Show three slides</label>
        </div>
    </div>
    <div id="collapseunitbanner" class="collapse in" aria-expanded="true" style="">
        <div class="content banner-settings">
            <button type="button" class="btn btn-info btn-block" id="addinput">Add</button>
            <div class="add_custome_page">
                @if(isset($settings["images"]) && is_array($settings["images"]))
                    @foreach($settings["images"] as $key => $setting)
                        <div class="form-group custom_div_key" data-key="{{$key}}">
                            <input type="text" name="images[{{$key}}][path]" placeholder="Path" class="form-control" value="{{$setting['path']}}">
                            <input type="button" value="Delete" class="btn btn-danger btn-block del" >
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

{!! BBscript($_this->path.DS.'js'.DS.'script.js',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'settings.css') !!}









