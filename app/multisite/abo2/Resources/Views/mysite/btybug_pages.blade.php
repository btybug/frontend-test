@extends('mini::layouts.app')
@extends('mini::layouts.mTabs',['index'=>'mini_my_site_btybug'])
@section('tab')

@stop
@section('js')
        <script>
            $('#tab').addClass('active');
        </script>
@stop