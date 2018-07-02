<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap {{!isset($settings['left_bar_menu']) ? 'custom_margin_0' : ''}}">
            <!-- home slick -->
            @if(isset($settings["images"]) && is_array($settings["images"]))
                <div id="home-slick-slider">
                    @foreach($settings["images"] as $key => $setting)
                        @if($setting['path'] != null)
                            <div class="banner banner-1">
                                <img src="{{$setting['path']}}" alt="">
                                <div class="banner-caption text-center">
                                    <h1>{{$setting['title']}}</h1>
                                    <h3 class="white-color font-weak">{{$setting['description']}}</h3>
                                    <button class="primary-btn">Shop Now</button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
        @endif
        <!-- /home slick -->
        </div>
        <!-- /home wrap -->
    </div>
    <!-- /container -->
</div>
<!-- /HOME -->




{!! BBstyle($_this->path.DS.'css'.DS.'slick.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'slick-theme.css',$_this) !!}
{!! BBstyle($_this->path.DS.'css'.DS.'styles.css',$_this) !!}

{!! BBscript($_this->path.DS.'js'.DS.'slick.min.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'script.js',$_this) !!}