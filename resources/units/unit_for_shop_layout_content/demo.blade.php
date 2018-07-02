@if(isset($settings['area1']))
    {!! BBRenderUnits($settings['area1']) !!}
@endif
<div class="container" id="cont">
    @if(isset($settings['area2']))
        {!! BBRenderUnits($settings['area2']) !!}
    @endif

    @if(isset($settings['area3']))
        {!! BBRenderUnits($settings['area3']) !!}
    @endif

    @if(isset($settings['area4']))
        {!! BBRenderUnits($settings['area4']) !!}
    @endif
</div>
{!! BBstyle($_this->path.DS.'css'.DS.'style.css',$_this) !!}

