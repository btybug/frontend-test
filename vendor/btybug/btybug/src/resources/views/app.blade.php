@php
    if(!isset($page)){
        $page = \Btybug\btybug\Services\RenderService::getFrontPageByURL();
    }
            $settings=json_decode($page->settings,true);
            if(isset($settings['file_path'])){
            $path=$settings['file_path'];
          }
@endphp
@if(View::exists($path))
    @include($path)
@else
    @php
        $params = \Request::route()->parameters();
         echo  \App::call($path,$params);
    @endphp
@endif