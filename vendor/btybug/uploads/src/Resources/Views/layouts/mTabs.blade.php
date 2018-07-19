@inject('section','Btybug\btybug\Helpers\Tabs')
@extends($section->layout)
@section('content')
    <div class="col-md-12">
        <div class="box box-default color-palette-box">
            <div class="box-body">

                <div class="tab-content">
                    @yield('tab')
                </div>
            </div>
        </div>
    </div>
@stop

@push('css')
    {!! HTML::style('public/css/tabs/tab-styles.css?v=0.1') !!}
@endpush