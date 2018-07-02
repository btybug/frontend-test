@php
    $page = BBgetFrontPage('my-account');
@endphp
<div class="profile-user {{(isset($settings['style'])&& $settings['style'] ) ? $settings['style'] : 'demo-column'}}">
    <div class="profile-img">
        <img src="https://dnatesting.com/wp-content/uploads/2010/01/1-21-2009_IDG-Blog-1000x562.jpg"
             alt="" class="{{isset($settings['image_style']) ? $settings['image_style'] : ''}}">
    </div>
    <div class="profile-name">
        <h2 class="{{isset($settings['top_style']) ? $settings['top_style'] : ''}}">
            {{isset($settings['top_column']) ? Auth::user()[$settings['top_column']] : ''}}
        </h2>
        <p class="{{isset($settings['sub_style']) ? $settings['sub_style'] : ''}}">
            {{isset($settings['sub_column']) ? Auth::user()[$settings['sub_column']] : ''}}
        </p>
    </div>
    <div class="profile-icon">
        <ul>
            @if(isset($settings['icons']))
                @foreach($settings['icons'] as $key => $val)
                    <li class="{{$settings['icons'][$key]['style']}}"><a href="{{$settings['icons'][$key]['url']}}"><i class="fa {{$settings['icons'][$key]['icon']}}"></i></a></li>
                @endforeach
            @endif
        </ul>
    </div>
    <ul class="profile-menu">
        @php
            $items = isset($settings['menu_area']) ? BBGetMenu($settings['menu_area']) : [];
        @endphp
        @if(count($items))
            @foreach($items as $item)
                @if(isset($item['children']))
                    @foreach($item['children'] as $child)
                        <li>
                            <div class="profile-item">
                                <a href="{{$child['url']}}"><i class="fa {!! $child['icon'] !!}"></i>{{$child['title']}}</a>
                                <span class="sublink">@if(isset($child['children']) && !empty($child['children']))<i class="fa fa-chevron-down"></i>@endif</span>
                            </div>

                            @if(isset($child['children']) && !empty($child['children']))
                                <ul class="cute">
                                    @foreach($child['children'] as $next_child)
                                        <li class="subitem"><a href="{{$next_child['url']}}"><i class="fa {!! $next_child['icon'] !!}"></i>{{$next_child['title']}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach
        @endif
    </ul>
    <ul class="social-btn">
        @if(isset($settings['socials']))
            @foreach($settings['socials'] as $key => $val)
                <li class="{{$settings['socials'][$key]['style']}}"><a href="{{$settings['socials'][$key]['url']}}"><i class="fa {{$settings['socials'][$key]['icon']}}"></i></a></li>
            @endforeach
        @endif
    </ul>

</div>
{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! BBscript($_this->path.DS.'js'.DS.'custom.js',$_this) !!}
{!! useDinamicStyle('images') !!}
{!! useDinamicStyle('texts') !!}
{!! useDinamicStyle('menus') !!}
{!! useDinamicStyle('icons') !!}
{!! useDinamicStyle('containers') !!}