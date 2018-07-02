<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($settings as $setting)
        @php
        $data=json_decode($setting->val,true);
        @endphp
    <tr>
        <th scope="row">{!! $setting->id !!}</th>
        <td>{!! $data['name'] !!}</td>
        <td><a href="{!! url($data['edit_url']) !!}" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
    </tr>
    @endforeach

    </tbody>
</table>