

@if(isset($settings['top_nb_ch'])&&$settings['top_nb_ch']=='on')
    <nav class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 hidden-xs">
            <span class="nav-text">
                 @if(isset($settings['phone_number']))
                    <i class="fa fa-phone" aria-hidden="true"></i>  {{$settings['phone_number']}}
                @endif

                @if(isset($settings['email']))
                    <i class="fa fa-envelope" aria-hidden="true"></i> {{$settings['email']}}</span>
                    @endif
                </div>
                <div class="col-sm-4 text-right hidden-xs">
                    <ul class="tools">
                        @if(isset($settings['language'])&&count($settings['language'])>0)
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @if(isset($settings['language']))
                                        @foreach($settings['language'] as $key => $value)
                                            <li><a href="#">{{$value}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @endif

                        @if(isset($settings['currency'])&&count($settings['currency'])>0)
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-usd" aria-hidden="true"></i> Currency<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @if(isset($settings['currency']))
                                        @foreach($settings['currency'] as $key => $value)
                                            <li><a href="#">{{$value}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>   <!--TOP-NAVBAR-END-->
@endif

<!--====================== NAVBAR MENU START===================-->


{{--<nav class="navbar navbar-inverse">--}}
{{--<div class="container">--}}
{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a class="navbar-brand" href="#"><img src="https://lh3.googleusercontent.com/-N4NB2F966TU/WM7V1KYusRI/AAAAAAAADtA/fPvGVNzOkCo7ZMqLI6pPITE9ZF7NONmawCJoC/w185-h40-p-rw/logo.png"></a>--}}
{{--</div>--}}
{{--<div class="collapse navbar-collapse" id="myNavbar">--}}
{{--<ul class="nav navbar-nav navbar-left">--}}
{{--<li class=""><a href="#">Home</a></li>--}}
{{--<li class="dropdown">--}}
{{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">About <span class="caret"></span></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="#">Page 1-1</a></li>--}}
{{--<li><a href="#">Page 1-2</a></li>--}}
{{--<li><a href="#">Page 1-3</a></li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--<li><a href="#">services</a></li>--}}
{{--<li><a href="#">gallery</a></li>--}}
{{--<li><a href="#">blog</a></li>--}}
{{--<li><a href="#">contact us</a></li>--}}
{{--</ul>--}}
{{--<form class="navbar-form navbar-right">--}}
{{--<div class="input-group">--}}
{{--<div class="input-group-btn">--}}
{{--<button class="btn btn-default-1" type="submit">--}}
{{--<i class="glyphicon glyphicon-search"></i>--}}
{{--</button>--}}
{{--</div>--}}
{{--<input type="text" class="form-control" placeholder="Search">--}}
{{--</div>--}}

{{--<span class="cart-heart  hidden-sm hidden-xs">--}}
{{--<a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>--}}
{{--<a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>--}}
{{--</span>--}}
{{--<span class="cart-heart  hidden-md hidden-lg">--}}
{{--<a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>--}}
{{--<a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>--}}
{{--<a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>--}}
{{--<a href="#"><i class="fa fa-globe" aria-hidden="true"></i></a>--}}
{{--<a href="#"><i class="fa fa-usd" aria-hidden="true"></i></a>--}}
{{--</span>--}}
{{--</form>--}}

{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}


{{--<!--=================CAROUSELE START====================-->--}}

{{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
{{--<!-- Indicators -->--}}
{{--<ol class="carousel-indicators">--}}
{{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
{{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}

{{--</ol>--}}

{{--<!-- Wrapper for slides -->--}}
{{--<div class="carousel-inner" role="listbox">--}}
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
{{--</div>--}}

{{--<!-- Left and right controls -->--}}
{{--<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">--}}
{{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
{{--<span class="sr-only">Previous</span>--}}
{{--</a>--}}
{{--<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">--}}
{{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
{{--<span class="sr-only">Next</span>--}}
{{--</a>--}}
{{--</div>--}}



{{--<!--   FOOTER START================== -->--}}

{{--<footer class="footer">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-3">--}}
{{--<h4 class="title">Sumi</h4>--}}
{{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit, libero a molestie consectetur, sapien elit lacinia mi.</p>--}}
{{--<ul class="social-icon">--}}
{{--<a href="#" class="social"><i class="fa fa-facebook" aria-hidden="true"></i></a>--}}
{{--<a href="#" class="social"><i class="fa fa-twitter" aria-hidden="true"></i></a>--}}
{{--<a href="#" class="social"><i class="fa fa-instagram" aria-hidden="true"></i></a>--}}
{{--<a href="#" class="social"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>--}}
{{--<a href="#" class="social"><i class="fa fa-google" aria-hidden="true"></i></a>--}}
{{--<a href="#" class="social"><i class="fa fa-dribbble" aria-hidden="true"></i></a>--}}
{{--</ul>--}}
{{--</div>--}}
{{--<div class="col-sm-3">--}}
{{--<h4 class="title">My Account</h4>--}}
{{--<span class="acount-icon">--}}
{{--<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wish List</a>--}}
{{--<a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</a>--}}
{{--<a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>--}}
{{--<a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Language</a>--}}
{{--</span>--}}
{{--</div>--}}
{{--<div class="col-sm-3">--}}
{{--<h4 class="title">Category</h4>--}}
{{--<div class="category">--}}
{{--<a href="#">men</a>--}}
{{--<a href="#">women</a>--}}
{{--<a href="#">boy</a>--}}
{{--<a href="#">girl</a>--}}
{{--<a href="#">bag</a>--}}
{{--<a href="#">teshart</a>--}}
{{--<a href="#">top</a>--}}
{{--<a href="#">shos</a>--}}
{{--<a href="#">glass</a>--}}
{{--<a href="#">kit</a>--}}
{{--<a href="#">baby dress</a>--}}
{{--<a href="#">kurti</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-sm-3">--}}
{{--<h4 class="title">Payment Methods</h4>--}}
{{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>--}}
{{--<ul class="payment">--}}
{{--<li><a href="#"><i class="fa fa-cc-amex" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#"><i class="fa fa-paypal" aria-hidden="true"></i></a></li>--}}
{{--<li><a href="#"><i class="fa fa-cc-visa" aria-hidden="true"></i></a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--<hr>--}}

{{--<div class="row text-center"> © 2017. Made with  by sumi9xm.</div>--}}
{{--</div>--}}


{{--</footer>--}}

{!! BBstyle($_this->path.DS.'css'.DS.'main.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'main.js',$_this) !!}
{{--{!! useDinamicStyle('images') !!}--}}