<!-- NAVIGATION -->
<div id="navigation">
    <!-- container -->
    <div class="container">
        <div id="responsive-nav">
            <!-- category nav -->
            <div class="category-nav">
                @if(isset($settings['left_bar_menu']))
                    <span class="category-header">Categories <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        @php
                            $items = BBGetMenu($settings['left_bar_menu'])
                        @endphp
                        @if(count($items))
                            @foreach($items as $item)
                                @if(isset($item->children))
                                    <li class="dropdown side-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{!! $item->title !!} <i class="fa fa-angle-right"></i></a>
                                        <ul class="custom-menu custom_width_auto">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="list-links">
                                                        @foreach($item->children as $child)
                                                            <li><a href="{!! url($child->url) !!}"><i class="fa {!! $child->icon !!}"></i> {!! $child->title !!}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    <hr class="hidden-md hidden-lg">
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{!! url($item->url) !!}"><i class="fa {!! $item->icon !!}"></i> {!! $item->title !!}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                @endif
            </div>
            <!-- /category nav -->

            <!-- menu nav -->
            <div class="menu-nav">
                <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                @if(isset($settings['nav_bar_menu']))
                    <ul class="menu-list">
                        @php
                            $items = BBGetMenu($settings['nav_bar_menu'])
                        @endphp
                        @if(count($items))
                            @foreach($items as $item)
                                @if(isset($item->children))
                                    <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{!! $item->title !!} <i class="fa fa-caret-down"></i></a>
                                        <div class="custom-menu custom_min_width">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="list-links">
                                                        @foreach($item->children as $child)
                                                            <li><a href="{!! url($child->url) !!}"><i class="fa {!! $child->icon !!}"></i> {!! $child->title !!}</a></li>
                                                        @endforeach
                                                    </ul>
                                                    <hr class="hidden-md hidden-lg">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li><a href="{!! url($item->url) !!}"><i class="fa {!! $item->icon !!}"></i> {!! $item->title !!}</a></li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                @endif
            </div>
            <!-- menu nav -->
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /NAVIGATION -->

<!-- HOME -->
<div id="home">
    <!-- container -->
    <div class="container">
        <!-- home wrap -->
        <div class="home-wrap {{!isset($settings['left_bar_menu']) ? 'custom_margin_0' : ''}}">
            <!-- home slick -->
                @if(isset($settings["images"]) && is_array($settings["images"]))
                    <div id="home-slick">
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




{!! BBstyle($_this->path.DS.'css'.DS.'slick.css') !!}
{!! BBstyle($_this->path.DS.'css'.DS.'slick-theme.css') !!}
{!! BBstyle($_this->path.DS.'css'.DS.'styles.css') !!}

{!! BBscript($_this->path.DS.'js'.DS.'slick.min.js',$_this) !!}
{!! BBscript($_this->path.DS.'js'.DS.'script.js',$_this) !!}