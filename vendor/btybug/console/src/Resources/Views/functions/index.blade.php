@extends('btybug::layouts.admin')
@section('content')
    <div class="row m-b-10">
        <h3>All Functions</h3>
        <div class="col-md-12">
            <a class="btn btn-primary pull-right" href="{!! url('admin/console/functions/create') !!}"><i
                        class="fa fa-plus"></i> Create</a>
        </div>
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                <tr class="bg-black text-white">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Query</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="field_list">
                @if(count($functions))
                    @foreach($functions as $key => $entry)
                        <tr class="field-row">
                            <td>{!! $entry['name'] !!}</td>
                            <td>{!! $entry['description'] !!}</td>
                            <td>{!! (isset($entry['query'])) ? $entry['query'] : 'No Query' !!}</td>
                            <td>
                                <a href="{!! url("admin/console/functions/edit/$key") !!}"
                                   class="btn btn-warning"><i class="fa fa-pencil"></i></a>

                                <a data-href="{!! url("admin/console/functions/delete") !!}"
                                   data-key="{!! $key !!}" data-type="{{ $entry['name'] }}"
                                   class="delete-button btn btn-danger"><i
                                            class="fa fa-trash-o f-s-14 "></i></a>

                                {{--<a href="javascript:void(0)" data-id="{!! $entry['key'] !!}"--}}
                                   {{--class="btn btn-success run-query"><i class="fa fa-eye"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">
                            No functions
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    @include('btybug::_partials.delete_modal')
@stop
@section('CSS')

@stop
@section('JS')
@stop