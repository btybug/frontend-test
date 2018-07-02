<div class="bty-panel-collapse">
    <div>
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseunitbanner" aria-expanded="true">
            <span class="icon"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>
            <span class="title">Slider</span>
        </a>
    </div>
    <div id="collapseunitbanner" class="collapse in" aria-expanded="true" style="">
        <div class="content banner-settings">
            <button type="button" class="btn btn-info btn-block" id="addinput">Add</button>
            <div class="add_custome_page">
                @if(isset($settings["images"]) && is_array($settings["images"]))
                    @foreach($settings["images"] as $key => $setting)
                        <div class="form-group custom_div_key" data-key="{{$key}}">
                            <input type="text" name="images[{{$key}}][title]" placeholder="Title" class="form-control" value="{{$setting['title']}}">
                            <input type="text" name="images[{{$key}}][description]" placeholder="Description" class="form-control" value="{{$setting['description']}}">
                            <input type="text" name="images[{{$key}}][path]" placeholder="Path" class="form-control" value="{{$setting['path']}}">
                            <input type="button" value="Delete" class="btn btn-danger btn-block del" >
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>


{!! BBstyle($_this->path.DS.'css'.DS.'settings.css') !!}

{!! BBscript($_this->path.DS.'js'.DS.'settings.js',$_this) !!}









