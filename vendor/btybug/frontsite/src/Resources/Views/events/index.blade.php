@extends( 'btybug::layouts.admin' )
@section( 'content' )
    <div class="container-fluid events-container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <a class="btn btn-primary pull-right" href="#" bb-click="saveEvent">
                    <i class="fa fa-circle-o-notch fa-spin hide"></i>
                    Save Event
                </a>
            </div>
        </nav>

        <div class="row row-eq-height ">
            <div class="col-md-3">
                <div class="panel panel-default p-0 boxpanelminheight">
                    <div class="panel-heading">Available Events</div>
                    <div class="panel-body">
                        <div class="list-group events-list-group">
                            @foreach($subscriber->getEvents() as $evSlug=>$event)
                                <button type="button" data-value="{!! $event['namespace'] !!}" class="list-group-item list-group-item-action" bb-click="selectEvent">
                                    {!! $event['name'] !!}
                                    <span class="badge">0</span>
                                    @if(isset($event['settings']['type']))
                                        <span class="event_type">{!! $event['settings']['type'] !!}</span>
                                        @endif
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="panel panel-default p-0 boxpanelminheight" data-panelevent="connections">
                    <div class="panel-heading">Connections</div>
                    <div class="panel-body p-0">
                        <div class="panel-group" id="event-connections" role="tablist" aria-multiselectable="true"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default p-0 boxpanelminheight hide" data-panelevent="functions">
                    <div class="panel-heading">Available actions</div>
                    <div class="panel-body">
                        <ul class="list-group listwithlink menuwithbutton">
                            @foreach($subscriber->getProperties() as $slug=>$property)
                                <li class="list-group-item"> {!! $property['name'] !!}
                                    <div class="listtool">
                                        <button type="button" class="btn btn-default btn-xs" bb-click="addAction" data-value="{!! $property['namespace'] !!}" data-title='{!! $property['name'] !!}'>
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <textarea id="export-json" class="form-control"></textarea>
        </div>
    </div>


    <!-- Templates -->
    <script type="template" id="action-template">
        <div class="panel panel-default" data-namespace="{namespace}">
            <div class="panel-heading" role="tab" id="panel-{id}">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#event-connections" href="#action-{id}">
                        {title}
                    </a>

                    <a href="#" class="pull-right" data-title="{title}" bb-click="removeAction"><i class="fa fa-trash text-danger"></i></a>
                </h4>
            </div>
            <div id="action-{id}" class="panel-collapse collapse" role="tabpanel">
                <div class="panel-body">
                    {content}
                </div>
            </div>
        </div>
    </script>
@stop

@section('CSS')
    {!! HTML::style('public/js/bootstrap-select/css/bootstrap-select.min.css') !!}
    {!! HTML::style('public/css/themes-settings.css') !!}

    <style>
        .events-container{
            margin-top: 20px;
        }

        [bb-click=saveEvent]{
            margin-top: 7px;
        }
        .event_type{
            background: #f0950c;
            width: 42px;
            font-size: 14px;
            border-radius: 5px;
            color: white;
            float: right;
            text-align: center;
        }
    </style>
@stop
@section('JS')
    {!! HTML::script('public/js/bootstrap-select/js/bootstrap-select.min.js') !!}
    {!! HTML::script('public/js/events/events.js?v='.rand(1000,9999)) !!}
@stop