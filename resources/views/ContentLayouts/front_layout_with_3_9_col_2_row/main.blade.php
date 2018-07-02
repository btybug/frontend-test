<div class="container-fluid">

    <div class="row row-no-gutter {{(isset($settings['main_page_style'])&& $settings['main_page_style']) ? $settings['main_page_style'] : ''}}">
        <div class="top-menu-container {{(isset($settings['style'])&& $settings['style'] ) ? $settings['style'] : 'demo-column'}}">
            <div class="top-menu {{(isset($settings['menu_style'])&& $settings['menu_style'] ) ? $settings['menu_style'] : 'demo-column'}}">
                @php
                    $items = isset($settings['menu_area']) ? BBGetMenu($settings['menu_area']) : [];
                @endphp
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                @if(count($items))
                                    @foreach($items as $item)
                                        @if(isset($item['children']))
                                            @foreach($item['children'] as $child)
                                            <li class="dropdown">
                                                <a href="{!! url($child['url']) !!}"><i class="fa {!! $child['icon'] !!}"></i> {{$child['title']}}</a>
                                                @if(isset($child['children']) && !empty($child['children']))
                                                <a data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    @foreach($child['children'] as $next_child)
                                                        <li><a href="{!! url($next_child['url']) !!}"><i class="fa {!! $next_child['icon'] !!}"></i> {!! $next_child['title'] !!}</a></li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        @else
                                            <li class="dropdown">
                                                <a href="{!! url($item['url']) !!}"><i class="fa {!! $item['icon'] !!}"></i> {{$item['title']}}</a>
                                                @if(isset($item['children']) && !empty($item['children']))
                                                    <a data-toggle="dropdown" class="dropdown-toggle"><span class="caret"></span></a>
                                                    <ul class="dropdown-menu">
                                                        @foreach($item['children'] as $next_child)
                                                            <li><a href="{!! url($next_child['url']) !!}"><i class="fa {!! $next_child['icon'] !!}"></i> {!! $next_child['title'] !!}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="{!! issetReturn($settings,'ls_desktop').' '.issetReturn($settings,'ls_l_table').' '.issetReturn($settings,'ls_p_table').' '.issetReturn($settings,'ls_mobile')!!}">
            <div class="default-column {{(isset($settings['ls_style'])&& $settings['ls_style'] ) ? $settings['ls_style'] : ''}}">
                <div>
                    @switch(issetReturn($settings,'ls_content_type'))
                        @case('unit')
                        @if(has_setting($settings,'ls_unit'))
                            {!! BBRenderUnits($settings['ls_unit'],isset($settings['_page'])?['_page'=>$settings['_page']]:[]) !!}
                        @endif
                        @break

                        @case('hook')
                        @if(has_setting($settings,'hooks') && is_array($settings['hooks']['ls_hook']))
                            {!! BBrenderHook($settings['hooks']['ls_hook']) !!}
                        @endif
                        @break

                        @default
                        <span>Something went wrong, please try again</span>
                    @endswitch
                </div>
            </div>
        </div>
        <div class="{!! issetReturn($settings,'rc_desktop').' '.issetReturn($settings,'rc_l_table').' '.issetReturn($settings,'rc_p_table').' '.issetReturn($settings,'rc_mobile')!!}">
            <div class="default-column {{isset($settings['right_area_style']) ? $settings['right_area_style'] : ''}}">
                <div>
                    <div class="{{(isset($settings['right_top_inp'])&& $settings['right_top_inp']) ? '' : 'hide'}} {{(isset($settings['tr_style'])&& $settings['tr_style']) ? $settings['tr_style'] : ''}} ">
                        @switch(issetReturn($settings,'tr_content_type'))
                            @case('unit')
                            @if(has_setting($settings,'tr_unit'))
                                {!! BBRenderUnits($settings['tr_unit'],isset($settings['_page'])?['_page'=>$settings['_page']]:[]) !!}
                            @endif
                            @break

                            @case('hook')
                            @if(has_setting($settings,'hooks') && isset($settings['hooks']['tr_hook']))
                                {!! BBrenderHook($settings['hooks']['tr_hook']) !!}
                            @endif
                            @break
                            @default
                            <span>Something went wrong, please try again</span>
                        @endswitch
                    </div>
                    <div class="{{(isset($settings['mr_style'])&& $settings['mr_style']) ? $settings['mr_style']: ''}} ">
                        {!! main_content($settings) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css/style.css') !!}
{!! useDinamicStyle('containers') !!}