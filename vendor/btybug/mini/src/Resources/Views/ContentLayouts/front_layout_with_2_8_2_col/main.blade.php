<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            {!! mini_unit_content($settings,\Btybug\Mini\Model\MiniPainter::class) !!}
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
