@extends('btybug::layouts.static_pages')
@section('content')
    <div class="site-manage-content">
        <div class="content-pages container-fluid">
            <div class="row">
                <div class="col-md-2 pl-0">
                    <div class="menu">
                        <ul>
                            <li ><a href="{!! url('bb/all-members') !!}">
                                    <span><i class="fab fa-buromobelexperte"></i></span>General</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="right-content">
                        {!! BBRenderUnits("unit_for_about_us_team.default") !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('menu')
    @include('btybug::_partials.front_user_menu',['items'=>[
    ['title'=>'All Members','url'=>'bb/all-members'],
    ],'active'=>'All Members'])
@stop

@section('css')

@stop
@section('js')
@stop