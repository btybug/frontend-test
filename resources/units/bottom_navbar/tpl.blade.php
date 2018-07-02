@if(isset($settings['bottom_nb_ch'])&&$settings['bottom_nb_ch']=='on')
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if($settings['logo_path'])
                <a class="navbar-brand" href="#">
                    <img src="{{$settings['logo_path']}}">
                </a>
                    @endif
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-left">
                    {{--<li class=""><a href="#">Home</a></li>--}}
                    {{--<li><a href="#">services</a></li>--}}
                    {{--<li><a href="#">gallery</a></li>--}}
                    {{--<li><a href="#">blog</a></li>--}}
                    {{--<li><a href="#">contact us</a></li>--}}
                    @if(isset($settings['left_item']))
                        @foreach($settings['left_item'] as $key => $value)
                            <li><a href="#">{{$value}}</a></li>
                        @endforeach
                    @endif
                </ul>

                <form class="navbar-form navbar-right">
                  @if(isset($settings['search_form'])&&$settings['search_form']=='on')
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-default-1" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                   @endif
                    <span class="cart-heart  hidden-sm hidden-xs">
<a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
</span>
                    <span class="cart-heart  hidden-md hidden-lg">
<a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-globe" aria-hidden="true"></i></a>
<a href="#"><i class="fa fa-usd" aria-hidden="true"></i></a>
</span>
                </form>

            </div>
        </div>
    </nav>
@endif

{!! BBstyle($_this->path.DS.'css'.DS.'main.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'main.js',$_this) !!}