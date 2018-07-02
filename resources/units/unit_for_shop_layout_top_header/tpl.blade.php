<div id="top-header">
    <div class="container">
        <div class="pull-left">
            @if(isset($settings["left_text"]))
                <span>{{$settings["left_text"]}}</span>
            @endif
        </div>
        <div class="pull-right">
            @if(isset($settings['top_menu']))
                <ul class="header-top-links">
                    @php
                        $items = BBGetMenu($settings['top_menu'])
                    @endphp
                    @if(is_array($items) && count($items))
                        @foreach($items as $item)
                            @if(isset($item->children))
                                <li class="dropdown default-dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">{!! $item->title !!}<i class="fa fa-caret-down"></i></a>
                                    <ul class="custom-menu">
                                        @foreach($item->children as $child)
                                            <li><a href="{!! url($child->url) !!}"><i class="{!! $child->icon !!}"></i> {!! $child->title !!}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a href="{!! url($item->url) !!}"><i class="{!! $item->icon !!}"></i> {!! $item->title !!}</a></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            @endif
        </div>
    </div>
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}