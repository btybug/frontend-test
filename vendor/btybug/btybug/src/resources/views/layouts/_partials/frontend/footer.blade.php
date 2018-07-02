@if($page->js_type == 'default')
    {{--TODO: need fix when know from where get default profile --}}
    {!! BBgetProfileAssets(1,'js','footerJs') !!}
@elseif($page->js_type == 'cms')
    {!! BBgetProfileAssets($page->js_cms,'js','footerJs') !!}
@elseif($page->js_type == 'external')
    {!! BBlinkAssets($page->js) !!}
@endif

{{--{!! HTML::script('public/js/pages/'.str_replace(' ','-',$page->title).'.js') !!}--}}