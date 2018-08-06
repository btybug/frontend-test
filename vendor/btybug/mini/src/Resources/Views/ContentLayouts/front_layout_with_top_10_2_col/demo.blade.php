<div>
    @if(has_setting($settings,'12_area_unit'))
        {!! BBRenderUnits($settings['12_area_unit']) !!}
    @endif
</div>
<div class="main">
    <div class="row">
        <div class="col-md-10 col-xs-12">
            {!! mini_unit_content($settings,\Btybug\Mini\Model\MiniPainter::class) !!}
        </div>
        <div class="col-md-2 col-xs-12">
            @if(has_setting($settings,'sidebar_area'))
                {!! BBRenderUnits($settings['sidebar_area']) !!}
            @endif
        </div>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
