@extends('btybug::layouts.admin')
@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main_container_11">
        <table id="users-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            @foreach($columns[0] as $key=>$column)
                <th>{!! $key !!}</th>
            @endforeach

            <tbody>
            @foreach($columns as $index=>$comumn)

                <tr>
                    @foreach($comumn as $prop)
                        <td>{{$prop}}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('JS')
    <script>
        {{--$(function () {--}}
        {{--$('#users-table').DataTable({--}}
        {{--processing: true,--}}
        {{--serverSide: true,--}}
        {{--ajax: '{!! route('dynamic_datatable',$table) !!}',--}}
        {{--dom: 'Bfrtip',--}}
        {{--columnDefs: [--}}
        {{--{--}}
        {{--targets: 1,--}}
        {{--className: 'noVis'--}}
        {{--}--}}
        {{--],--}}
        {{--buttons: [--}}
        {{--{--}}
        {{--extend: 'colvis',--}}
        {{--columns: ':not(.noVis)'--}}
        {{--}--}}
        {{--]--}}
        {{--, colReorder: {--}}
        {{--realtime: false--}}
        {{--},--}}
        {{--columns: [--}}
        {{--@foreach($columns as $column)--}}
        {{--{data: '{!! $column !!}', name: '{!! $column !!}'},--}}
        {{--@endforeach--}}
        {{--]--}}
        {{--});--}}
        {{--});--}}
    </script>
@stop