@extends('btybug::layouts.mTabs',['index'=>'manage_settings'])
@section('tab')




    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal"><i
                class="fa fa-plus"></i>Create
        New Connection
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="create_connection_form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Client Data</h4>
                    </div>
                    <div class="modal-body form-horizontal">

                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Name</label>
                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="provider">Provider</label>
                                <div class="col-md-5">
                                    <input id="provider" name="provider" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="client_id">Client ID</label>
                                <div class="col-md-5">
                                    <input id="client_id" name="client_id" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="client_secret">Client Secret</label>
                                <div class="col-md-5">
                                    <input id="client_secret" name="client_secret" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>

                        </fieldset>


                    </div>
                    <div class="modal-footer">
                        <button type="button" data-form="create_connection_form" class="btn btn-success create_connection" data-url="{!! route('frontsite_api_settings_save') !!}">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <div class="messages-area"></div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalEdit" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <form id="edit-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Data</h4>
                    </div>
                    <div class="modal-body form-horizontal">

                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">Name</label>
                                <div class="col-md-5">
                                    <input id="name" name="name" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="provider">Provider</label>
                                <div class="col-md-5">
                                    <input id="provider" name="provider" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="client_id">Client ID</label>
                                <div class="col-md-5">
                                    <input id="client_id" name="client_id" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="client_secret">Client Secret</label>
                                <div class="col-md-5">
                                    <input id="client_secret" name="client_secret" type="text" placeholder=""
                                           class="form-control input-md">

                                </div>
                            </div>

                        </fieldset>


                    </div>
                    <div class="modal-footer">
                        <button type="button" data-form="edit-form" class="btn btn-success create_connection" data-url="{!! route('frontsite_api_settings_edit_connection') !!}" >Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <input type="hidden" name="id">
                </form>
            </div>

        </div>
    </div>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Provider</th>
            <th scope="col">Client IDD</th>
            <th scope="col">Client Secret</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($connections as $connection)
            <tr>
                <th scope="row">{!! $connection->id !!}</th>
                <td>{!! $connection->name !!}</td>
                <td>{!! $connection->provider !!}</td>
                <td>{!! $connection->client_id !!}</td>
                <td>{!! $connection->client_secret !!}</td>
                <td>
                    <a href="javascript:void(0)" data-json='{!! json_encode($connection->getAttributes(),true) !!}' class="btn btn-info edit-connection"><i class="fa fa-edit"></i></a>
                    <a data-href="{!! route('frontsite_api_settings_delete_connection') !!}"
                       data-key="{!! $connection->id !!}" data-type="{!! $connection->name !!} connection ?"
                       class="delete-button btn btn-danger"><i
                                class="fa fa-trash-o f-s-14 "></i></a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{--{!! $html !!}--}}
    @include('btybug::_partials.delete_modal')
@stop
@section('CSS')
    <style>
        .messages-area{
            text-align: left;
            background: #f1bcbc;
            font-size: 16px;
        }
        .messages-area p{
            margin: 0;
            padding: 0;

        }
    </style>
@stop

@section('JS')
    <script>
        $(function () {
            $('.create_connection').on('click', function () {
                var data = $('#'+$(this).attr('data-form')).serialize();
                $.ajax({
                    url: $(this).attr('data-url'),
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $("input[name='_token']").val()
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data.error) {
                            var message='';
                            $.each(data.messages,function (field,messages) {
                                $.each(messages,function (k,v) {
                                    message+='<p>'+v+'</p>';
                                });
                            });
                            $('.messages-area').empty();
                            $('.messages-area').html(message);
                        } else {
                            location.reload();
                        }
                    },
                    type: 'POST'
                });
            });

            $('.edit-connection').on('click',function () {
               var jsonData=JSON.parse($(this).attr('data-json'));
                fillform($('#edit-form'),jsonData);
                $('#myModalEdit').modal();
            });
            function fillform(frm, data) {
                $.each(data, function(key, value) {
                    var ctrl = $('[name='+key+']', frm);
                    switch(ctrl.prop("type")) {
                        case "radio": case "checkbox":
                        ctrl.each(function() {
                            if($(this).attr('value') == value) $(this).attr("checked",value);
                        });
                        break;
                        default:
                            ctrl.val(value);
                    }
                });
            }
        });
    </script>
@stop
