<footer class="bty-footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="footer-top-content">
                    <div class="logo col-md-3">
                        {!!isset($settings['area1'])? BBRenderUnits($settings['area1']):"area 1" !!}
                    </div>
                    <div class="menu-footer col-md-3">
                        @if(isset($settings['menu_area']))
                            @php
                                $items = BBGetMenu($settings['menu_area'])
                            @endphp
                            @if(count($items))
                                <h5>Menu</h5>
                                <ul>
                                    @foreach($items as $item)
                                        <li><a href="{!! url($item->url) !!}"><i
                                                        class="{!! $item->icon !!}"></i> {!! $item->title !!}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        @else
                            area 2
                        @endif
                    </div>
                    <div class="contact col-md-3">
                        <ul class="nav navbar-nav navbar-right">
                            @if(isset($settings['area3']))
                                {!! BBRenderUnits($settings['area3']) !!}
                            @else
                                area 3
                            @endif
                        </ul>
                    </div>
                    <div class="subscribe col-md-3">
                        {!!isset($settings['area4'])? BBRenderUnits($settings['area4']):"area 4" !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!!isset($settings['area5'])? BBRenderUnits($settings['area5']):'' !!}
</footer>
{!! BBstyle($_this->path.DS.'css'.DS.'styles.css') !!}