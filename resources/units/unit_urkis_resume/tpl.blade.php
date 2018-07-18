<div class="profile-main {{(isset($settings['style'])&& $settings['style'] ) ? $settings['style'] : 'demo-column'}}">
    @if(isset($settings['sections']))
        @foreach($settings['sections'] as $section)
            {!! BBRenderUnits($section) !!}
        @endforeach
    @endif
</div>
<div class="clearfix"></div>

{!! BBstyle($_this->path.DS.'css'.DS.'style.css') !!}
{!! useDinamicStyle('containers') !!}