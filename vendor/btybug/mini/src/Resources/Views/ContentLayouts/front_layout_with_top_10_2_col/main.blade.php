    <div class="main">
        <div class="row nopadding">
            <div class="col-md-10 col-xs-12">
                {!! mini_unit_content($settings,\Btybug\Mini\Model\MiniPainter::class) !!}
            </div>
            <div class="col-md-2 col-xs-12">
                    @if(has_setting($settings,'sidebar_area'))
                        {!! render_mini_unit($settings['sidebar_area'],\Btybug\Mini\Model\MiniPainter::class) !!}
                    @endif
            </div>
        </div>
    </div>
{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
