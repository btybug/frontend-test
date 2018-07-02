@extends( 'btybug::layouts.admin' )
@section( 'content' )
    <div class="container-fluid">
        <div class="row row-eq-height ">
            <div class="col-md-3">
                <div class="panel panel-default p-0 boxpanelminheight">
                    <div class="panel-heading">Available Events</div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($subscriber->getEvents() as $slug=>$event)
                                <button type="button" data-value="{!! url('/admin/front-site/event/new-connection',$slug) !!}"
                                        class="list-group-item list-group-item-action"
                                        data-btnclick="selectevent">{!! $event['name'] !!}</button>
                            @endforeach
                        </div>


                    </div>
                </div>


            </div>
            <div class="col-md-9">
                <div class="panel panel-default p-0 boxpanelminheight hide" data-panelevent="connections">
                    <div class="panel-heading"><code>Connections</code><a
                                href="#"
                                class="btn btn-info pull-right new-page-url"><i class="fa fa-plus"></i></a></div>
                    <div class="panel-body p-0">
                        <div class="row row-eq-height">
                            <div class="col-xs-12 event-leftbar p-t-10">
                                <ul class="nav nav-pills nav-stacked">
                                    <ul class="nav nav-pills nav-stacked">
                                        <li>
                                            <div class="col-md-12  nav-listing">
                                                <div aria-controls="home" role="tab" data-toggle="tab"
                                                     data-tabsindex="1">1
                                                </div>
                                                <div class="pull-right">
                                                    <a href="#" class="btn btn-info">Edit</a>
                                                    <a href="#" class="btn btn-warning">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="col-md-12  nav-listing">
                                                <div aria-controls="home" role="tab" data-toggle="tab"
                                                     data-tabsindex="2" aria-expanded="false">2
                                                </div>
                                                <div class="pull-right">
                                                    <a href="#" class="btn btn-info">Edit</a>
                                                    <a href="#" class="btn btn-warning">Delete</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="active">
                                            <div class="col-md-12  nav-listing">
                                                <div aria-controls="home" role="tab"
                                                     data-toggle="tab" data-tabsindex="3" aria-expanded="true">3
                                                    <div class="pull-right">
                                                        <a href="#" class="btn btn-info">Edit</a>
                                                        <a href="#" class="btn btn-warning">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{--<div class="col-md-3">--}}
            {{--<div class="panel panel-default p-0 boxpanelminheight" data-panelevent="functions">--}}
            {{--<div class="panel-heading">Functions</div>--}}
            {{--<div class="panel-body">--}}
            {{--<ul class="list-group listwithlink menuwithbutton">--}}
            {{--@foreach($subscriber->getProperties() as $name=>$namespace)--}}
            {{--<li class="list-group-item" data-value="{!! $namespace !!}"--}}
            {{--data-btnclick="selectfunction"><span--}}
            {{--class="badge">0</span> {!! $name !!}--}}
            {{--<div class="listtool">--}}
            {{--<button type="button" class="btn btn-default btn-xs" data-btnclick="addtab"--}}
            {{--data-cout='0'><i class="fa fa-plus" aria-hidden="true"></i></button>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--@endforeach--}}
            {{--</ul>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

        </div>

        <div class="row">
            <textarea data-json="exportjson" class="form-control"></textarea>
        </div>
    </div>


@stop

@section('CSS')
    {!! HTML::style('public/js/bootstrap-select/css/bootstrap-select.min.css') !!}
    {!! HTML::style('public/css/themes-settings.css') !!}
    <style>
.nav-listing{
    background: #337ab7;
    border-radius: 12px;
    padding-bottom: 14px;
    margin: 3px;
}
    </style>

@stop
@section('JS')
    {!! HTML::script('public/js/bootstrap-select/js/bootstrap-select.min.js') !!}
    {!! HTML::script('public/js/events/event-new-setting.js') !!}
@stop