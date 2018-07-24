<h2>Unit Studio</h2>
<a href="{{route('application_unitstudio_new')}}">
    <button type="button" class="btn btn-success creat">Creat New</button>
</a>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Edit Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($unitData))
        @foreach($unitData as $key => $val)
            <tr>
                <td class="col-md-1">{{$val->id}}</td>
                <td class="col-md-6">{{$val->name}}</td>
                <td class="col-md-2">
                    <a class="pull-right btn btn-danger" href="{{route('application_delete_unitStudio',$val->id)}}"><span
                                class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    <a class="pull-right btn btn-warning" href="{{route('application_edit_unitStudio',$val->id)}}"><span
                                class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="pull-right btn btn-info" href="{{route('application_viewrender_unitstudio',$val->id)}}"><span
                                class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                </td>

            </tr>
        @endforeach
    @endif
    </tbody>
</table>
