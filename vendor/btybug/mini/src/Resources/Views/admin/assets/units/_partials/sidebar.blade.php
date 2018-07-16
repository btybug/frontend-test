<div class="left-menu">
    <ul>
        @if(count($units))
            @foreach($units as $key => $val)
                <li class="unit_rend {{ (@$model->slug == $val->slug)? 'active' : '' }}">
                    <a href="{!! route('mini_admin_assets_units',$val->slug) !!}">{{ $val->title }}</a>
                </li>
            @endforeach
        @endif
    </ul>
</div>