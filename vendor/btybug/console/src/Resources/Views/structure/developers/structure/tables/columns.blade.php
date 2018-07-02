@extends('btybug::layouts.admin')
@section('content')

    <div class="container">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Column Name</th>
                <th>DataType</th>
                {{--<th>Create Form</th>--}}
                <th>Key</th>
                <th>Default</th>
                <th>Extra</th>
                <th>Field Status</th>
                <th>Update Form</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($colums as $colum)
                <tr>
                    @foreach($colum as $k=>$v)
                        @if($k == 'field')
                            <th>{!! '1' !!}</th>
                        @elseif($k == 'Null' && $colum->field == 'never')
                            <th>N/A</th>
                        @else
                            <th>{!! $v !!}</th>
                        @endif
                    @endforeach
                    <th></th>
                    <th>
                        <a href="{!! url('admin/console/structure/tables/edit-column',[$table,$colum->Field]) !!}"
                           class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        @if(\Btybug\Console\Services\FieldService::checkField($table,$colum->Field))
                            <a href="{!! route("edit_field",['id' => \Btybug\Console\Services\FieldService::getFieldID($table,$colum->Field)]) !!}"
                               class="btn btn-warning"><i class="fa fa-pencil"
                                                          aria-hidden="true"></i>Edit Field</a>
                        @else
                            <a href="{!! route("create_field",['table' =>$table,'column' => $colum->Field]) !!}"
                               class="btn btn-primary"><i class="fa fa-pencil"
                                                          aria-hidden="true"></i> Make Field</a>
                        @endif
                        @if(!isset($core[$colum->Field]))
                            <button data-href="{!! url('admin/console/structure/tables/delete-column',[$table,$colum->Field]) !!}"
                                    class="btn  btn-danger delete_table_column"><i class="fa fa-trash"
                                                                                    aria-hidden="true"></i></button>
                        @endif
                    </th>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{!! url('admin/console/structure/tables/add-column',$table) !!}" class="btn btn-success">Add Column</a>
    @include('resources::assests.deleteModal')
@stop
@section('JS')
    <script>
        $(document).ready(function () {
            $('.delete_table_column').on('click', function () {
                $('#delete_confirm').attr('href', $(this).attr('data-href'));
                $('.delete_modal .modal-body p').html('are you sure delete this column?');
                $('.delete_modal').modal();
            })
        })

    </script>
@stop
