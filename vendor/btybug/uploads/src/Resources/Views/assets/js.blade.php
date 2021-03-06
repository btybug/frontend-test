@extends('btybug::layouts.mTabs',['index'=>'upload_assets'])
@section('tab')
    <div class="col-md-12">
        <h2>JS</h2>
        <div class="col-md-12">
            <a href="javascript:void(0)" class="btn btn-warning uplJS pull-right">add new</a>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Lib</th>
                    <th>Author</th>
                    {{--<th>Version</th>--}}
                    <th>Live/Local</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($plugins))
                    @foreach($plugins as $item)
                        <tr>
                            <td>{!! $item->id !!}</td>
                            <td>{!! $item->name !!}</td>
                            <td>{!! BBGetUserName($item->author_id) !!}</td>
                            {{--<td>{!! $item->version !!}</td>--}}
                            <td>{!! ($item->env) ? "Live" : "Local" !!}</td>
                            <td>
                                @if($item->env)
                                    <a href="javascript:void(0)" data-link="{!! $item->file_name !!}"
                                       data-id="{!! $item->id !!}" class="btn btn-warning update-live">Edit</a>
                                @else
                                    <a href="javascript:void(0)"
                                       data-name="edit"
                                       data-id="{!! $item->id !!}"
                                       data-type="{!! $item->type !!}"
                                       class="btn btn-warning edit-version"> Edit </a>

                                    {{--<a href="javascript:void(0)" data-id="{!! $item->id !!}"--}}
                                       {{--class="btn btn-info update-js">--}}
                                        {{--+add new </a>--}}
                                    {{--<a href="javascript:void(0)" data-name="{!! $item->name !!}"--}}
                                       {{--data-id="{!! $item->id !!}"--}}
                                       {{--class="btn btn-primary change-version"> Change Version </a>--}}
                                @endif
                                <a data-href="{!! url('admin/uploads/assets/delete') !!}"
                                   data-key="{!! $item->id !!}" data-type="{{ $item->type.' '.$item->name }}"
                                   class="delete-button btn btn-danger"><i
                                            class="fa fa-trash-o f-s-14 "></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td rowspan="5">No libraries</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @include('btybug::_partials.delete_modal')
    @include('uploads::assets._partials.upload_js_modal')
    @include('uploads::assets._partials.update_js_modal')
    @include('uploads::assets._partials.update_live_modal')
    @include('uploads::assets._partials.change_version_modal')
    @include('uploads::assets._partials.ace_modal')

@stop

@section('CSS')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

@stop

@section('JS')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("body").on("change", ".generate", function () {
                var id = $(this).data('id');
                var name = $(this).attr("name");
                var value = this.checked ? 1 : 0;
                $.ajax({
                    type: "post",
                    url: "{!! url('/admin/uploads/assets/generate-main-js') !!}",
                    cache: false,
                    datatype: "json",
                    data: {
                        id: id,
                        name: name,
                        value: value
                    },
                    headers: {
                        'X-CSRF-TOKEN': $("[name=_token]").val()
                    },
                    success: function (data) {
                        if (!data.error) {
                        }
                    }
                });
            })
        });
    </script>
@stop