@extends( 'btybug::layouts.admin' )
@section( 'content' )
    <div class="container-fluid events-container">
        <h3>All Events</h3>
        
        <div class="col-md-12">
            <a class="btn btn-primary pull-right" href="{!! url(route('frontsite_admin_event_index_new')) !!}">Create new</a>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($events) && count($events))
                    @foreach($events as $k=>$event)
                        <tr class="clickable-row">
                            <td>
                                {!! $event->name !!}
                            </td>
                            <td>
                                {{--<a href="{!! url('/admin/modules/tables/edit',$table) !!}" class="btn btn-info"><i--}}
                                            {{--class="fa fa-pencil-square-o" aria-hidden="true"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="clickable-row">
                        <td colspan="2">
                            NO Events
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('CSS')
    {!! HTML::style('public/js/bootstrap-select/css/bootstrap-select.min.css') !!}
    {!! HTML::style('public/css/themes-settings.css') !!}
@stop
@section('JS')
    {!! HTML::script('public/js/bootstrap-select/js/bootstrap-select.min.js') !!}
    {!! HTML::script('public/js/events/events.js?v='.rand(1000,9999)) !!}
@stop