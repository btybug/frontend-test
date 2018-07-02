<ul class="header-btns">
    <li class="header-account dropdown default-dropdown">
        <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
            <div class="header-btns-icon">
                <i class="fa fa-user-o"></i>
            </div>
            <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
        </div>
        @if(isset($settings['my_menu']))
            <ul class="custom-menu">
                @php
                    $items = BBGetMenu($settings['my_menu'])
                @endphp
                @if(count($items))
                    @foreach($items as $item)
                        <li><a href="{!! url($item->url) !!}"><i class="{!! $item->icon !!}"></i> {!! $item->title !!}</a></li>
                    @endforeach
                @endif
            </ul>
        @endif
    </li>
</ul>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}