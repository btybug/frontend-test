@extends('btybug::layouts.mTabs',['index'=>'upload_profile'])
@section('tab')
    <div class="col-md-12">
        <div class="col-md-12">
            <a href="{!! url(route('uploads_assets_profiles_create_css')) !!}" class="btn btn-warning pull-right">add
                new</a>
        </div>
        <h2>Css</h2>

        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Files</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($plugins))
                    @foreach($plugins as $item)
                        <tr>
                            <td>{!! $item->name !!}</td>
                            <td>{!! BBGetUserName($item->author_id) !!}</td>
                            <td>No Files</td>
                            <td>
                                @if(! $item->structured_by)
                                    <a href="{!! url(route('uploads_assets_profiles_edit_css',['id' => $item->id])) !!}"
                                       class="btn btn-info">Update</a>
                                    <a data-href="{!! route('uploads_assets_profiles_delete') !!}"
                                       data-key="{!! $item->id !!}" data-type="{{ $item->name }}"
                                       class="delete-button btn btn-danger"><i
                                                class="fa fa-trash-o f-s-14 "></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No css profiles</td>
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
    <script>
        $(document).ready(function () {
            $("body").on("change", ".generate", function () {
                var id = $(this).data('id');
                var name = $(this).attr("name");
                var value = this.checked ? 1 : 0;
                $.ajax({
                    type: "post",
                    url: "{!! url('/admin/framework/generate-main-js') !!}",
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