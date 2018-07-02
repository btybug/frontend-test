@if(isset($settings['area1']))
    {!! BBRenderUnits($settings['area1']) !!}
{{--@else
    <div class="custom_empty_section">
        <h2>Section 1</h2>
    </div>--}}
@endif

@if(isset($settings['area2']))
    {!! BBRenderUnits($settings['area2']) !!}
{{--@else
    <div class="custom_empty_section">
        <h2>Section 2</h2>
    </div>--}}
@endif

@if(isset($settings['area3']))
    {!! BBRenderUnits($settings['area3']) !!}
{{--@else
    <div class="custom_empty_section">
        <h2>Section 3</h2>
    </div>--}}
@endif

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}

