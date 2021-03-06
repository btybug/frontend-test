<h2>Forms</h2>
<a href="{{route('application_form')}}">
    <button type="button" class="btn btn-success creat">Creat New</button>
</a>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Edit Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($allData))
        @foreach($allData as $key => $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->title}}</td>
                <td>{{$val->description}}</td>
                <td>
                    <a class="pull-right btn btn-danger" href="{{route('application_form_delete',$val->id)}}"><span
                                class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    <a class="pull-right btn btn-warning" href="{{route('application_form_edit',$val->id)}}"><span
                                class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="pull-right btn btn-info" href="{{route('application_form_view',$val->id)}}"><span
                                class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                </td>

            </tr>
        @endforeach
    @endif

    </tbody>
</table>
