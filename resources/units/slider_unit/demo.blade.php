<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @if(isset($settings['img_path'])&&count($settings['img_path'])>0)

            @foreach($settings['img_path'] as $key => $value)

                <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$key==0?'active':''}}"></li>
                {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}


            @endforeach
        @endif
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

        @if(isset($settings['img_path'])&&count($settings['img_path'])>0)


            @foreach($settings['img_path'] as $key => $value)
                <div class="item {{$key==0?'active':''}}">
                    <img src="{{$value}}" width="1366px" height="700px">
                    <div class="carousel-caption hidden-xs">
                        <h3>New Collection touch of Chania</h3>
                        <p>The atmosphere in Chania has a touch<br> of Florence and Venice.</p>
                        <button class="btn btn-danger">READ MORE</button>
                    </div>
                </div>

            @endforeach




            {{--<div class="item active">--}}
            {{--<img src="http://diamondcreative.net/plus-v1.1/img/slider/slider_06.jpg" width="1366px" height="700px">--}}
            {{--<div class="carousel-caption hidden-xs">--}}
            {{--<h3>New Collection touch of Chania</h3>--}}
            {{--<p>The atmosphere in Chania has a touch<br> of Florence and Venice.</p>--}}
            {{--<button class="btn btn-danger">READ MORE</button>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--<div class="item">--}}
            {{--<img src="http://diamondcreative.net/plus-v1.1/img/slider/slider_03.jpg" width="1366px" height="700px">--}}
            {{--<div class="carousel-caption hidden-xs">--}}
            {{--<h3>New Collection touch of Chania</h3>--}}
            {{--<p>The atmosphere in Chania has a touch<br> of Florence and Venice.</p>--}}
            {{--<button class="btn btn-danger">READ MORE</button>--}}
            {{--</div>--}}
            {{--</div>--}}

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    @endif
</div>