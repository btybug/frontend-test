@extends('btybug::layouts.mTabs',['index'=>'upload_assets'])
@section('tab')
    <div class="col-md-12">
        <h2>CSS</h2>
        <div class="col-md-12">
            <a href="javascript:void(0)" class="btn btn-warning pull-right uplCss">add new</a>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Lib</th>
                    <th>Author</th>
                    <th>Live/Local</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($plugins))
                    @foreach($plugins as $item)
                        <tr>
                            {{--<td>--}}
                            {{--<input name="assets[{!! $item->id !!}]" value="0" type="hidden" />--}}
                            {{--<input name="assets[{!! $item->id !!}]" value="1" @if($item->is_generated) checked="checked" @endif type="checkbox" />--}}
                            {{--</td>--}}
                            <td>{!! $item->id !!}</td>
                            <td>{!! $item->name !!}</td>
                            <td>{!! BBGetUserName($item->author_id) !!}</td>
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
                                @endif

                                <a data-href="{!! url('admin/uploads/assets/delete') !!}"
                                   data-key="{!! $item->id !!}" data-type="{{ $item->type.' '.$item->name }}"
                                   class="delete-button btn btn-danger"><i
                                            class="fa fa-trash-o f-s-14 "></i></a>
                                {{--ace editor--}}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No libraries</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @include('btybug::_partials.delete_modal')
    @include('uploads::assets._partials.upload_modal')
    @include('uploads::assets._partials.ace_modal')

    @include('uploads::assets._partials.update_live_modal')
@stop

@section('CSS')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@stop

@section('JS')<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

@stop