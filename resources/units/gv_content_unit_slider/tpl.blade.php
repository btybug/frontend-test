<section class="bty-slider">
    <div class="owl-carousel owl-theme slider-carousel">

        @if(isset($settings['images']) && count($settings['images']))
            @foreach($settings['images'] as $image)
                @if($image)
                    <div class="item">
                        <img src="{{ $image }}"  alt="">
                    </div>
                @endif
            @endforeach
        @endif

    </div>
    {!! BBstyle($_this->path.DS.'css'.DS.'owl.theme.default.css') !!}
    {!! BBstyle($_this->path.DS.'css'.DS.'owl.carousel.min.css') !!}
    {!! BBstyle($_this->path.DS.'css'.DS.'styles.css') !!}

    {!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}
    {!! BBscript($_this->path.DS.'js'.DS.'owl.carousel.min.js',$_this) !!}

</section>
